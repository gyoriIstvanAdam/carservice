NMP INSTALL COMPOSER INSTALL

Migration és adatfeltöltés autómata de egy php artisan migrate nem árt ha elakad.

Create .env file!

.env helper:

APP_NAME=CarService APP_ENV=local APP_KEY=base64: APP_DEBUG=true APP_TIMEZONE=UTC APP_URL=http://carservice.test

APP_LOCALE=en APP_FALLBACK_LOCALE=en APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack LOG_STACK=single LOG_DEPRECATIONS_CHANNEL=null LOG_LEVEL=debug

DB_CONNECTION=mysql DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=carservice DB_USERNAME= Saját Felh név DB_PASSWORD= "Saját jelszó"

Verzio: php -v PHP 8.3.17 (cli) (built: Feb 11 2025 22:39:27) (NTS Visual C++ 2019 x64)

composer --version Composer version 2.7.7 2024-06-10 22:11:12

node -v v22.14.0

npm -v
11.1.0

npm list vue +-- @inertiajs/inertia-vue3@0.6.0 | -- vue@3.5.13 deduped +-- @inertiajs/vue3@2.0.3 | -- vue@3.5.13 deduped +-- @vitejs/plugin-vue@5.2.1 | -- vue@3.5.13 deduped +-- laravel-vue-i18n@2.7.8 | -- vue@3.5.13 deduped +-- lucide-vue-next@0.475.0 | -- vue@3.5.13 deduped +-- pinia@3.0.1 | -- vue@3.5.13 deduped `-- vue@3.5.13

php artisan --version Laravel Framework 11.22.0

Built in PHPSTORM 24.03

Dev Env: Laravel Herd