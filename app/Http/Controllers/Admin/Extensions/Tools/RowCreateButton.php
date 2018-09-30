<?php

namespace App\Http\Controllers\Admin\Extensions\Tools;

use Encore\Admin\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Grid\Tools\AbstractTool;

class RowCreateButton extends AbstractTool
{

    protected $id;
    /**
     * Create a new CreateButton instance.
     *
     * @param Grid $grid
     */
    public function __construct($grid, $id)
    {
        $this->id = $id;
        $this->grid = $grid;
    }

    public function script()
    {
        $message = trans('admin.create_succeed');
        $url = $this->grid->resource();
        return <<<EOT
$('#newRow').on('click', function(){
    $.ajax({
        url: "$url",
        method: 'post',
        data: {
            id: "$this->id",
            _method:'post',
            _token:LA.token,
        },
        success: function(response) {
            $.pjax.reload('#pjax-container');
            toastr.success('{$message}');
        },
    });
});
EOT;
    }

    /**
     * @Author: Yuri Young<yuri.young@qq.com>
     */
    public function render()
    {
        Admin::script($this->script());
        $new = trans('admin.new');
        return <<<EOT
                
<div class="btn-group pull-right" style="margin-right: 10px">
    <a href="javascript:void(0);" class="btn btn-sm btn-success" id="newRow">
        <i class="fa fa-plus"></i>&nbsp;&nbsp;{$new}
    </a>
</div>

EOT;
    }
}