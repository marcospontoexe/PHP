# Materiais Online: Fundamentos de Programação Web
## UNIDADE 05 – PHP

**Fonte:** 5-PHP.pdf fileciteturn0file0

---

Olá!

Agora, vamos começar nosso desenvolvimento do lado servidor da aplicação, ou back-end. Isso significa que agora, trabalharemos com uma linguagem de programação que executará em um servidor especial, o HTTP server:

> HTTP significa Hypertext Transfer Protocol, ou protocolo de transferência de hipertexto. É um protocolo de comunicação entre máquina cliente e máquina servidora.  
> Um servidor HTTP é um programa que geralmente executa em um computador remoto, responsável pelo armazenamento, processamento e entrega dos arquivos dos sites para os navegadores.  
> Na comunicação cliente-servidor, feita via protocolo HTTP, o navegador na máquina cliente solicita ao servidor na máquina remota uma URL: referência ao conteúdo HTML que será enviado ao navegador, como resposta a uma solicitação.

![Comunicação HTTP entre cliente-servidor](Figura1.png)  
*Figura 1: Comunicação HTTP entre cliente-servidor.*

**HTTPS**: Hypertext Transfer Protocol Secure. É o protocolo HTTP seguro, pois a comunicação entre cliente e servidor é criptografada para deixá-la confidencial. Devemos usar HTTPS sempre que precisarmos transmitir dados sensíveis, como dados bancários, senhas etc.

---

## Introdução ao PHP

PHP significa **Hypertext Preprocessor**. É uma linguagem de script open source, usada no desenvolvimento de aplicações web integradas com HTML. Arquivos PHP podem conter HTML, CSS, JavaScript e código PHP. A interpretação retorna um documento HTML puro ao navegador.

### Funcionalidades do PHP

- Gerar páginas HTML dinâmicas.  
- Criar, abrir, ler, escrever, excluir e fechar arquivos no servidor.  
- Coletar dados de formulário.  
- Enviar e receber cookies.  
- Criar, manter e destruir variáveis de sessão.  
- Adicionar, excluir, modificar dados em banco de dados.  
- Controlar acesso de usuários.  
- Criptografar dados.

### Referências Externas

- Tutorial PHP (W3Schools): <https://www.w3schools.com/php/default.asp>  
- MDN Glossary – PHP: <https://developer.mozilla.org/pt-BR/docs/Glossary/PHP>  
- Manual do PHP: <https://www.php.net/manual/pt_BR/>  
- Hostinger Tutoriais – HTTPS & SSL: <https://www.hostinger.com.br/tutoriais/o-que-e-ssl-tls-https>

---

## Configurando o Ambiente (XAMPP)

Para exemplos em PHP, instale o XAMPP, que inclui Apache (com PHP) e MySQL. Copie suas pastas de trabalho para `C:\xampp\htdocs`, por exemplo `C:\xampp\htdocs\Teste-Front`.

- Inicie o Apache pelo Painel do XAMPP.  
- Acesse no navegador: `http://localhost/teste-front/` ou `http://127.0.0.1/teste-front/`.

![Painel XAMPP e site exemplo](Figura3.png)  
*Figura 3: Site acessado a partir do Apache.*

Se houver `index.html` ou `index.php`, o Apache o identifica automaticamente como página inicial.

### Exemplo: “Olá Mundo” em PHP

Crie `index.php` em `htdocs`:  
\`\`\`php
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Teste de PHP</title>
    <style>
        body { background-color: lightsteelblue; }
        p { font-family: verdana; color: white; font-size: 16px; }
    </style>
</head>
<body>
    <?php
    // Imprime dados na tela.
    echo "<p>Olá mundo!</p>";
    print "<p>Olá de novo, mundo!</p>";
    ?>
</body>
</html>
\`\`\`  
1. Estrutura HTML básica.  
2. Código PHP entre `<?php` e `?>`.  
3. Uso de `echo` e `print`.  
4. Comentários com `//`.

---

## Sintaxe Básica

- Extensão de arquivo: `.php`  
- Delimitadores: `<?php` ... `?>`  
- Linhas terminam com `;`.  
- Comentários: `#`, `//`, `/* ... */`.

