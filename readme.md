Для установки нужно поднять контейнеры, зайти в контейнер с PHP, скопировать .env.example в .env и запустить миграции

Токен для API хранится в **API_TOKEN** 

Данные для первой задачи зайдут вместе с миграциями

Запрос:

``` sql
select u.id,
concat(u.first_name, ' ', u.last_name) as name,
b.author,
group_concat(b.name SEPARATOR ', ')    as books
from users_test u
join user_books ub on u.id = ub.user_id
join books b on ub.book_id = b.id
where u.age between 7 and 17
group by u.id, b.author
having count(*) = 2
```

