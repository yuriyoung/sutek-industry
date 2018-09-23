<?php
/**
 * Created by PhpStorm.
 * Filename: WangEditor.php
 * User: Yuri Young<yuri.young@qq.com>
 * Date: 2018/8/29
 * Time: 3:50
 */

namespace App\Http\Controllers\Admin\Extensions;

use Encore\Admin\Form\Field;

class WangEditor extends Field
{
    protected $view = 'admin.wang-editor';

    protected static $css = [
        '/vendor/laravel-admin/wangEditor/wangEditor.min.css',
    ];

    protected static $js = [
        '/vendor/laravel-admin/wangEditor/wangEditor.min.js',
    ];

    public function render()
    {
        $name = $this->formatName($this->column);

        $this->script = <<<EOT

var E = window.wangEditor
var editor = new E('#{$this->id}');
editor.customConfig.zIndex = 0
editor.customConfig.uploadImgShowBase64 = true
editor.customConfig.onchange = function (html) {
    $('input[name=\'$name\']').val(html);
}
editor.create()

EOT;
        return parent::render();
    }
}