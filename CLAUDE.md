# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Natureza do repositório

Repositório de **estudos de PHP** (sem aplicação, sem dependências). Todo o conteúdo — código, comentários, nomes de classes/variáveis e documentação — está em **português (pt-BR)**; mantenha esse idioma ao editar ou criar ficheiros.

Partes do repositório:

- [README.md](README.md) — apostila/tutorial em Markdown (HTTP/HTTPS, sintaxe, variáveis, escopo, operadores...). Cada tópico segue o padrão: explicação → bloco `php`/`html` de exemplo (seções "PRÁTICA") → link para o manual pt_BR em php.net. As imagens estão em [Imagens/](Imagens/) mas são referenciadas por URL absoluta do GitHub (`https://github.com/marcospontoexe/PHP/blob/main/Imagens/N.jpg`), não por caminho relativo.
- [index.php](index.php) — página inicial com links para todas as aulas (lista fixa em arrays `$fundamentos` e `$poo`; atualize-a ao criar ou renomear uma aula).
- [curso em vídeo/](curso%20em%20vídeo/) — exercícios de três cursos do Curso em Vídeo (PHP Moderno, PHP para Iniciantes e POO PHP, links no README), um diretório numerado por aula (`01-echo` … `15-objetos`). Cada aula é autocontida. `01`–`14` são fundamentos; `15-objetos` é o curso de POO.

O README também é a vitrine do repositório: o utilizador pretende incluir estes projetos num portfólio. A seção "Projetos desenvolvidos" do README descreve cada aula/projeto — mantenha-a atualizada quando uma aula for adicionada ou alterada.

## Executar / verificar

Não há build, composer, testes nem linter. Os scripts são páginas HTML com blocos `<?php ?>` embutidos, pensadas para abrir no navegador via servidor PHP:

```powershell
# servir tudo a partir da raiz: o index.php da raiz lista todas as aulas com links
php -S localhost:8000
# verificação de sintaxe de um ficheiro
php -l "curso em vídeo\12-string\string.php"
```

Nesta máquina:
- **PHP 8.5** foi instalado com `winget install PHP.PHP.8.5` (sem `php.ini`). Num shell aberto antes da instalação, recarregue o PATH: `$env:Path = [Environment]::GetEnvironmentVariable('Path','User') + ';' + [Environment]::GetEnvironmentVariable('Path','Machine')`.
- O `git` não está no PATH. Use o do GitHub Desktop: `(Get-ChildItem "$env:LOCALAPPDATA\GitHubDesktop\app-*\resources\app\git\cmd\git.exe" | Select-Object -Last 1).FullName`.
- No PowerShell 5.1, `php -r "<código>"` estraga as aspas. Grave o código num arquivo `.php` e execute-o.

O resultado da execução de todas as aulas no PHP 8.5 (erros confirmados, XSS, erros de digitação e melhorias) está em [DOCS/verificacao-aulas.md](DOCS/verificacao-aulas.md).

Particularidades das aulas:
- [04-input/input.php](curso%20em%20vídeo/04-input/input.php) lê `$_GET["a"]` e `$_GET["b"]`: abra com `?a=2&b=5` na URL (sem parâmetros, mostra uma instrução).
- [05-formularios](curso%20em%20vídeo/05-formularios/) — `index.html` envia por GET para `formulario.php`. O `.idea/` e o `main.py` são restos do PyCharm, não fazem parte da aula.
- [11-funcoes/funcao.php](curso%20em%20vídeo/11-funcoes/funcao.php) faz `include "externa.php"`.

## Estrutura de POO (`15-objetos/`)

Cada subpasta (`01-Classes`, `02-encapsulamento/01-interface`, `02-encapsulamento/02-ObjetosCompostos`, `03-herança`, `04-polimorfismo`, `05-agregação entre classes`) é um **projeto NetBeans PHP** separado (`nbproject/`), com:
- um ficheiro por classe/interface, com o mesmo nome da classe (`Pessoa.php` → `class Pessoa`);
- um `index.php` como ponto de entrada, que carrega as classes e mostra os objetos com `print_r`/`var_dump` dentro de `<pre>`;
- cada ficheiro de classe faz `require_once` da sua superclasse/interface (ex.: `Bolsista` → `Aluno` → `Pessoa`), formando a cadeia de dependências. Sem namespaces nem autoload.

Os `require_once` misturam `'Classe.php'` e `'./Classe.php'`. A forma com `./` resolve pelo diretório de trabalho: funciona com `php -S` (que muda o cwd para a pasta do script) e com Apache, mas não com `php index.php` executado de outra pasta.

Convenções seguidas nas classes: atributos `private`/`protected` **tipados** (`?tipo = null` para os que só são preenchidos por setters), construtor `__construct`, getters/setters com tipos de parâmetro e retorno, comentários didáticos explicando o conceito (ex.: "método final, não pode ser sobreposto"). Os conceitos de cada pasta: herança com classe `abstract` e métodos `final`, interfaces implementadas (`Controlador`, `AcoesVideo`), objetos compostos (`Luta` usa `Lutador`) e agregação (`Visualizacao` agrega `User` e `Video`).

## Cuidados

