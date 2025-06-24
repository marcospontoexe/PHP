# PHP
PHP significa **Hypertext Preprocessor**. É uma linguagem de script open source, usada no desenvolvimento de aplicações web integradas com HTML. Arquivos PHP podem conter HTML, CSS, JavaScript e código PHP. A interpretação retorna um documento HTML puro ao navegador.

O php é uma linguagem de programação que executará em um servidor especial, o** HTTP server**:

* HTTP significa Hypertext Transfer Protocol, ou protocolo de transferência de hipertexto. É um protocolo de comunicação entre máquina cliente e máquina servidora.  
* Um servidor HTTP é um programa que geralmente executa em um computador remoto, responsável pelo armazenamento, processamento e entrega dos arquivos dos sites para os navegadores.  
* Na comunicação cliente-servidor, feita via protocolo HTTP, o navegador na máquina cliente solicita ao servidor na máquina remota uma URL: referência ao conteúdo HTML que será enviado ao navegador, como resposta a uma solicitação.

![Comunicação HTTP entre cliente-servidor](https://github.com/marcospontoexe/PHP/blob/main/Imagens/1.jpg)  
*Figura 1: Comunicação HTTP entre cliente-servidor.*

* Já o **HTTPS** significa Hypertext Transfer Protocol Secure. Ele é o protocolo **HTTP seguro**, pois a comunicação entre cliente e servidor é **criptografada** para deixá-la **confidencial**. Com isso, a troca de dados pela internet apenas ocorre após a identificação e autenticação do servidor, garantindo a privacidade e integridade dos dados transmitidos. Devemos usar HTTPS sempre que precisarmos **transmitir dados sensíveis** entre navegador e servidor, como número de contas bancárias, de cartão de crédito, senhas etc.

* Por fim, a sigla **PHP** significa **Hypertext Preprocessor**. É uma linguagem de script open source de uso geral, muito utilizada para o desenvolvimento de aplicações web integradas com códigos HTML. Os arquivos PHP podem conter texto, HTML, CSS, JavaScript, além do próprio código PHP, que é executado no servidor. O resultado da interpretação do script do PHP, cujos arquivos têm a extensão **.php**, é retornado ao navegador como um documento puramente HTML. 
* O PHP possui várias funcionalidades nativas, além de muitas bibliotecas extras, que, ao executar no lado servidor, permitem:
    * Gerar páginas HTML dinâmicas.
    * Criar, abrir, ler, escrever, excluir e fechar arquivos no servidor.
    * Coletar dados de formulário.
    * Enviar e receber cookies.
    * Criar, manter e destruir variáveis de sessão.
    * Adicionar, excluir, modificar dados em seu banco de dados.
    * Controlar o acesso do usuário.
    * Criptografar dados.

**Saiba mais**:

- Tutorial PHP: [https://www.w3schools.com/php/default.asp](https://www.w3schools.com/php/default.asp)
- MILETTO, Evandro Manara; BERTAGNOLLI, Silvia de Castro. *Desenvolvimento de Software II: introdução ao desenvolvimento web com html, css, javascript e php.* Porto Alegre: Bookman, 2014. 276 p. Capítulo 7 – Linguagem PHP (Utilização de cookies e sessões: página 189)
- PHP: [https://developer.mozilla.org/pt-BR/docs/Glossary/PHP](https://developer.mozilla.org/pt-BR/docs/Glossary/PHP)
- Manual do PHP: [https://www.php.net/manual/pt\_BR/](https://www.php.net/manual/pt_BR/)
- Site seguro HTTPS: Hostinger Tutoriais – HTTPS & SSL


## Sintaxe básica

Um script PHP é executado no servidor e o resultado puramente HTML é retornado ao navegador. Por esse motivo, como já vimos, um programa PHP é escrito dentro de uma estrutura HTML, que terá alguns de seus elementos gerados dinamicamente. Veja alguns elementos básicos do PHP.

* **Extensão do arquivo**: `.php`
* **Tags para a linguagem**: inicia com `<?php` e termina com `?>`.
* **Finalização de linha de comando**: dentro das tags `<?php` e `?>`, cada linha de comando PHP deve terminar com `;`.
* **Comentário de 1 linha de comando**: `# comentário` ou `// comentário`
* **Comentário de blocos de linhas de comando**: `/* várias linhas de comentário */`

PHP – sintaxe básica: [https://www.php.net/manual/pt\_BR/language.basic-syntax.php](https://www.php.net/manual/pt_BR/language.basic-syntax.php)

```php
<?php
  /* Bloco
de comentários*/
  echo "Olá";     // uma linha de comentário: comando PHP termina com ;
  echo "mundo!";  #  uma linha de comentário: comando PHP termina com ;
?>
```


## Variáveis

O PHP é uma linguagem fracamente tipada. Isso significa que não precisamos declarar qual é o tipo de dado quando criamos uma variável. Dessa forma, uma mesma variável pode receber valores numéricos, texto, booleanos, dentre outros, pois o PHP associa automaticamente um tipo de dado à variável, dependendo do valor que ela recebe.

**Declarando variáveis:**

- Não indicamos o tipo de dado da variável e iniciamos seu nome com `$`. Exemplo: `$x`, `$aux`, `$txt`.
- São “case-sensitive”: `$abc` e `$ABC` são duas variáveis diferentes.
- Nome de variável não pode iniciar com um número.
- Nome de variável aceita apenas letras maiúsculas e minúsculas (A-z), números (0-9) e “underline” `_`.

PHP variáveis: [https://www.php.net/manual/pt\_BR/language.variables.php](https://www.php.net/manual/pt_BR/language.variables.php)

### PRÁTICA: Testando variáveis

**EXPERIMENTE**

**Exemplo: VARIÁVEIS: arquivo variaveis.php**

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Teste de PHP</title>
    <style>
        body { background-color: darkolivegreen; }

        p {  font-family: verdana;
             color: white;
             font-size: 16px; }
    </style>
</head>
<body>
    <?php
    // Variável x recebe uma String
    $x = "Linguagem PHP";
    // O ponto . concatena Strings
    echo "<p>A " . $x . " é show!</p>";

    // Variável x recebe a raiz quadrada de 144
    $x = sqrt(144);
    echo "<p>Raiz quadrada de 144 = " . $x . "</p>";

    // Variável aux recebe um valor booleano
    $aux = (5 * 4 > 36);
    if ($aux == true)
        echo "<p>(5 * 4 > 36) = Verdade</p>";
    else
        echo "<p>(5 * 4 > 36) = Falso</p>";
    ?>
</body>
</html>
```