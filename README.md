## Innyx Desafio fullstack 

#### Bibliotecas utilizadas
 - php-open-source-saver/jwt-auth -> https://github.com/PHP-Open-Source-Saver/jwt-auth Para auxiliar na implementação do acesso seguro utilizando JWT
 - moment": "^2.29.4" -> para formatar as datas
 - vue-awesome-paginate: "^1.1.46" -> para gerar os links para os numeros de páginas
 - vue-router: "^4.2.5" -> para gerenciar a navegação pelas rotas
 - vue3-spinners: "^1.2.2" -> para auxiliar no uso do spinner de loading

### Backend
Depois de clonar o projeto 
- criar na raiz o arquivo _.env_ configurar os acessos ao db

```
APP_NAME=innyxbackend
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=
DB_PASSWORD=
DB_DATABASE=
```

- executar os comandos a seguir

Instalar as dependências
``` bash
composer install
```
Gerar a chave JWT
``` bash
php artisan jwt:secret
```
Executar as migrations
```
php artisan migrate
```
Popular o banco de dados
```
php artisan db:seed
```
Rodar o projeto
```
php artisan serve
```
### Frontend
Depois de clonar o projeto acesse a pasta /frontend/innyx na raiz
- criar na pasta _./frontend/innyx_ o arquivo _.env_ 
```
NODE_ENV=development
VITE_API_URL=http://localhost:8000/api/
```
Instalar as dependências
``` bash
npm install
```
Rodar o projeto
```
npm run dev
```
