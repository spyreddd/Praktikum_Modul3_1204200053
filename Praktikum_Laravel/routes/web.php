<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/bootstrap12', function () {
    return view('bootstrap');
});

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Praktik Laravel Routing
Route::get('/routing', function() {
    return view('routing');
});

// basic routing
route::get('basic_routing', function(){
    return 'hello world';
});

// view route

Route::view('/view_route', 'view_route');
Route::view('/view_route', 'view_route', ['name' => 'Arbyputra']);

// Contoller route
Route::get('/controller_route', [RouteController::class, 'index']);

// Praktik Redirect Route
Route::redirect('/', '/routing');

// Praktik Route Parameter (Required Parameter)
Route::get('/user/{id}', function($id) {
    return "User Id: ".$id;
});

Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId) {
    return "Post Id: ".$postId.", Comment Id: ".$commentId;
});

//  Praktik Route Parameter (Optional Parameter)
Route::get('username/{name?}', function($name = null) {
    return 'Username: '.$name;
});

// Praktik Route With Regular Expression Constraints
Route::get('/title/{title}', function($title) {
    return "Title: ".$title;
})->where('title', '[A-Za-z]+');

// Praktik Named Route
Route::get('/profile/{profileId}', [RouteController::class, 'profile'])->name('profileRouteName');

// Praktik Route Priority
// Route::get('/route_priority/{rpId}', function($rpId) {
    // return "This is Route One";
// });
Route::get('/route_priority/user', function() {
    return "This is Route 1";
});
Route::get('/route_priority/user', function() {
    return "This is Route 2";
});

// Praktik Fallback Routes
// Route::fallback(function() {
//     return 'This is Fallback Route';
// });

// Praktik Route Groups (Route Prefixes & Route Name Prefixes)
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', function() {
        return "This is admin dashboard";
    })->name('dashboard');
    Route::get('/users', function() {
        return "This is user data on admin page";
    })->name('users');
    Route::get('/items', function() {
        return "This is item data on admin page";
    })->name('items');
});
