# Установка
----------------
Настройка подключения к БД mysql в файле `.env`.
```
DATABASE_URL=mysql://юзер:пароль@127.0.0.1:3306/названиеБД?serverVersion=ВерсияMySQl
```

- Скачиваем, устанавливаем [symfony](https://symfony.com/download)

- Скачиваем, устанавливаем [composer](https://getcomposer.org/download/)

Через терминал в корне выполняем 
```bash
composer update
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
