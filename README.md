### Instruções de instalação

1. Clonar o repositório

    `$ git clone git@github.com:williamfn/atividades.git`

2. Rodar o composer

    `$ composer install`

3. Rodar o NPM

```
    $ npm install
    $ npm run production
```

4. Executar o script de banco de dados (database.sql) que se encontra na pasta src na raíz do projeto

    `$ mysql -u <usuario> -p <database> < database.sql`

5. Configurar o arquivo .env com os parâmetros do seu banco de dados: nome do database criado, usuário e senha

6. Adicionar o seguinte trecho ao final do arquivo .env. Essa configuração é o id de status das atividades concluídas.

    `STATUS_CONCLUIDO_ID=4`

7. Servir a aplicação usando o navegador interno do Laravel

    `$ php artisan serve`

8. Acessar a aplicação em

    http://localhost:8000