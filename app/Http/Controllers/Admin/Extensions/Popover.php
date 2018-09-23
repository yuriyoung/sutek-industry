<?php
/**
 * Created by PhpStorm.
 * Filename: Popover.php
 * User: Yuri Young<yuri.young@qq.com>
 * Date: 2018/8/29
 * Time: 7:57
 */

namespace App\Http\Controllers\Admin\Extensions;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class Popover extends AbstractDisplayer
{
    public function display($placement = 'left')
    {
        Admin::script("$('[data-toggle=\"popover\"]').popover()");

        return <<<EOT
        
<button type="button"
    class="btn btn-secondary"
    title="popover"
    data-container="body"
    data-toggle="popover"
    data-placement="$placement"
    data-content="{$this->value}"
    >
  弹出提示
</button>

EOT;
    }
}