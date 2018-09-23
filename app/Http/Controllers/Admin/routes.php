<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Encore\Admin\Facades\Admin;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'AdminController@index');
    $router->get('downloadlog', 'AdminController@download_log');
    $router->get('slider', 'AdminController@slider');

    $router->resource('products', 'ProductController');
    $router->get('categories/options', 'CategoryController@options');
    $router->resource('categories', 'CategoryController', ['except' => ['create']]);
    $router->resource('specs', 'SpecController');

    $router->get('recover', 'ProductController@recoverImages');
});
