# Система администрирования таблицы со списком пользователей
## Описание
### Визуализация
Для визуализации системы используется __Bootstrap 4__.
### Валидация форм
В системе осуществляется проверка форм на:
* обязательные поля - _ФИО_ и _E-Mail_, через стандартные средства HTML5,
* уникальность - _E-Mail_, с использованием Ajax.
### Аутентификация
Аутентификация - серверная, с использованием сессий основанных на cookie, пароли пользователей хранятся в таблице __Authenticate__, сессии - в таблице __Session__.
### Сортировка строк
Для возможности использования сортировки строк используется плагин [DataTables](https://datatables.net/). Также, с помощью Ajax реализована возможность сохранять порядок строк в БД сервера(поле _sequence_, таблица __User__).

## Установка
### Требования
Для установки необходим сервер с:
* PHP
* MySQL
### Установка
1. Создаём базу и разворачиваем дамп из папки _db_:

(MySQL)`CREATE DATABASE usersadmin;`

(CLI)`cd db`

(CLI)`mysql -u usersadmin -p usersadmins < usersadmin.sql`

2. Указываем параметры базы и время жизни сессионных cookie в конфигурационном файле системы [config/config.php](config/config.php):
```php
//Db settings
define(DB_HOST,     "localhost");
define(DB_LOGIN,    "usersadmin");
define(DB_PASSWORD, "usersadmin");
define(DB_NAME,     "usersadmin");
//Cookie lifetime in seconds
define(COOKIE_LIFETIME, 86400);
```
