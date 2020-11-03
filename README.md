# Установка
----------------
- Скачиваем, устанавливаем [symfony](https://symfony.com/download)

- Скачиваем, устанавливаем [composer](https://getcomposer.org/download/)

Через терминал в корне выполняем 
```bash
composer install
```
Настройка подключения к БД mysql, в файле `.env.local` прописать/изменить строку (если нет такого файла то создать).
```
DATABASE_URL=mysql://юзер:пароль@127.0.0.1:3306/названиеБД?serverVersion=ВерсияMySQl
```
Запускаем MySQL<br/>
Далее создаем БД через команду 
```bash
php bin/console doctrine:database:create
```
Выполняем миграцию
```bash
php bin/console doctrine:migrations:migrate
```

Запускаем сайт через symfony
```bash
symfony server:start
```

Ура! Сайт запущен
http://localhost:8000/
<br><br>
день 2
----------------
- в инструкции измнено с `composer update` на `composer install`
- `composer.json` очищен от лишних пакетов переходом с `traditional web application` на `microservice Symfony`
- форма symfony вынесена отдельно в `Form/BooksType.php`
- `Repository` очищен от сгенерированного кода
- добавлены тест фикстуры и GET запроса
- изменена схеба бд
