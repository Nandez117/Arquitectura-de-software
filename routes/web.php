<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', function () { 
    $data1 = "About us - Online Store"; 
    $data2 = "About us"; 
    $description = "This is an about page of a beautiful urbanwear vibe store"; 
    $author = "Developed by: Nandez"; 
    return view('home.about')->with("title", $data1) 
      ->with("subtitle", $data2) 
      ->with("description", $description) 
      ->with("author", $author); 
})->name("home.about"); 

Route::get('/contact', function () { 
    $title = "Contact - Online Store"; 
    $subtitle = "Contact Us"; 
    $author = "Developed by: Nandez"; 
    $address = "Calle 10 # 20-30, Medellín, Colombia"; 
    $phone = "+57 300 123 4567"; 
    return view('home.contact') 
      ->with("title", $title) 
      ->with("subtitle", $subtitle) 
      ->with("author", $author) 
      ->with("address", $address) 
      ->with("phone", $phone); 
})->name("home.contact"); 

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create"); 
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save");  
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show"); 
 