<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/about', function() {
    return '<h1>BALLLSSSS</h1>';
});

Route::get('/store/{category?}/{item?}', function($category = null, $item = null) {
    if (isset($category)) {
        if (isset($item)) {
            return "You are viewing store for $category for $item";
        }

        return "You are viewing store for $category";
    }

    return 'You are viewing all instruments';
});

// Route::get('/store', function() {
//     $category = request('category');

//     if (isset($category)) {
//         return 'You are viewing store for ' . strip_tags($category);
//     }

//     return 'You are viewing all instruments';
// });
