# flexy

PROCEDIMENTO PARA A INSTALAÇÃO DO PROJETO LOCALMENTE
APÓS CLONAR O PROJETO no GITHUB,

Entrar na pasta do projeto

RENOMEAR o arquivo .env.example para .env

Editar o arquivo .env e colocar as suas credencias para do Banco de Dados MYSQL

No terminal, na pasta do projeto digitar os seguintes comandos:

# composer install

# composer req orm

# bin/console doctrine:database:create

# bin/console make:migration

# bin/console doctrine:migrations:migrate

Rodar o servidor atraves dos comandos abaixo

# php -S localhost:3000 -t public

abrir o navegador, digitar o endereço abaixo

# localhost:3000