- Caminhos contêm **espaços e acentos** (`curso em vídeo`, `herança`, `agregação entre classes`) — sempre entre aspas no shell e codificados (`%20`) em links Markdown.
- [.gitattributes](.gitattributes) usa `* text=auto` (normalização de fins de linha para LF).

---

## Regra: Persistência de Contexto (Handoff entre sessões)

### Objetivo

Garantir que nenhum trabalho se perca quando a sessão atual se tornar demasiado longa. O agente deve gravar todo o estado da sessão num ficheiro de handoff, de forma que **qualquer outro chat consiga retomar exatamente de onde parou**, com o mesmo contexto.

---

### Gatilho

Execute o procedimento de salvamento abaixo **antes de continuar qualquer tarefa** sempre que uma das seguintes condições for atingida:
1. A conversa prolongar-se por muitas interações (aproximando-se do limite prático da janela de contexto).
2. Uma funcionalidade ou milestone importante for concluída.
3. O utilizador disser explicitamente: `salvar contexto`, `handoff` ou `checkpoint`.

---

### Procedimento de salvamento

1. **Termine** a tarefa atual.
2. Crie ou atualize o arquivo **`CONTEXTO.md`** na raiz do projeto.
   - Se já existir, **atualize** as seções em vez de duplicar (mantenha o histórico relevante, remova o que já foi superado).
   - Sempre atualize o campo de data/hora e o número da sessão.
3. Preencha **todas** as seções do template abaixo. Não deixe seções vazias — escreva "nenhum" quando não houver conteúdo.
4. Confirme ao usuário que o contexto foi salvo e informe o caminho do arquivo.
5. **Gestão do CONTEXTO.md:**  Mantenha o CONTEXTO.md enxuto. Ele segue o template abaixo, mas cada seção deve ter só o resumo. Quando um tópico precisar de mais detalhe (uma decisão longa, um passo a passo, etc.), escreva-o num ficheiro em DOCS/ na raiz do projeto e coloque no CONTEXTO.md apenas o link para ele. O objetivo é não sobrecarregar a janela de contexto ao ler o CONTEXTO.md. Se precisar de mais informações sobre um tópico, abra o ficheiro específico em DOCS/.

---

### Template do `CONTEXTO.md`

```markdown
# CONTEXTO DA SESSÃO

- **Última atualização:** AAAA-MM-DD HH:MM
- **Sessão nº:** N
- **Status geral:** (em andamento | bloqueado | pronto para revisão)

## 1. Objetivo da tarefa
Descrição em 1–3 frases do que estamos tentando alcançar (o "porquê").

## 2. Já feito ✅
- Itens concluídos, com o(s) arquivo(s) afetado(s).
- Ex.: "Implementado endpoint POST /login em `src/auth.py`"

## 3. Em andamento 🔧
- O que estava sendo feito no momento do checkpoint.
- Em qual arquivo/linha parei e qual era o próximo passo imediato.

## 4. Próximos passos (planejado) 📋
- Lista ordenada do que falta fazer.
- Quanto mais específico, melhor (arquivo, função, comportamento esperado).

## 5. Decisões e raciocínio 🧠
- Escolhas técnicas feitas e o porquê.
- Alternativas descartadas (para evitar refazer a análise).
- Suposições assumidas.

## 6. Estado do projeto / ambiente
- Arquivos-chave e o papel de cada um.
- Branch git atual, alterações não commitadas, migrations pendentes, etc.
- Variáveis de ambiente ou dependências relevantes.

## 7. Bloqueios e pendências ⚠️
- Erros não resolvidos, dúvidas para o usuário, decisões aguardando aprovação.

## 8. Comandos úteis
- Comandos para rodar/testar/buildar o projeto.
- Ex.: `npm run dev`, `pytest tests/`, etc.

## 9. Como retomar
Instrução direta para o próximo chat: "Leia este arquivo e continue a partir
da seção 3 / passo X."
```

---

### Como retomar em um novo chat

No início de qualquer nova sessão, o agente deve:

1. Verificar se existe o ficheiro `CONTEXTO.md` na raiz do projeto .
2. Se existir, **lê-lo por completo antes de qualquer outra ação**.
3. Resumir ao utilizador em 2–3 linhas onde o trabalho parou e qual é o próximo passo, e então continuar.

> Comando sugerido para o utilizador iniciar um novo chat:
> **"Leia o `CONTEXTO.md` e continue de onde a sessão anterior parou."**

---

### Boas práticas

- **Escreva para um estranho:** o próximo chat não tem memória nenhuma; seja explícito.
- **Caminhos absolutos ou relativos à raiz**, nunca referências vagas ("aquele arquivo").
- **Não salve segredos** (tokens, senhas, chaves) no `CLAUDE.md` e `CONTEXTO.md`.
- **Um arquivo por projeto:** mantenha `CONTEXTO.md` enxuto; arquive versões antigas em `CONTEXTO.arquivo.md` se necessário.
- **Commit opcional:** se o usuário usar git, ofereça commitar o `CONTEXTO.md` para que ele persista entre máquinas.
- **Feedback de alterações:** Caso algum ficheiro seja alterado durante a sessão, informe sempre qual o ficheiro e o que foi alterado no final de cada mensagem.
- **referenciar diretórios e arquivos atraves de links:** Sempre que se referir a um diretório ou arquivo local, use link e não backticks.
