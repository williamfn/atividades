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

    `$ mysql -u <usuario> -p < database.sql`

5. Renomear o arquivo .env.example para .env

    `$ mv .env.example .env`

6. Configurarações a serem executadas no arquivo .env

```
    APP_KEY=8feba0e29a3e7563db273a0140d5bc75 (se já estiver preenchida então não precisa alterar)
    DB_DATABASE=atividades
    DB_USERNAME=<usuario do seu banco com acesso a todos databases>
    DB_PASSWORD=<senha do usuario acima>
```

7. Adicionar o seguinte trecho ao final do arquivo .env. Essa configuração é o id de status das atividades concluídas.

    `STATUS_CONCLUIDO_ID=4`

8. Servir a aplicação usando o servidor interno do Laravel

    `$ php artisan serve`

9. Acessar a aplicação em

    http://localhost:8000


Caso aconteça algum erro de biblioteca durante a execução do passo 3, basta instalar o pacote do linux referido no erro. Geralmente a instalação se dará da seguinte forma:

    `$ sudo apt-get install libpng-dev`