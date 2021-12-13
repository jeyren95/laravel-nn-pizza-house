<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

// Controllers register actions that fire when certain routes are visited

// Controller actions naming convention
    // index = show all the records
    // show = show a single record
    // create = create a record
class PizzaController extends Controller
{
    // when an instance of the pizza controller is declared, the construct function will be called
    // this will protect all the routes associated with the Pizza controller
    // public function __construct() {
    //     $this->middleware("auth");
    // } 

    public function index() {
        // 1. Get all entries in table
        // $pizzas = Pizza::all(); => all method inherited from model class

        // 2. Get all entries in table, ordered by a certain attribute
        $pizzas = Pizza::orderBy("name")->get();

        // 3. Get all entries in a table, filtered by a certain condition
        // $pizzas = Pizza::where('type', 'pepperoni')->get();

        // 4. Get all entries ordered by date (with the latest first)
        // $pizzas = Pizza::latest()->get();
        
        // naming conventions for views
            // the name of the view should be the same as the name of action that returns it
            // i.e. index
        return view("pizzas.index", [
            "pizzas" => $pizzas
        ]);
    }

    // accessing route params
    public function show($id) {
        // find if the id exists in the table, if not give 404
        $pizza = Pizza::findOrFail($id);

        return view("pizzas.show", [
            "pizza" => $pizza
        ]);
    }

    public function create() {
        return view("pizzas.create");
    }

    public function store() {
        // create an object instance of the pizza model
        $pizza = new Pizza();
        $pizza->name = request("name");
        $pizza->type = request("type");
        $pizza->base = request("base");

        // in order to place the checked values into an array => use <input type="checkbox" name="toppings[]" />
        $pizza->toppings = request("toppings");
    
        // error_log is like console.log
        error_log($pizza);
        $pizza->save();

        return redirect("/")->with("message", "Thanks for your order");
    }

    public function destroy($id) {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        error_log($pizza);

        return redirect("/")->with("message", "Successfully deleted your order");
    }
}
