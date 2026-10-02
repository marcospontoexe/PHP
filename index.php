<?php
/* Página inicial do repositório: lista todas as aulas com links.
   Para usar: na raiz do repositório, rode "php -S localhost:8000" e abra http://localhost:8000 */

$fundamentos = [
    ['01-echo/ola.php', '01 · echo', 'Primeiro script: echo e print gerando HTML'],
    ['02-variaveis/variaveis.php', '02 · Variáveis', 'Tipos, conversão, interpolação, referências (&) e variáveis variáveis ($$)'],
    ['03-operadores/operadores.php', '03 · Operadores', 'Aritméticos, ternário e funções matemáticas'],
    ['04-input/input.php?a=2&b=5', '04 · Input', 'Parâmetros da URL com $_GET, validados com is_numeric'],
    ['05-formularios/index.html', '05 · Formulários', 'Formulário GET com saída escapada e CSS validado'],
    ['06-if/if.php', '06 · if', 'Faixa etária com if/elseif/else'],
    ['07-switch/switch.php', '07 · switch', 'Faixa etária com switch (true)'],
    ['08-while/while.php', '08 · while', 'Contagem de 1 a 10'],
    ['09-doWhile/doWhile.php', '09 · do-while', 'Contagem de 1 a 10'],
    ['10-for/for.php', '10 · for', 'Contagem de 1 a 10'],
    ['11-funcoes/funcao.php', '11 · Funções', 'Parâmetros, retorno, parâmetro variádico e include'],
    ['12-string/string.php', '12 · Strings', 'Mais de 20 funções de manipulação de strings'],
    ['13-vetores/vetor.php', '13 · Vetores', 'Inclusão, remoção, chaves associativas e ordenação'],
    ['14-matriz/matriz.php', '14 · Matrizes', 'Arrays multidimensionais'],
];

$poo = [
    ['15-objetos/01-Classes/index.php', 'Classes e objetos — Caneta', 'Atributos, construtor, métodos, getters e setters'],
    ['15-objetos/02-encapsulamento/01-interface/index.php', 'Interface e encapsulamento — Controle remoto', 'Interface Controlador e estado privado'],
    ['15-objetos/02-encapsulamento/02-ObjetosCompostos/index.php', 'Objetos compostos — Ultra Emoji Combat', 'Lutadores, categorias por peso e lutas sorteadas'],
    ['15-objetos/03-herança/index.php', 'Herança — Pessoa, Aluno e Bolsista', 'Classe abstrata, método final e sobrescrita'],
    ['15-objetos/04-polimorfismo/index.php', 'Polimorfismo — Animal, Mamífero e Canguru', 'Métodos abstratos e polimorfismo de sobreposição'],
    ['15-objetos/05-agregação entre classes/index.php', 'Agregação — Plataforma de vídeos', 'Visualização que agrega usuário e vídeo'],
];

// monta o link codificando cada parte do caminho (a pasta tem espaços e acentos)
function linkAula(string $caminho): string {
    [$arquivo, $consulta] = array_pad(explode('?', $caminho, 2), 2, null);
    $partes = array_map('rawurlencode', explode('/', 'curso em vídeo/' . $arquivo));
    $url = implode('/', $partes) . ($consulta !== null ? '?' . $consulta : '');
    return htmlspecialchars($url);
}

function listaAulas(array $aulas): void {
    echo '<ul>';
    foreach ($aulas as [$caminho, $titulo, $descricao]) {
        echo '<li><a href="' . linkAula($caminho) . '">' . htmlspecialchars($titulo) . '</a>';
        echo '<span>' . htmlspecialchars($descricao) . '</span></li>';
    }
    echo '</ul>';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudos de PHP</title>
    <style>
        :root { --fundo: #f7f7f8; --texto: #1d1d1f; --suave: #5f6368; --link: #4f46e5; --cartao: #ffffff; --borda: #e2e2e6; }
        @media (prefers-color-scheme: dark) {
            :root { --fundo: #17171a; --texto: #ececf1; --suave: #a1a1aa; --link: #a5b4fc; --cartao: #222227; --borda: #34343b; }
        }
        body { margin: 0; background: var(--fundo); color: var(--texto); font: 16px/1.5 system-ui, sans-serif; }
        main { max-width: 760px; margin: 0 auto; padding: 32px 16px 48px; }
        h1 { margin: 0 0 4px; font-size: 1.8rem; }
        h2 { margin: 32px 0 12px; font-size: 1.2rem; }
        p { margin: 0; color: var(--suave); }
        ul { list-style: none; margin: 0; padding: 0; display: grid; gap: 8px; }
        li { background: var(--cartao); border: 1px solid var(--borda); border-radius: 8px; padding: 10px 14px; }
        li a { color: var(--link); font-weight: 600; text-decoration: none; }
        li a:hover { text-decoration: underline; }
        li span { display: block; color: var(--suave); font-size: .9rem; }
    </style>
</head>
<body>
    <main>
        <h1>Estudos de PHP</h1>
        <p>Exercícios e projetos dos cursos de PHP do Curso em Vídeo.</p>

        <h2>Fundamentos da linguagem</h2>
        <?php listaAulas($fundamentos); ?>

        <h2>Programação orientada a objetos</h2>
        <?php listaAulas($poo); ?>
    </main>
</body>
</html>
