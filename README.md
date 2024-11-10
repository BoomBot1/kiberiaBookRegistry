## Used
- PHP 8.2
- Laravel 11.30.00
- Laravel/Breeze
- Laravel/sanctum
- MySQL 8.3
- Laravel\ui - for bootstrap


## API:
Route's start with '/api'
routes:
- POST: /login - body: email, password
- Response: ['token' => BearerToken (should be used for auth)]
- GET: /books?paginate=integer(default = 15)&page=integer(default = 1)
- Response: json(
'id', 'title', 'name'(author name)
  )
- GET: /books/{id}
- Response: json(
'id', 'title', 'edition', 'created_at', 'author_id'
  )
- PATCH: /books/{id} - body: title, edition, genres(array of genres id); Auth required (Bearer token in Authorization header)
- DELETE: /books/{id} - Auth required (Bearer token in Authorization header)
- GET: /authors
- Response: json(
id, name, book_quantity
  )
- GET: /authors/{id}
- Reposen: json(
id, name, books=>[books]
  )
- PATCH: /authors/{id} - body: name; Auth required (Bearer token in Authorization header)
- GET: /genres?paginate=integer&page=integer
- Response: json(
id, title, books =>[books]
  )


## Admin panel:
first: migrate with --seed
- admin creds:
- admin@example.com
- kiberia


second: log in with admin creds on '...:8000/login'. Click on "admin" in navigation panel

## Project init:
add your .env file via .env.example. Run:
- php artisan migrate:fresh --seed ( В ином случае, нужно будет создать админа. В таблице users есть boolean колонка admin)
- php artisan key:generate
- npm run dev
- php artisan serve (in the second terminal\bash\cmd\ps)

## Description
- Каждый author привязан к соотвествующему user, по которому и проходит авторизация для доступа к patch, delete запросам
- Логирование происходит в базу, таблицу logs. Формат лога: "changed_att1: old_value->new_value; changed_att2: old_value->new_value ...." в поле message.
