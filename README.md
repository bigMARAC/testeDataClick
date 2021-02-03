## 🔥 Questão 01
Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima “Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos de ambos (3 e 5), imprima “FizzBuzz”.

## 🔥 Questão 02

Refatore o código abaixo, fazendo as alterações que julgar necessário.

```php
if (isset($_SESSION['loggedin']) && $_SESSIO ['loggedin'] == true) {
    header("Location: http://www.google.com");
    exit();
} elseif (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) {
    header("Location: http://www.google.com");
    exit();
```

## 🔥 Questão 03
Refatore o código abaixo, fazendo as alterações que julgar necessário.

```php
class MyUserClass
{
    public function getUserList()
    {
        $dbconn = new DatabaseConnection('localhost','user','password');
        $results = $dbconn->query('select name from user');
        sort($results);
        return $results;
    }
}
```

## 🔥 Questão 04
Desenvolva uma API Rest para um sistema gerenciador de tarefas (inclusão/alteração/exclusão). As tarefas consistem em título e descrição, ordenadas por prioridade.

#### Requisitos:
* Linguagem PHP ☑️;
* Banco de Dados MySQL ou PostgreSQL ☑️;
* Criação de interface para visualização da lista de tarefas ☑️;
* Publicar no GitHub e informar o link por e-mail ☑️;
* *Interface com drag and drop;
* Interface responsiva (desktop e mobile)☑️;
* **Teste Automatizado;
* ***Publicar projeto funcionando no Heroku;

#### Inicializar a Apliação:
Questao04/web/
```
npm install
```
Questao04/web/
```
npm run serve
```
Questao04/api/
```
php -S HOST:Porta
```

## 🔥 Questão 05

#### Descrição:
* Criar um aplica vo web para gerenciamento de clubes e associados.
* O aplicavo deverá ser feito ulizando qualquer tecnologia web, é preferível ulizar o
PHP com algum framework de desenvolvimento. Para o banco de dados, usar PostgreSQL ou MySQL.
* No front-end, você pode ulizar qualquer ferramenta (angular, vue.js, bootstrap...).

#### Requisitos:
#### 1. Crie uma tela para cadastrar um clube de futebol.
 * Esta tela deve conter somente o campo “Nome do clube”.
#### 2. Crie uma tela para listar os clubes cadastrados.
* A listagem dos clubes cadastrados deve estar em ordem alfabéca.
* Essa tela deve ser capaz de excluir o clube cadastrado.
#### 3. Crie uma tela para cadastrar um sócio.
* Esta tela deve conter o campo “Nome completo” e o campo “Clube” para a associação deste sócio. Os clubes são os cadastrados no passo 1.
* O sócio poderá estar associado à mais de um clube.
#### 4. Crie uma tela para listar os sócios criados.
* Esta listagem deve constar todos os sócios cadastrados e constar o clube na qual o sócio está associado.
* A listagem deve estar por ordem alfabéca de clube, depois por sócio.
* Essa tela deve ser capaz de excluir o sócio.
#### 5. Publicar projeto funcionando no Heroku.
&nbsp; 
### Comentários ao avaliador
*A interface drag and drop mostrou-se complexa de se fazer, pretende-se terminá-la

**Por mais que ja tenha ouvido falar de Testes Automatizados nunca fiz um, mas pretendo aprender se necessário

***Foi conversado com o avaliador por mensagens privadas