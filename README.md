# Система администрирования таблицы со списком пользователей
## Описание
### Визуализация
Для визуализации системы используется __Bootstrap 4__.
### Валидация форм
В системе осуществляется проверка форм на:
* обязательные поля - _ФИО_ и _E-Mail_, через стандартные средства HTML5
* уникальность - _E-Mail_, с использованием Ajax
### Аутентификация
Аутентификация - серверная, с использованием сессий основаных на cookie, пароли пользователей хранятся в таблице __Authenticate__, сессии - в таблице __Session__.
### Сортировка строк
Для возможности использования сортировки строк использовался плагин [DataTables](https://datatables.net/). Также, с помощью Ajax реализована возможность сохранять порядок строк в БД сервера(поле _sequence_, таблица __User__).
 
