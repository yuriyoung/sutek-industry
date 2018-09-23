<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

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

//Route::get('/', function () {
//    return view('welcome');
//});

/**
 * Home routes
 */
Route::group([
    'namespace'     => 'Home',
    //    'middleware'    => 'home'
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    $router->get('services', 'HomeController@services')->name('home.services');
    $router->get('news', 'HomeController@news')->name('home.news');
    $router->get('downloads', 'HomeController@downloads')->name('home.downloads');
    $router->get('download', 'HomeController@doDownload')->name('home.download');
    $router->get('about', 'HomeController@about')->name('home.about');
    $router->get('contact', 'HomeController@contact')->name('home.contact');

    $router->post('products/{slug}/like', 'ProductController@like');
    $router->resource('products', 'ProductController', ['only' => ['index', 'show']]);

    $router->post('mail/send', 'MailController@send')->name('mail.send');
});