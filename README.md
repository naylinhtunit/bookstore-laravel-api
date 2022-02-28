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

* <code>DB::table('users')->insert(['name'=>'aung aung', 'email'=>'info@bookstore.com', 'password'=>Hash::make('info1234')]);</code>

* <code>exit;</code>

# Access Token

* routes > api.php

* Test api Route

* <code>Route::get('/test', function(Request $request){
    return 'Authenticated';
});</code>

<img src="https://i.ibb.co/yk6P4BF/1.png" alt="1" border="0">

<img src="https://i.ibb.co/TPwfWSJ/2.png" alt="2" border="0">

<img src="https://i.ibb.co/G5CzfbH/3.png" alt="3" border="0">