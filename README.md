
# Color Spark

Create unique color schemes from text descriptions

## Frontend Stack
- [Vue](https://vuejs.org/) - JavaScript Framework
- [Vite](https://vitejs.dev/) - Frontend Tooling
- [Axios](https://github.com/axios/axios) - HTTP client
- [PrimeVue](https://primevue.org/) - UI Component Library

## Backend Stack
- [Laravel 10 - PHP Framework](https://laravel.com/)
- [Open AI for Laravel](https://github.com/openai-php/laravel)

## Deployment
- [Laravel Forge](https://forge.laravel.com/)

## Setup

```
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Add OPEN AI credentials to .env file:

```
OPENAI_API_KEY=
OPENAI_ORGANIZATION=
```

## Run
```
php artisan serve
npm run dev
```
