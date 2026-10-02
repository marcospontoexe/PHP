<?php
/*
 * Gera uma versão estática do site em _site/, para publicar no GitHub Pages (que não executa PHP).
 *
 * Como funciona:
 *   1. inicia o servidor embutido do PHP na raiz do repositório;
 *   2. abre o index.php da raiz e todas as páginas para as quais ele tem link (mais as de $extras);
 *   3. salva o HTML de cada página trocando .php por .html, inclusive nos links;
 *   4. acrescenta no topo de cada página um aviso de versão estática, com link para o código-fonte.
 *
 * Termina com erro se alguma página não responder HTTP 200 ou mostrar Warning/Deprecated/Fatal error,
 * por isso também serve como teste das aulas.
 *
 * Uso (PHP 8.4 ou superior, na raiz do repositório):  php scripts/gerar-site.php
 */

$raiz = dirname(__DIR__);
$saida = $raiz . DIRECTORY_SEPARATOR . '_site';
$porta = 8123;
$repositorio = getenv('GITHUB_REPOSITORY') ?: 'marcospontoexe/PHP';
$ramo = 'main';

// páginas que não têm link no index.php da raiz, mas que precisam existir no site
$extras = [
    'curso em vídeo/05-formularios/formulario.php?fonte=20pt&cor=%23ff0000&nome=Ana&nasce=1990&sexo=feminino',
];

// observações mostradas no aviso de páginas que dependem de dados enviados ou de sorteio
$notas = [
    'curso em vídeo/04-input/input.html' => 'Exemplo gerado com ?a=2&b=5: aqui não é possível trocar os valores.',
    'curso em vídeo/05-formularios/index.html' => 'Aqui o formulário abre sempre o mesmo resultado de exemplo, sem processar os dados digitados.',
    'curso em vídeo/05-formularios/formulario.html' => 'Resultado de exemplo (Ana, nascida em 1990, fonte 20pt, cor vermelha): os dados digitados não são processados.',
    'curso em vídeo/15-objetos/02-encapsulamento/02-ObjetosCompostos/index.html' => 'O resultado da luta foi sorteado no momento da publicação.',
];

if (PHP_VERSION_ID < 80400) {
    fwrite(STDERR, "Este script precisa do PHP 8.4 ou superior (usa http_get_last_response_headers()).\n");
    exit(1);
}

// codifica cada parte do caminho (a pasta "curso em vídeo" tem espaço e acento), mantendo a query
function codificarUrl(string $url): string {
    [$caminho, $consulta] = array_pad(explode('?', $url, 2), 2, null);
    $partes = array_map('rawurlencode', explode('/', $caminho));
    return implode('/', $partes) . ($consulta !== null ? '?' . $consulta : '');
}

// "curso%20em%20v%C3%ADdeo/04-input/input.php?a=2&b=5" -> "curso em vídeo/04-input/input.html"
function arquivoDeSaida(string $url): string {
    $caminho = rawurldecode(explode('?', $url, 2)[0]);
    if ($caminho === '') {
        return 'index.html';
    }
    return preg_replace('/\.php$/', '.html', $caminho);
}

function baixar(string $url, int $porta): array {
    $contexto = stream_context_create(['http' => ['ignore_errors' => true, 'timeout' => 15]]);
    $html = @file_get_contents("http://127.0.0.1:$porta/$url", false, $contexto);
    $cabecalhos = http_get_last_response_headers() ?? [];
    $status = preg_match('/^HTTP\/\S+\s+(\d{3})/', $cabecalhos[0] ?? '', $m) ? (int) $m[1] : 0;
    return [$status, $html === false ? '' : $html];
}

