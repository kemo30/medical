<?php

use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\TaskController;

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
Route::group([

    'prefix' => '/dashboard',
    // ISAdmin middleware to making sure authenticated user is admin 
    'middleware' => ['IsAdmin','auth'],

],function(){

   

    
    
});


