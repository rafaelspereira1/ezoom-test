# Ezoom Test Técnico com CodeIgniter 4

## Requisitos do teste

Use o framework CodeIgniter para criar a API.
Utilize um banco de dados MySQL para armazenar as tarefas.
Implemente autenticação básica.
Utilize Docker para conteinerização do projeto.
A API deve fornecer endpoints para realizar as seguintes operações:

Listar todas as tarefas.
Obter os detalhes de uma tarefa específica.
Criar uma nova tarefa.
Atualizar uma tarefa existente.
Excluir uma tarefa.

## Como rodar o projeto

1. Rode o banco de dados via container com o Docker

```bash
sudo docker-compose up -d
```

2.Instale as dependencias do projeto

```bash
composer install
```

3. Copie o arquivo env e altere seu nome para .env

4.Rode o Code Igniter

```bash
php spark serve
```

5.Utilize a collection do postman para testar a api

```bash
https://www.postman.com/rafaelspereira11/workspace/ezoom-test
```

## Observações

Primeiro se deve criar um usuario para poder utilizar a api, para isso basta fazer uma requisição POST para o endpoint api/register como demonstrado na collection do postman. Após isso se deve utilizar o token de autenticação gerado para poder utilizar os demais endpoints da api.

Este projeto utiliza o conceito de bearer token como metodo de autenticação.
