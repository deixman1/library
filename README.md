# База хранения краткого описания книг
----------------
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

Добавить книги в БД
```
symfony console doctrine:fixtures:load
```

Запускаем сайт через symfony
```bash
symfony server:start
```

Ура! Сайт запущен
http://localhost:8000/


<br>
<br>
<br>
