<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// :: allows access to the props and methods of the class
Route::get('/', function () {
    return view('welcome');
});

// allows the route to use the auth middleware => so if they are not logged in, they will be re-directed to the login page
Route::get("/pizzas", "PizzaController@index")->name("pizzas.index")->middleware("auth");
Route::post("/pizzas", "PizzaController@store")->name("pizzas.store");
Route::get("/pizzas/create", "PizzaController@create")->name("pizzas.create");
Route::get("/pizzas/{id}", "PizzaController@show")->name("pizzas.show")->middleware("auth");
Route::delete("/pizzas/{id}", "PizzaController@destroy")->name("pizzas.destroy")->middleware("auth");;


// this is essentially a compiled version of the above
// this helps to disable the "register" route => i am guessing it uses the name of the route as the key
Auth::routes([
    "register" => false
]);


Route::get('/home', 'HomeController@index')->name('home');