\`\`\`php
<?php
  /* Bloco de comentários */
  echo "Olá";     // comentário
  echo "mundo!";  # comentário
?>
\`\`\`

Referências:  
<https://www.php.net/manual/pt_BR/language.basic-syntax.php>

---

## Variáveis

PHP é fracamente tipado. Variáveis iniciam com `$` e não precisam declarar tipo.

- Nomes sensíveis a maiúsculas.  
- Não iniciar com número.  
- Aceitam A–Z, a–z, 0–9, `_`.

Exemplo: `variaveis.php`
\`\`\`php
<?php
$x = "Linguagem PHP";
echo "<p>A " . $x . " é show!</p>";

$x = sqrt(144);
echo "<p>Raiz quadrada de 144 = " . $x . "</p>";

$aux = (5 * 4 > 36);
if ($aux)
    echo "<p>Verdade</p>";
else
    echo "<p>Falso</p>";
?>
\`\`\`

---

## Escopo de Variáveis

- **Global:** declarada fora de funções.  
- **Local:** dentro de funções.

Exemplo: `varGlobal.php`
\`\`\`php
<?php
$x = 5;
function minhaFuncao() {
    // echo $x; // indefinida dentro da função
}
minhaFuncao();
echo $x;
?>
\`\`\`

Acesse variáveis globais dentro de funções com `global $x;`.

---

## Operadores

### Aritméticos

| Operador | Descrição          |
|----------|--------------------|
| +        | Soma               |
| -        | Subtração          |
| *        | Multiplicação      |
| **       | Exponenciação      |
| /        | Divisão            |
| %        | Resto              |

Uso de `var_dump` para tipos:
\`\`\`php
$x = 10; $y = 10.17;
var_dump($x); // int(10)
var_dump($y); // float(10.17)
\`\`\`

### Atribuição

| Operador | Exemplo       | Equiv.              |
|----------|---------------|---------------------|
| +=       | `$x += 4;`    | `$x = $x + 4;`      |
| -=       | `$x -= 4;`    | `$x = $x - 4;`      |
| *=       | `$x *= 4;`    | `$x = $x * 4;`      |
| /=       | `$x /= 2;`    | `$x = $x / 2;`      |
| %=       | `$x %= 4;`    | `$x = $x % 4;`      |
| **=      | `$x **= 2;`   | `$x = $x ** 2;`     |

### Comparação

| Operador | Descrição                   |
|----------|-----------------------------|
| ==       | Igual                       |
| ===      | Idêntico (tipo + valor)     |
| !=       | Diferente                   |
| !==      | Não idêntico                |
| <, >, <=, >= | Relações menores/maiores |

Referências:  
<https://www.php.net/manual/pt_BR/language.operators.php>

---

## Estruturas de Controle

### Condicional `if`

\`\`\`php
if ($condicao) {
    // bloco
} elseif ($outra) {
    // outro bloco
} else {
    // bloco padrão
}
\`\`\`

Referências:  
<https://www.php.net/manual/pt_BR/control-structures.if.php>

### `switch`

\`\`\`php
switch ($expr) {
  case 'x':
    //...
    break;
  case 'y':
    //...
    break;
  default:
    //...
}
\`\`\`

Referências:  
<https://www.php.net/manual/pt_BR/control-structures.switch.php>

### Loops

- **while**: `<condição>`
- **do...while**: executa ao menos uma vez.
- **for**: `for ($i=0; $i<5; $i++)`.
- **foreach**: percorre arrays.
- **break/continue**.

Referências:  
<https://www.php.net/manual/pt_BR/control-structures.while.php>,  
<https://www.php.net/manual/pt_BR/control-structures.for.php>,  
<https://www.php.net/manual/pt_BR/control-structures.foreach.php>

---

## Arrays

Arrays são listas indexadas:
\`\`\`php
$frutas = array("Abacate", "Uva", "Limão");
$minhaFruta = $frutas[1];
$fTam = count($frutas);
\`\`\`
Exemplo de iteração:
\`\`\`php
$text = "<ul>";
for ($i = 0; $i < $fTam; $i++) {
    $text .= "<li>" . $frutas[$i] . "</li>";
}
$text .= "</ul>";
echo $text;
\`\`\`

Referências:  
<https://www.php.net/manual/pt_BR/language.types.array.php>

---

## Atividade Formativa 1

Crie o jogo “Adivinhe o Número” usando sessões e cookies conforme referência:

- Inicie sessão: `session_start();`  
- Use `$_SESSION` para armazenar número, tentativas e entrada.
- Gere número aleatório: `rand(1,100)`.
- Controle fluxo e dicas (maior/menor).

Referência: Sérgio Toledo – Jogos PHP: https://www.sergiotoledo.com.br/index.php?url=tutoriais/programacao-php/jogos-php

---

## Atividade Formativa 2

Receba dados de formulário via POST e GET:

### POST

- Formulário: `<form method="POST" action="contact_actionPOST.php">`
- No PHP: `$nome = $_POST["name"];`

### GET

- Formulário: `<form method="GET" action="contact_actionGET.php">`
- No PHP: `$nome = $_GET["name"];`

Formate data e calcule idade:
\`\`\`php
$data = $_GET["dt_nasc"];
list($ano,$mes,$dia) = explode('-', $data);
$aniversario = "$dia/$mes/$ano";
$nascimento = mktime(0,0,0,$mes,$dia,$ano);
$hoje = time();
$idade = floor((((($hoje - $nascimento)/60)/60)/24)/365.25);
\`\`\`

Exiba dados em tabela HTML.

---

## Conclusão

Nesta unidade, exploramos PHP para back-end, criando páginas dinâmicas e manipulando formulários. Agora temos cliente (HTML/CSS/JS) e servidor (PHP) trabalhando juntos em um sistema distribuído.

**Próximos passos:** aprender SQL para persistência de dados.

### Referências Bibliográficas

- ALVES, W. P. _Desenvolvimento e design de sites._ São Paulo: Érica, 2014.  
- MILETTO, E. M.; BERTAGNOLLI, S. C. _Desenvolvimento de software II._ Porto Alegre: Bookman, 2014.  
- TERUEL, E. C. _HTML5: Guia prático._ Porto Alegre: Bookman, 2014.  
- TOLEDO, S. _Jogos PHP._ Sérgio Toledo, 2013.