function apagarPasta(string $pasta): void {
    if (!is_dir($pasta)) {
        return;
    }
    $itens = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($pasta, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($itens as $item) {
        $item->isDir() ? rmdir($item->getPathname()) : unlink($item->getPathname());
    }
    rmdir($pasta);
}

// aviso inserido no topo de cada página
function aviso(string $arquivo, string $fonte, string $nota): string {
    $estilo = 'margin:0 0 16px;padding:8px 12px;border-radius:6px;background:#fff4ce;color:#3d3200;'
            . 'font:14px/1.5 system-ui,sans-serif';
    $links = [];
    if ($arquivo === 'index.html') {
        $texto = 'Versão estática gerada a partir do código PHP. Para executar as aulas, clone o repositório e rode '
               . '<code>php -S localhost:8000</code>.';
    } else {
        $texto = 'Versão estática: mostra o resultado do PHP no momento da publicação.';
        $links[] = '<a href="' . str_repeat('../', substr_count($arquivo, '/')) . 'index.html">← Todas as aulas</a>';
    }
    if ($nota !== '') {
        $texto .= ' ' . htmlspecialchars($nota);
    }
    $links[] = '<a href="' . htmlspecialchars($fonte) . '">Código-fonte no GitHub</a>';
    return "\n<div style=\"$estilo\">$texto " . implode(' · ', $links) . "</div>\n";
}

// link para o código no GitHub: a pasta, se a página for um index.php; o arquivo, nos outros casos
function linkFonte(string $url, string $repositorio, string $ramo): string {
    $caminho = rawurldecode(explode('?', $url, 2)[0]);
    if ($caminho === '') {
        return "https://github.com/$repositorio";
    }
    if (basename($caminho) === 'index.php') {
        return "https://github.com/$repositorio/tree/$ramo/" . codificarUrl(dirname($caminho));
    }
    return "https://github.com/$repositorio/blob/$ramo/" . codificarUrl($caminho);
}

// inicia o servidor embutido do PHP com todos os avisos ligados, para que apareçam no HTML
$log = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'gerar-site-servidor.log';
file_put_contents($log, '');
$servidor = proc_open(
    [PHP_BINARY, '-d', 'display_errors=1', '-d', 'error_reporting=-1', '-d', 'html_errors=0', '-S', "127.0.0.1:$porta"],
    [0 => ['pipe', 'r'], 1 => ['file', $log, 'a'], 2 => ['file', $log, 'a']],
    $pipes,
    $raiz
);
if (!is_resource($servidor)) {
    fwrite(STDERR, "Não foi possível iniciar o servidor PHP.\n");
    exit(1);
}
for ($i = 0; $i < 50; $i++) {      // espera até 5 s o servidor aceitar conexões
    $conexao = @fsockopen('127.0.0.1', $porta);
    if ($conexao) {
        fclose($conexao);
        break;
    }
    usleep(100000);
}

$problemas = [];
try {
    [$status, $indice] = baixar('', $porta);
    if ($status !== 200) {
        throw new RuntimeException("index.php da raiz respondeu HTTP $status");
    }

    // páginas a gerar: a raiz, os links relativos do index.php e as extras
    preg_match_all('/href="([^"#:]+)"/', $indice, $encontrados);
    $urls = array_merge([''], array_map('html_entity_decode', $encontrados[1]), array_map('codificarUrl', $extras));

    apagarPasta($saida);
    mkdir($saida, 0777, true);
    file_put_contents($saida . '/.nojekyll', '');      // o GitHub Pages não deve processar o site com Jekyll

    foreach (array_unique($urls) as $url) {
        [$status, $html] = $url === '' ? [200, $indice] : baixar($url, $porta);
        $arquivo = arquivoDeSaida($url);

        if ($status !== 200) {
            $problemas[] = "$arquivo: HTTP $status";
            continue;
        }
        if (preg_match('/(Warning|Deprecated|Notice|Fatal error|Parse error): .*/', $html, $erro)) {
            $problemas[] = "$arquivo: " . trim(strip_tags($erro[0]));
        }

        // links e formulários para páginas .php relativas passam a apontar para o .html gerado
        $html = preg_replace('/\b(href|action)="([^"#:]*?)\.php(\?[^"]*)?"/', '$1="$2.html"', $html);

        // aviso logo depois de <main> (página inicial) ou de <body> (aulas)
        $bloco = aviso($arquivo, linkFonte($url, $repositorio, $ramo), $notas[$arquivo] ?? '');
        $marca = preg_match('/<main[^>]*>/i', $html) ? '/<main[^>]*>/i' : '/<body[^>]*>/i';
        $html = preg_replace_callback($marca, fn($m) => $m[0] . $bloco, $html, 1);

        $destino = $saida . DIRECTORY_SEPARATOR . $arquivo;
        if (!is_dir(dirname($destino))) {
            mkdir(dirname($destino), 0777, true);
        }
        file_put_contents($destino, $html);
        echo "gerado: $arquivo\n";
    }
} catch (Throwable $e) {
    $problemas[] = $e->getMessage();
} finally {
    proc_terminate($servidor);
    proc_close($servidor);
}

if ($problemas) {
    fwrite(STDERR, "\nProblemas encontrados:\n- " . implode("\n- ", $problemas) . "\n");
    exit(1);
}
echo "\nSite gerado em _site/\n";
