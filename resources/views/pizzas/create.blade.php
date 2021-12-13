@extends('layouts.app')

@section("content")
<div class="wrapper create-pizza">
    <h1>Create a new pizza</h1>
    <form method="post" action="/pizzas">
        @csrf
        <label for="name">Your name:</label>
        <input type="text" id="name" name="name" />

        <label for="type">Choose pizza type:</label>
        <select id="type" name="type">
            <option value="margherita">Margherita</option>
            <option value="pepperoni">Pepperoni</option>
            <option value="hawaiian">Hawaiian</option>
            <option value="volcano">Volcano</option>
        </select>

        <label for="base">Choose your base:</label>
        <select id="base" name="base">
            <option value="cheesy-crust">Cheesy Crust</option>
            <option value="garlic-crust">Garlic Crust</option>
            <option value="thin-and-crispy">Thin & Crispy</option>
            <option value="thick">Thick</option>
        </select>

        <fieldset>
            <label>Extra toppings</label>
            <input type="checkbox" name="toppings[]" value="mushrooms" />Mushrooms<br />
            <input type="checkbox" name="toppings[]" value="peppers" />Peppers<br />
            <input type="checkbox" name="toppings[]" value="garlic" />Garlic<br />
            <input type="checkbox" name="toppings[]" value="olives" />Olives<br />
         </fieldset>

        <input type="submit" value="Order Pizza" />

    </form>
</div>
@endsection