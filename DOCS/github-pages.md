# GitHub Pages

O site fica em **https://marcospontoexe.github.io/PHP/**. É uma versão estática das aulas, porque o GitHub Pages não executa PHP.

## Como funciona

1. O workflow [.github/workflows/pages.yml](../.github/workflows/pages.yml) roda a cada push no `main`, em todo pull request e manualmente, pela aba *Actions* → *GitHub Pages* → *Run workflow*.
2. O workflow instala o PHP 8.5 e executa [scripts/gerar-site.php](../scripts/gerar-site.php). O script:
   - inicia `php -S` na raiz, com todos os avisos ligados;
   - abre o [index.php](../index.php) da raiz e cada página para a qual ele tem link, mais o resultado de exemplo do formulário;
   - salva o HTML em `_site/`, troca `.php` por `.html` (inclusive nos links e no `action` do formulário) e acrescenta no topo de cada página um aviso com os links "Todas as aulas" e "Código-fonte no GitHub";
   - **falha** se alguma página não responder HTTP 200 ou mostrar `Warning`, `Deprecated`, `Notice` ou `Fatal error`.
3. Nos pull requests, o workflow só gera o site, o que serve de teste das aulas. No `main`, ele também publica o resultado com `actions/deploy-pages`.

## Ativar (uma vez)

1. Faça merge do branch com o workflow no `main`.
2. No GitHub, abra o repositório e vá a **Settings → Pages**.
3. Em **Build and deployment → Source**, escolha **GitHub Actions**.
4. Na aba **Actions**, rode o workflow *GitHub Pages* (*Run workflow*) ou espere o próximo push no `main`.
5. O link do site aparece no resumo da execução e em *Settings → Pages*.

## Testar localmente

```powershell
php scripts/gerar-site.php        # gera _site/ (precisa do PHP 8.4+)
php -S localhost:8001 -t _site    # serve o resultado como arquivos estáticos
```

A pasta `_site/` está no [.gitignore](../.gitignore).

## Limitações da versão estática

- O formulário (`05-formularios`) abre sempre o mesmo resultado de exemplo, porque os dados digitados não são processados.
- O `input.php` mostra só o exemplo `?a=2&b=5`.
- A luta do Ultra Emoji Combat mostra o resultado sorteado no momento da publicação.

Para executar o PHP de verdade, clone o repositório e rode `php -S localhost:8000` na raiz.

## Ao criar uma aula

Basta acrescentá-la ao [index.php](../index.php) da raiz. O gerador segue os links dele. Uma página sem link no índice precisa ser incluída em `$extras` no [gerar-site.php](../scripts/gerar-site.php). Uma nota específica no aviso vai em `$notas`.
