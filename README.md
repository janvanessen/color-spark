
# Color Spark

Create unique color schemes from text descriptions

## Live demo
- [color-spark.janvanessen.com](https://color-spark.janvanessen.com/)

## Frontend Stack
- [Vue](https://vuejs.org/) - JavaScript Framework
- [Vite](https://vitejs.dev/) - Frontend Tooling
- [Axios](https://github.com/axios/axios) - HTTP client
- [PrimeVue](https://primevue.org/) - UI Component Library

## Backend Stack
- [Laravel 10](https://laravel.com/) - PHP Framework
- [Open AI for Laravel](https://github.com/openai-php/laravel) - PHP API client for the [Open AI API](https://platform.openai.com/docs/introduction)

## Deployment
- [Laravel Forge](https://forge.laravel.com/) - Server management

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
