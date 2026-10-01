# PHP

Meus estudos de PHP: exercícios e projetos desenvolvidos nos cursos de PHP do [Curso em Vídeo](https://www.cursoemvideo.com/), com o professor Gustavo Guanabara, e anotações teóricas sobre a linguagem.

## Sumário

- [Cursos](#cursos)
- [Projetos desenvolvidos](#projetos-desenvolvidos)
  - [Fundamentos da linguagem](#fundamentos-da-linguagem)
  - [Programação orientada a objetos](#programação-orientada-a-objetos)
- [Como executar](#como-executar)
- Anotações de estudo: [O que é PHP](#o-que-é-php) · [Sintaxe básica](#sintaxe-básica) · [Variáveis](#variáveis) · [Operadores](#operadores)

## Cursos

O material fica na pasta [curso em vídeo/](curso%20em%20vídeo/) e vem de três cursos:

- [Curso de PHP Moderno](https://www.youtube.com/watch?v=TfsO0BGvGn0&list=PLHz_AreHm4dlFPrCXCmd5g92860x_Pbr_)
- [Curso de PHP para Iniciantes](https://www.youtube.com/watch?v=F7KzJ7e6EAc&list=PLHz_AreHm4dm4beCCCmW4xwpmLf6EHY9k)
- [Curso de POO PHP](https://www.youtube.com/watch?v=KlIL63MeyMY&list=PLHz_AreHm4dmGuLII3tsvryMMD7VgcT7x)

As pastas `01` a `14` cobrem os fundamentos da linguagem e a pasta `15-objetos` reúne os projetos de programação orientada a objetos.

## Projetos desenvolvidos

### Fundamentos da linguagem

Cada aula é uma página HTML com código PHP embutido.

| Aula | O que foi praticado |
|---|---|
| [01-echo](curso%20em%20vídeo/01-echo/ola.php) | Primeiro script: `echo` e `print` gerando HTML |
| [02-variaveis](curso%20em%20vídeo/02-variaveis/variaveis.php) | Tipos de dados, conversão com `(int)`, concatenação e interpolação de strings, variáveis por referência (`&`) e variáveis variáveis (`$$`) |
| [03-operadores](curso%20em%20vídeo/03-operadores/operadores.php) | Operadores aritméticos, operador ternário e funções matemáticas (`abs`, `pow`, `sqrt`, `round`, `intval`, `number_format`) |
| [04-input](curso%20em%20vídeo/04-input/input.php) | Leitura de parâmetros da URL com `$_GET`, operador `??` e validação com `is_numeric` (ex.: `input.php?a=2&b=5`) |
| [05-formularios](curso%20em%20vídeo/05-formularios/) | Formulário HTML enviado por GET: o PHP calcula a idade a partir do ano de nascimento e aplica ao CSS o tamanho e a cor de fonte escolhidos, usando `isset` e ternário para os valores padrão. Os dados digitados passam por `htmlspecialchars` (proteção contra XSS), e a cor e a fonte são validadas antes de entrar no CSS |
| [06-if](curso%20em%20vídeo/06-if/if.php) · [07-switch](curso%20em%20vídeo/07-switch/switch.php) | Estruturas condicionais: classificação por faixa etária com `if/elseif/else` e com `switch (true)` |
| [08-while](curso%20em%20vídeo/08-while/while.php) · [09-doWhile](curso%20em%20vídeo/09-doWhile/doWhile.php) · [10-for](curso%20em%20vídeo/10-for/for.php) | Estruturas de repetição: contagem de 1 a 10 com `while`, `do-while` e `for` |
| [11-funcoes](curso%20em%20vídeo/11-funcoes/funcao.php) | Funções com parâmetros e retorno, número variável de argumentos (`func_get_args`, `func_num_args`) e inclusão de arquivos externos (`include`, `require` e as variantes `_once`) |
| [12-string](curso%20em%20vídeo/12-string/string.php) | Mais de 20 funções de manipulação de strings: `printf`, `wordwrap`, `strlen`, `str_word_count`, `explode`/`implode`, `strpos`, `substr`, `str_pad`, `str_replace`, `ucwords` e outras |
| [13-vetores](curso%20em%20vídeo/13-vetores/vetor.php) | Arrays: inclusão e remoção de elementos (`array_push`, `array_pop`, `array_unshift`, `array_shift`, `unset`), `range`, chaves personalizadas e associativas, `foreach`, `count` e ordenação (`sort`, `rsort`, `asort`) |
| [14-matriz](curso%20em%20vídeo/14-matriz/matriz.php) | Arrays multidimensionais (matrizes): criação, leitura e alteração de elementos |

### Programação orientada a objetos

Cada projeto tem um arquivo por classe e um `index.php` que cria os objetos e mostra o estado deles com `print_r`.

#### Classes e objetos — Caneta

[15-objetos/01-Classes](curso%20em%20vídeo/15-objetos/01-Classes/)

Primeira classe do curso: atributos privados, construtor, métodos (`rabiscar`, `tampar`, `destampar`) e métodos acessores e modificadores (getters e setters).

#### Interface e encapsulamento — Controle remoto

[15-objetos/02-encapsulamento/01-interface](curso%20em%20vídeo/15-objetos/02-encapsulamento/01-interface/)

A interface `Controlador` define os comandos (ligar, menu, volume, mudo, play e pause) e a classe `ControleRemoto` a implementa. O estado do controle e os próprios getters e setters são privados, por isso só muda através dos métodos da interface. O volume vai de 0 a 100, em passos de 5, e os comandos só funcionam com o controle ligado.

#### Objetos compostos — Ultra Emoji Combat

[15-objetos/02-encapsulamento/02-ObjetosCompostos](curso%20em%20vídeo/15-objetos/02-encapsulamento/02-ObjetosCompostos/)

Simulador de lutas. O `Lutador` define a própria categoria (leve, médio ou pesado) a partir do peso, num setter privado. A `Luta` recebe dois lutadores e só é aprovada se forem lutadores diferentes, da mesma categoria e dentro dos limites de peso. O resultado (vitória de um deles ou empate) é sorteado e atualiza o cartel de cada lutador.

#### Herança — Pessoa, Aluno e Bolsista

[15-objetos/03-herança](curso%20em%20vídeo/15-objetos/03-herança/)

`Pessoa` é uma classe abstrata com o método `final` `fazerAniversario()`. Dela derivam:

- `Visitante`: herança pobre, não acrescenta nada à classe mãe;
- `Aluno`: herança para diferença, com matrícula, curso e `pagarMensalidade()`;
- `Bolsista`: classe `final` que estende `Aluno`, sobrescreve `pagarMensalidade()` para aplicar o desconto da bolsa e acrescenta `renovarBolsa()`.

#### Polimorfismo — Animal, Mamífero e Canguru

[15-objetos/04-polimorfismo](curso%20em%20vídeo/15-objetos/04-polimorfismo/)

`Animal` é abstrata e declara `locomover()`, `alimentar()` e `emitirSom()` como métodos abstratos. `Mamifero` implementa os três e `Canguru` sobrescreve `locomover()` (polimorfismo de sobreposição). Como o PHP não suporta sobrecarga de métodos, as reações do canguru a estímulos diferentes ficam em métodos separados (`reagirFrase()`, `reagirDono()`, `reagirIdade()`).

#### Agregação entre classes — Plataforma de vídeos

[15-objetos/05-agregação entre classes](curso%20em%20vídeo/15-objetos/05-agregação%20entre%20classes/)

`Video` implementa a interface `AcoesVideo` (play, pause e like). `User` herda da classe abstrata `Pessoa` e chama o construtor da classe mãe com `parent::__construct()`. `Visualizacao` agrega um usuário e um vídeo: ao ser criada, soma uma visualização ao vídeo e um vídeo assistido ao usuário.

## Como executar

É preciso ter o PHP 7.1 ou superior (todas as aulas foram testadas no PHP 8.5), usando o servidor embutido do PHP ou um pacote como XAMPP ou WampServer. Com o servidor embutido, inicie-o **dentro da pasta da aula**, porque os projetos de POO carregam as classes com `require_once './Classe.php'`, um caminho que depende do diretório de trabalho:

```bash
git clone https://github.com/marcospontoexe/PHP.git
cd "PHP/curso em vídeo/15-objetos/03-herança"
php -S localhost:8000
```

Depois abra `http://localhost:8000/index.php` no navegador, ou o nome do arquivo da aula (ex.: `ola.php`, `string.php`). Na aula `05-formularios`, comece pelo `index.html`.

Projeto distribuído sob a licença MIT. Veja [LICENSE](LICENSE).

---

## O que é PHP

PHP significa **Hypertext Preprocessor**. É uma linguagem de script open source, usada no desenvolvimento de aplicações web integradas com HTML. Arquivos PHP podem conter HTML, CSS, JavaScript e código PHP. A interpretação retorna um documento HTML puro ao navegador.

O php é uma linguagem de programação que executará em um servidor especial, o **HTTP server**:

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

### Escopo de Variáveis

No PHP, o escopo de variáveis define onde elas podem ser acessadas:

- **Variáveis locais**: definidas dentro de funções e acessíveis apenas dentro delas.
- **Variáveis globais**: definidas no escopo global e acessíveis dentro de funções desde que explicitadas via `global`.
- **Variáveis superglobais**: arrays pré-definidos pelo PHP que contêm informações específicas, como `$_GET`, `$_POST`, `$_SESSION`, `$_COOKIE`, `$_SERVER`, entre outros.

```php
<?php
$x = "mundo"; // variável global
function ola() {
    global $x;
    echo "Olá " . $x;
}
ola(); // saída: Olá mundo
?>
```


## Operadores

### 1. Operadores Aritméticos

- `+` Adição
- `-` Subtração
- `*` Multiplicação
- `/` Divisão
- `%` Módulo
- `**` Exponenciação (PHP 5.6+)

```php
<?php
echo 5 + 2; // 7
echo 5 ** 2; // 25
?>
```

### 2. Operadores de Atribuição

- `=` Atribuição básica
- `+=, -=, *=, /=, %=, .=` Atribuição composta

```php
<?php
$a = 10;
$a += 5; // $a = 15
$str = "Olá";
$str .= " Mundo"; // "Olá Mundo"
?>
```

### 3. Operadores de Comparação

- `==` Igualdade (valor)
- `===` Idêntico (valor e tipo)
- `!=` Diferente
- `!==` Não idêntico
- `<, >, <=, >=`
- `<=>` Nave Spaceship (PHP 7+)

```php
<?php
var_dump(5 == '5'); // true
var_dump(5 === '5'); // false
?>
```

### 4. Operadores Lógicos

- `&&` E lógico
- `||` Ou lógico
- `!` Negação
- `and, or, xor` equivalentes de baixo precedência

```php
<?php
if ($a > 0 && $b > 0) {
    // ambos positivos
}
?>
```