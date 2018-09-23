<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadLog;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Grid;

class AdminController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header(trans('admin.dashboard'));
            $content->description(trans('admin.helper.dashboard'));

            $content->row(Dashboard::title());

            $content->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
        });
    }

    public function download_log()
    {
        return Admin::content(function (Content $content) {
            $content->header('文件下载记录管理');
            $content->description('列表');
            $content->body(Admin::grid(DownloadLog::class, function (Grid $grid) {

                $grid->id('ID')->sortable();
                $grid->filename('文件名')->sortable();
                $grid->ip('ip地址');
                $grid->iso_code('国标码')->sortable();
                $grid->country('国家')->sortable();
                $grid->city('城市')->sortable();
                //$grid->state('区域码')->sortable();
                $grid->state_name('区域')->sortable();
                $grid->client('客户端');
                $grid->created_at(trans('admin.created_at'))->sortable();
                $grid->filter(function (Grid\Filter $filter) {
                    $filter->disableIdFilter();
                    $filter->like('filename', '文件名');
                    $filter->like('country', '国家');
                    $filter->like('city', '城市');
                    $filter->like('ip', 'IP地址');
                });

                $grid->Actions(function (Grid\Displayers\Actions $actions){
                    $actions->disableEdit();
                });
            }));
        });
    }

    public function slider()
    {
        Admin::css('/css/animations.css');
        Admin::css('/css/skins/light_blue.css');
        Admin::css('/css/common.css');
        Admin::css('/vendor/revolution/css/settings.css');
        Admin::css('/vendor/revolution/css/layers.css');
        Admin::css('/vendor/revolution/css/navigation.css');

        Admin::js('/vendor/revolution/js/jquery.themepunch.tools.min.js');
        Admin::js('/vendor/revolution/js/jquery.themepunch.revolution.min.js');
        Admin::js('/js/slider.js?v=' . uniqid('slider'));

        return Admin::content(function(Content $content){
            $content->header('Slider revolution');
            $content->description('首页幻灯片配置');
            $content->body(view('admin.slider-revolution-template'));
        });
    }


}
