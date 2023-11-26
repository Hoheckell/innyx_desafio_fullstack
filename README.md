## Innyx Desafio fullstack 

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
Depois de clonar o projeto
- criar na raiz o arquivo _.env_ 
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
