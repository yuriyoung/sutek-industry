<?php
/**
 * Created by PhpStorm.
 * Filename: SliderRevolution.php
 * Author: Yuri Young<yuri.young@qq.com>
 * Date: 2018/9/9
 * Time: 下午11:58
 */

namespace App\Http\Controllers\Admin\Extensions;

use Encore\Admin\Form\Field;

class SliderRevolution extends Field
{
    protected $view = 'admin.slider-revolution-template';

    protected static $css = [
        '/vendor/revolution/css/settings.css',
        '/vendor/revolution/css/layers.css',
        '/vendor/revolution/css/navigation.css',
    ];

    protected static $js = [
        '/vendor/revolution/js/jquery.themepunch.tools.min.js',
        '/vendor/revolution/js/jquery.themepunch.revolution.min.js',
    ];

    public function render()
    {
        return parent::render();
    }
}