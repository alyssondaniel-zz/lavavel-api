Create an database metadvp and configure .env like .env.example

## Migration
❯ php artisan migrate

## Seed
❯ php artisan db:seed

## Run
❯ php artisan serve

## Endpoints
+----------+--------------------------------+
| Method   | URI                            |
+----------+--------------------------------+
| GET|HEAD | /                              |
| GET|HEAD | api/comments                   |
| POST     | api/comments                   |
| GET|HEAD | api/comments/{comment}         |
| PUT      | api/comments/{comment}         |
| DELETE   | api/comments/{comment}         |
| POST     | api/departaments               |
| GET|HEAD | api/departaments               |
| GET|HEAD | api/departaments/{departament} |
| PUT      | api/departaments/{departament} |
| DELETE   | api/departaments/{departament} |
| POST     | api/login                      |
| POST     | api/logout                     |
| POST     | api/register                   |
| GET|HEAD | api/tickets                    |
| POST     | api/tickets                    |
| DELETE   | api/tickets/{ticket}           |
| PUT      | api/tickets/{ticket}           |
| GET|HEAD | api/tickets/{ticket}           |
| GET|HEAD | api/user                       |
