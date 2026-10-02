# Verificação das aulas no PHP 8.5

- **Data:** 2026-09-30
- **Ambiente:** PHP 8.5.10 (instalado com `winget install PHP.PHP.8.5`), sem `php.ini`, com `error_reporting=-1` e `display_errors=1`.
- **Método:**
  - `php -l` em todos os 38 arquivos;
  - cada aula aberta pelo servidor embutido (`php -S`), iniciado dentro da pasta da aula;
  - as aulas com `$_GET` testadas sem parâmetros, com valores válidos e com valores inválidos;
  - scripts de teste isolados para confirmar as falhas de lógica.

**Resultado geral:** nenhum erro de sintaxe. Todas as páginas abrem, mas há 4 erros de lógica confirmados, 3 páginas que dão erro fatal ou avisos com entradas comuns e 1 falha de segurança (XSS). O resto são erros de digitação e melhorias de qualidade.

## Estado das correções (2026-09-30)

- ✅ **Corrigidos e verificados:** os itens 1 a 9 (seções 1 a 3) e os erros de digitação da seção 4. Depois das correções, as 25 páginas testadas respondem sem *warning*, *deprecated* nem *fatal error*. Os testes que confirmam cada correção:
  - `switch`: idades -25, 0, 10, 17, 18, 59, 60, 129 e 130;
  - `Luta`: 6 combinações de lutadores;
  - `Caneta`: o construtor preenche os atributos;
  - formulário: `<script>` e `"><img>` saem escapados, e cor ou fonte inválidas caem no padrão.
- ✅ **Segunda rodada, também verificada:** o resto da seção 4, a seção 5 e a seção 7 (ver a tabela "Segunda rodada" abaixo). O lint passa nos 39 arquivos PHP, e os 20 links do novo `index.php` da raiz respondem HTTP 200 sem avisos. Testes específicos:
  - plural no `Lutador`;
  - `TypeError` ao passar um tipo errado;
  - experiência na agregação;
  - limites do ano de nascimento (1899, 1900, ano atual e 3000).
- ⏳ **Pendente:** a seção 6 (`nbproject/private/`, `.idea/`, `main.py` e `.gitignore`).
- As linhas citadas nas tabelas abaixo são as da versão **anterior** às correções.

Como cada item foi corrigido:

| # | Correção aplicada |
|---|---|
| 1 | `Caneta::__construct()` |
| 2 | `switch(true)`, com comentário explicando o motivo |
| 3–4 | `Luta::marcarLuta()` usa `$l1 !== $l2` e o novo `Lutador::categoriaValida()` |
| 5, 8 | `formulario.php`: `is_numeric()` antes de calcular a idade e `htmlspecialchars()` em nome e sexo |
| 6 | `input.php`: `?? null` e `is_numeric()`. Sem números válidos, mostra uma instrução de uso |
| 7 | `operadores.php`: `pow($n1, 2)`, e `sqrt`, `round` e `intval` passam a usar `$n2 = 10.75` |
| 9 | `formulario.php`: fonte validada contra a lista do `<select>` e cor com `/^#[0-9a-f]{6}$/i`. O padrão passa a ser `#000000` |

Segunda rodada:

| Seção | Correção aplicada |
|---|---|
| 4 | Todos os `</br>` trocados por `<br>`. `externa.php` ficou só com a função. `label for="inasce"` corrigido, "Sexo:" passou a `<span>` e o campo do ano ganhou `min="1900"`. O PHP aceita anos de 1900 até o ano atual. Os `index.php` de POO têm `<title>` e `<h1>`. Plural automático no `Lutador` ("1 empate", "2 empates") |
| 5 | Removido `Luta::$rounds`. `assitirMaisUm()` passou a `assistirMaisUm()`, é usado por `Visualizacao` e dá 1 ponto de experiência. Corrigido o comentário de `Pessoa` (agregação). `fazerAniversario()` é demonstrado no `index.php` da herança. Em `variaveis.php`, o exemplo de referência foi corrigido e `$casado`/`$peso` são exibidos com `gettype()` |
| 7 | Tipos de atributos, parâmetros e retornos em todas as classes de POO. `...$numeros` em `funcao.php`. `index.php` na raiz com links para todas as aulas. O `index.php` da agregação demonstra `play()` e `like()`. O README passa a pedir PHP 7.4+ (por causa dos atributos tipados) |

