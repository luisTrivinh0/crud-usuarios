# API CRUD com Controle de Acesso em Níveis - Laravel

Este é um exemplo de API CRUD básica desenvolvida usando Laravel para gerenciar usuários com diferentes níveis de acesso. A API utiliza o Laravel Passport para autenticação e implementa um sistema de controle de acesso baseado em níveis de usuário, incluindo os perfis de Administrador, Moderador e Financeiro.

## Recursos

A API CRUD oferece as seguintes funcionalidades:

- Registro de novos usuários
- Autenticação de usuários com geração de token de acesso (Bearer token)
- Gerenciamento de usuários (CRUD)
- Atribuição de perfis de usuário (Administrador, Moderador, Financeiro)
- Restrições de acesso com base nos níveis de usuário

## Tecnologias Utilizadas

- Laravel 10
- Laravel Passport para autenticação e geração de token
- Banco de Dados MySQL

## Configuração do Ambiente

1. Clone este repositório para sua máquina local.
2. Instale as dependências do projeto executando o comando `composer install`.
3. Configure as informações de conexão do banco de dados no arquivo `.env`.
4. Execute as migrações do banco de dados usando o comando `php artisan migrate`.
5. Instale as chaves do Passport usando o comando `php artisan passport:install`.
6. Execute a seeder para criar as roles e usuários iniciais executando o comando php artisan db:seed --class=RolesAndUsersSeeder.
7. Inicie o servidor de desenvolvimento com o comando php artisan serve.

Certifique-se de que o Composer, o PHP e o banco de dados estejam configurados corretamente em seu ambiente antes de prosseguir com os passos acima.

## Rotas da API

A API possui as seguintes rotas disponíveis:

### Autenticação

- POST `/login` - Realiza o login do usuário e retorna um token de acesso válido.
- POST `/logout` - Realiza o logout do usuário e revoga o token de acesso.
- POST `/refresh` - Atualiza o token de acesso.
- POST `/me` - Retorna os dados do usuário autenticado.

### CRUD de Usuários

- GET `/users` - Retorna a lista de usuários.
- POST `/users` - Cria um novo usuário.
- GET `/users/{user}` - Retorna os detalhes de um usuário específico.
- PUT `/users/{user}` - Atualiza as informações de um usuário.
- DELETE `/users/{user}` - Remove um usuário.

### CRUD de Administrador

- GET `/admin` - Retorna a lista de administradores.
- POST `/admin` - Cria um novo administrador.
- GET `/admin/{admin}` - Retorna os detalhes de um administrador específico.
- PUT `/admin/{admin}` - Atualiza as informações de um administrador.
- DELETE `/admin/{admin}` - Remove um administrador.

### CRUD de Moderador

- GET `/moderator` - Retorna a lista de moderadores.
- GET `/moderator/{moderator}` - Retorna os detalhes de um moderador específico.

### CRUD de Financeiro

- PUT `/financial/{financial}` - Atualiza as informações de um usuário do departamento financeiro.
- DELETE `/financial/{financial}` - Remove um usuário do departamento financeiro.

## Controle de Acesso

A API implementa o controle de acesso com base nos perfis de usuário. Aqui estão os níveis de acesso permitidos para cada perfil:

- Administrador: Poder total com acesso a todas as rotas.
- Moderador: Apenas acesso de leitura (visualização) das rotas de usuário.
- Financeiro: Dois níveis - um com permissão para editar e outro com permissão para excluir usuários do departamento financeiro.

## Contribuindo

Sinta-se à vontade para contribuir com este projeto abrindo uma nova issue ou enviando um pull request. Toda ajuda é bem-vinda!

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
