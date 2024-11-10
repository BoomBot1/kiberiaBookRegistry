## Used
- PHP 8.2
- Laravel 11
- Laravel/Breeze
- Laravel/sanctum
- MySQL
- Laravel\ui - for bootstrap
- All versions described in composer.json


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
- PATCH: /books/{id} - body: title, edition, genres(array of genres id); Auth required
- DELETE: /books/{id} - Auth required
- GET: /authors
- Response: json(
id, name, book_quantity
  )
- GET: /authors/{id}
- Reposen: json(
id, name, books=>[books]
  )
- PATCH: /authors/{id} - body: name; Auth required
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
- php artisan migrate:fresh --seed
- php artisan key:generate
- npm run dev
- php artisan serve (in the second terminal\bash\cmd\ps)
