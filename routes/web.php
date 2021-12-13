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

Route::get('/', function () {
    return view('welcome');
});

// :: allows access to the props and methods of the class
Route::get("/pizzas", function() {
    $pizzas = [
        ["type" => "pepperoni", "base" => "cheesy crust"],
        ["type" => "volcano", "base" => "garlic crust"],
        ["type" => "veg supreme", "base" => "thin & crispy"] 
    ];

    return view("pizzas", [
        "pizzas" => $pizzas, 
        // accessing query params
        "name" => request("name"), 
        "age" => request("age")
    ]);
});


// accessing route params
Route::get("/pizzas/{id}", function($id) {
    return view("details", [
        "id" => $id
    ]);
});