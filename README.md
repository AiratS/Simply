Simply
============================

Социальная сеть, построенная на Symfony и Vue.js (в процессе разработки)

- Клиентская часть построена на Vue.js по архитектруе SPA.
- Аутентификация клиента производится по JWT токену, который устанавливается на клиенте как куки, с флагом HttpOnly,
для предотвращения чтения через JavaScript код.

Установка
---------

Чтобы запускать контейнеры от имени текущего пользователя, создайте файл `.env` в директории `<application-root>/docker` и определите переменные среды:

> UID=1000 <br/>
> GID=1000

По умолчанию используется значения `UID=1000` и `GID=1000`.

* Чтобы собрать и поднять контейнеры запустите команду в директории `<application-root>/docker`:
  
> docker-compose -p simply up --build -d

* Чтобы установить зависимости php запустите команду:

> docker exec -it simply_php_1 composer install

После установки зависимостей, следует создать SSL ключи для JWT аутентификация.
* Для этого запустите команду

> docker exec -it simply_php_1 php bin/console lexik:jwt:generate-keypair

Ваши ключи сохранятся в `<application-root>/config/jwt/private.pem` и `<application-root>/config/jwt/public.pem` (если вы не указали другой путь).

Подробнее о генерации SSL ключей можно узнать: [`https://github.com/lexik/LexikJWTAuthenticationBundle/blob/2.x/Resources/doc/index.md#generate-the-ssl-keys`](https://github.com/lexik/LexikJWTAuthenticationBundle/blob/2.x/Resources/doc/index.md#generate-the-ssl-keys)

Разработка
---------

#### Php разработка:

Все настройки xdebug определены в файле `<application-root>/docker/php/php.ini`. 

По умолчанию xdebug стучиться на порт 9003.


* Для запуска тестов запустите команду:

> docker exec -it simply_php_1 php vendor/bin/phpunit

* Для запуска статического анализатора запустите команду:

> docker exec -it simply_php_1 php vendor/bin/phpstan analyse

* Для просмотра ошибок по код стайлу запустите команду:

> docker exec -it simply_php_1 php vendor/bin/php-cs-fixer fix --dry-run -vvv

* Для автоматического исправления ошибок по код стайлу запустите команду:

> docker exec -it simply_php_1 php vendor/bin/php-cs-fixer fix -vvv


#### JavaScript разработка:

Все зависимости JavaScript должны установиться автоматически после запуска контейнеров.
* Для ручной установки зависимостей запустите команду:

> docker exec -it simply_node_1 yarn install

После поднятия контейнеров, также должна запуститься команда для слежения за изменениями js и стилей, и их автоматической компиляции.
* Для ручного запуска команды слежения за файлами и компиляции запустите команду:

> docker exec -it simply_node_1 yarn watch

* Для анализа качества JavaScript кода запустите команду:

> docker exec -it simply_node_1 yarn run eslint assets/js/
