## Приложение Телефонная книга

### Установка

```bash
cp .env.example .env
composer install
npm install
npm run production
php artisan key:generate
php artisan migrate
php artisan serve
```

### База данных

По умолчанию используется SQLite.

Можно изменить в конфигурации (переменные среды или .env)

### Просмотр

Приложение будет доступно по адресу http://localhost:8000

Swagger по API: http://localhost:8000/api/documentation

### Письма

По умолчанию выставлен драйвер `log` и соотвественно письма будут идти в логи.

Для включения отправки писем нужно выставить актуальные данные smtp-сервера или данные для доступа к сервису отправки
писем.