## 1. Erros de lógica (confirmados)

| # | Onde | O que acontece | Correção sugerida |
|---|---|---|---|
| 1 | [Caneta.php:12](../curso%20em%20vídeo/15-objetos/01-Classes/Caneta.php#L12) | O construtor `function Caneta(...)` segue o estilo do PHP 4. Desde o PHP 8 isso é um método comum e deixou de ser chamado no `new`: a caneta é criada com `cor`, `ponta`, `carga` e `tampada` **nulas**, e o primeiro `print_r` sai vazio. | Renomear para `__construct`. |
| 2 | [switch.php:13](../curso%20em%20vídeo/07-switch/switch.php#L13) | `switch($idade)` compara a idade com o resultado (`true`/`false`) de cada `case`. Com idade **0**, o resultado é **"Adulto!"**. Com -25 dá certo por coincidência. | `switch (true)` (ou `match (true)`). |
| 3 | [Luta.php:12](../curso%20em%20vídeo/15-objetos/02-encapsulamento/02-ObjetosCompostos/Luta.php#L12) | Dois lutadores fora dos limites de peso ficam os dois com "Categoria inválida..." e, por terem a mesma categoria, **a luta é aprovada** (testado com 40 kg contra 45 kg). | Recusar a luta quando a categoria for inválida. |
| 4 | [Luta.php:12](../curso%20em%20vídeo/15-objetos/02-encapsulamento/02-ObjetosCompostos/Luta.php#L12) | `$l1 != $l2` compara o **conteúdo** dos objetos. Dois lutadores diferentes com os mesmos dados são tratados como o mesmo lutador e a luta é **recusada**. | Usar `$l1 !== $l2` (identidade). |

## 2. Erros com entradas comuns

| # | Onde | O que acontece | Correção sugerida |
|---|---|---|---|
| 5 | [formulario.php:29](../curso%20em%20vídeo/05-formularios/formulario.php#L29) | Abrir a página sem enviar o formulário dá **Fatal error** (`TypeError: Unsupported operand types: string - string`), porque o padrão "Valor não informado!" entra na subtração. | Só calcular a idade quando `nasce` for numérico (`is_numeric` ou `filter_input`). |
| 6 | [input.php:15](../curso%20em%20vídeo/04-input/input.php#L15) | Sem `?a=..&b=..` aparecem 2 *warnings* ("Undefined array key") e "A soma entre  e  é igual a 0". Com `?a=abc` dá **Fatal error** (`TypeError`). | Usar `?? 0` e converter com `(float)` ou `filter_input(..., FILTER_VALIDATE_FLOAT)`. |
| 7 | [operadores.php:26-27](../curso%20em%20vídeo/03-operadores/operadores.php#L26-L27) | `pow(-5, 10.25)` e `sqrt(-5)` dão `NAN`, e o PHP 8.5 emite *warning* "unexpected NAN value was coerced to string". Além disso, `round()` e `intval()` são aplicados a `-5`, que já é inteiro, e por isso não mostram nada. | Usar números positivos em `sqrt`/`pow` e um decimal (ex.: `10.25`) em `round`/`intval`. |

## 3. Segurança

| # | Onde | O que acontece | Correção sugerida |
|---|---|---|---|
| 8 | [formulario.php:31-32](../curso%20em%20vídeo/05-formularios/formulario.php#L31-L32) | `nome` e `sexo` são impressos sem escape: `?nome=<script>...` injeta HTML/JS na página (**XSS**, confirmado). | `htmlspecialchars()` em tudo o que vem de `$_GET`. |
| 9 | [formulario.php:5-6](../curso%20em%20vídeo/05-formularios/formulario.php#L5-L6) | `fonte` e `cor` são colocados diretamente no `<style>`, o que permite injetar CSS (ex.: `cor=red;background:url(...)`). O padrão `#0000` é um hexadecimal de 4 dígitos com alfa 0, ou seja, **texto transparente**. | Validar `cor` com `/^#[0-9a-f]{6}$/i` e `fonte` contra a lista do `<select>`. Usar `#000000` como padrão. |

## 4. HTML e textos visíveis na página

- `</br>` não é uma tag válida (o certo é `<br>`). Aparece 98 vezes em 8 arquivos, 75 delas em `string.php`.
- [funcao.php:43](../curso%20em%20vídeo/11-funcoes/funcao.php#L43) inclui [externa.php](../curso%20em%20vídeo/11-funcoes/externa.php), que é um documento HTML completo (`<!DOCTYPE>`, `<html>`...), dentro do `<body>`. O `externa.php` deveria conter só a função.
- No [index.html](../curso%20em%20vídeo/05-formularios/index.html), `label for="idade"` (linha 30) aponta para um id que não existe (o input é `inasce`), `label for="isexo"` (linha 33) não tem alvo, e o campo de nascimento não tem `min`/`max`.
- Os `index.php` de POO (exceto `01-Classes`) têm `<title></title>` vazio.
- Erros de digitação que aparecem na página:
  - `index.html`: "Fomulário", "Tamanho da fote", "Maculino";
  - `01-Classes/index.php:27`: "Eu temho";
  - `ControleRemoto.php:44`: "Esta ligado";
  - `Lutador.php:20`: "Vindo diretamente da Brasil/EUA";
  - `Lutador.php:32`: "empatou 1vezes";
  - `Mamifero.php:14`: "Som de mamídero";
  - `string.php`: "usadndo o wordwra", "str_word_coun", "equilava", "TR_PAD_RIGHT", "a string nnome"; o rótulo "substr(str, 0, 4)" corresponde a `substr(..., 0, 5)`, e três chamadas diferentes aparecem todas como "substr(str, 5)" (linhas 160-163); nas linhas 171-173, o `!` depois do `<br>` vai parar ao início da linha seguinte;
  - `vetor.php:44`: "unset(vect)" sem quebra de linha e com o nome de variável errado (é `$v`); na linha 103, "Ordenando vetores associativos" usa um vetor numérico.

## 5. Código sem uso ou incoerente

- `Luta::$rounds` nunca é usado.
- `User::assitirMaisUm()` tem um erro de digitação e nunca é chamado: `Visualizacao` usa `setTotAssistido()` diretamente.
- Em [Pessoa.php:18 (agregação)](../curso%20em%20vídeo/15-objetos/05-agregação%20entre%20classes/Pessoa.php#L18), o comentário "métodos abstrato" está num método concreto, e `experiencia` nunca muda.
- `Pessoa::fazerAniversario()` (herança) nunca é chamado no `index.php`.
- Em [variaveis.php:24](../curso%20em%20vídeo/02-variaveis/variaveis.php#L24), `$n1 = 2` é logo sobrescrito por `$n1 = &$n2`, e `$casado` e `$peso` não são usados.

## 6. Repositório

- `nbproject/private/` (NetBeans) está versionado, com caminhos locais (`C:\xampp\htdocs\...`). O próprio NetBeans considera esses arquivos pessoais.
- Em `05-formularios`, o `.idea/` e o `main.py` são restos do PyCharm.
- Não há `.gitignore`. Sugestão: ignorar `nbproject/private/` e `.idea/` e tirá-los do índice com `git rm -r --cached`.

## 7. Melhorias opcionais (portfólio)

- Depois de corrigir o item 1, o README pode indicar "PHP 8" em vez de "PHP 7.1 ou superior".
- Tipar propriedades, parâmetros e retornos (`private string $cor`, `function ligar(): void`) e usar a promoção de propriedades no construtor, sem perder os comentários didáticos.
- Em `funcao.php`, trocar `func_get_args()` por parâmetros variádicos (`function total(...$numeros)`).
- Criar um `index.php` na raiz com links para todas as aulas, para navegar pelo repositório com um único `php -S`.
