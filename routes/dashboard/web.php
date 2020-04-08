<?php

use Illuminate\Support\Facades\Route;


Route::prefix('dashboard')->name('dashboard.')->middleware(['auth' , 'role:admin|super_admin'])->group(function (){
    //welocome route
    Route::get('/' , 'WelcomeController@index')->name('welcome');

   //cateogry route
    Route::resource('categories' , 'CategoryController');
    //Route contoller route
    Route::resource('roles' , 'RoleController');
});


Route::get('/home', 'HomeController@index')->name('home');
