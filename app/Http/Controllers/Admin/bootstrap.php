<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

use App\Http\Controllers\Admin\Extensions\WangEditor;
use App\Http\Controllers\Admin\Extensions\SliderRevolution;
use App\Http\Controllers\Admin\Extensions\Popover;
use Encore\Admin\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid\Column;

app('view')->prependNamespace('admin', resource_path('views/admin'));
Form::extend('editor', WangEditor::class);
//Form::extend('slider', SliderRevolution::class);
Column::extend('popover', Popover::class);

Encore\Admin\Form::forget(['map']);
