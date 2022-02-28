#Laravel API

* My note
* Laravel 8*

* <code>composer require laravel/passport</code>

* <code>php artisan migrate</code>

* <code>php artisan passport:install</code>

* app > Models > User.php

* <code>use Laravel\Passport\HasApiTokens;</code>

* <code>use HasFactory, Notifiable, hasApiTokens;</code>

* app > Providers > AppServiceProvider.php

* <code>use Laravel\Passport\Passport;</code>

* We need to call the passport route inside the boot method

* <code>Passport::routes();</code>

* config > auth.php

* change <code>'driver' => 'token',</code> to <code>'driver' => 'passport',</code>

* <code>php artisan tinker</code>

```
DB::table('users')->insert(['name'=>'aung aung', 'email'=>'info@bookstore.com', 'password'=>Hash::make('info1234')]);
```

* <code>exit;</code>

# Access Token

* routes > api.php

* Test api Route

```
Route::get('/test', function(Request $request){
    return 'Authenticated';
});
```

* step(1)

<img src="https://i.ibb.co/yk6P4BF/1.png" alt="1" border="0">

* step(2)

* copy access token

<img src="https://i.ibb.co/TPwfWSJ/2.png" alt="2" border="0">

* step(3)

* paste <code>key => Authorization</code> and <code>value => Bearer (access token)</code>

<img src="https://i.ibb.co/G5CzfbH/3.png" alt="3" border="0">

# Building Resources

* Model, Factory, Table, Seeder and Controller

* <code>php artisan make:model -a -r Author</code>

* Database > factories > AuthorFactory.php

* <code>'name' => $this->faker->name</code>

* Database > seeders > AuthorSeeder.php

* <code>\App\Models\Author::factory(5)->create();</code>

* Database > seeders > DatabaseSeeder.php

* <code>$this->call(AuthorSeeder::class);</code>

* <code>php artisan migrate --seed</code>

* Resource create <code>php artisan make:resource AuthorsResource</code>

* AuthorsController

* <code>use App\Http\Resources\AuthorsResource;</code>

* <code>return new AuthorsResource($author);</code>

* app > Http > Resources > AuthorResource

```
return [
    // 'id' => $this->id,
    //change string
    'id' => (string)$this->id,
        'type' => 'Authors',
        'attributes' => [
            'name' => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]
];
```

# CRUD REST API WITH LARAVEL

```
// Route::get('/authors', [AuthorsController::class, 'index']);
// Route::post('/authors', [AuthorsController::class, 'store']);
// Route::get('/authors/{author}', [AuthorsController::class, 'show']);

Route::apiResource('/authors', AuthorsController::class);
```

* AuthorsController > store

```
$faker = \Faker\Factory::create(1);

$author = Author::create([
    'name' => $faker->name
]);

return new AuthorsResource($author);
```

* Change <code>false</code> to <code>ture</code> in StoreAuthorRequest

```
 public function rules()
{
    return [
        'name' => 'required|unique:authors|max:255'
    ];
}
```

* AuthorsController > update

```
$author->update([
    //'name' => 'Kalin'
    'name' => $request->input('name')
]);

return new AuthorsResource($author);
```

* Change <code>false</code> to <code>ture</code> in UpdateAuthorRequest

```
 public function rules()
{
    return [
        'name' => 'required|unique:authors|max:255'
    ];
}
```

* AuthorsController > destroy

```
$author->delete();
return response(null, 204);
```

# Creating to a bookstore

* <code>php artisan make:model Book -a</code>

* <code>php artisan make:migration create_book_author_table</code>

* <code>php artisan make:resource BooksResource</code>

* <code>php artisan tinker</code>

```
DB::table('book_author')->insert(['author_id'=>2, 'book_id'=>1]);
```

* <code>php artisan make:model BookAuthor -a</code>

* Models > BookAuthor

```
public function author()
{
    return $this->hasManyThrough(
        'App\Models\Author',
        'App\Models\BookAuthor',
        'book_id',
        'id',
        'id',
        'author_id',
    );
}
```

* you can hidden in author model

```
protected $hidden = [
    'laravel_through_key',
    'created_at',
    'updated_at',
];
```