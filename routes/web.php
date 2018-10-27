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
    $router->get('downloads', 'HomeController@downloads')->name('home.downloads');
    $router->get('download', 'HomeController@doDownload')->name('home.download');
    $router->get('about', 'HomeController@about')->name('home.about');
    $router->get('contact', 'HomeController@contact')->name('home.contact');

    $router->get('products', 'ProductController@index')->name('products.index');
    $router->get('products/{title}', 'ProductController@show')->name('products.show');
    $router->get('products/category/{category}', 'ProductController@categoryIndex')->name('products.category.index');
    $router->get('products/spec/{spec}', 'ProductController@specIndex')->name('products.spec.index');
    $router->post('products/{like}/like', 'ProductController@like')->name('products.like');

    $router->get('news', 'NewsController@index')->name('home.news.index');
    $router->get('news/{title}', 'NewsController@show')->name('home.news.show');

    $router->post('mail/send', 'MailController@send')->name('mail.send');
    $router->post('mail/subscribe', 'MailController@subscribe')->name('mail.subscribe');
});