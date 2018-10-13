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

    $router->get('/', 'DashboardController@index');
    $router->get('downloadlog', 'DashboardController@download_log');
    $router->get('slider', 'DashboardController@slider');

    $router->resource('products', 'ProductController');
    $router->get('categories/options', 'CategoryController@options');
    $router->resource('categories', 'CategoryController', ['except' => ['create']]);
    $router->resource('specs', 'SpecController');
    $router->resource('sizes', 'SizeController');

    $router->get('recover', 'ProductController@recoverImages');
});
