<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Spec;
use Illuminate\View\View;

class FrontController extends Controller
{
    protected $activeMenu = [
        'home'      => '',
        'services'  => '',
        'news'      => '',
        'products'  => '',
        'downloads' => '',
        'about'     => ''];

    protected $dropdownMenu = '';

    public function __construct()
    {
        $hotCategories = Category::priorityCategories(30);

        \view()->composer(['home.header', 'home.footer'], function (View $view) use($hotCategories) {
            $view->with('active', $this->activeMenu)
//                ->with('dropdownMenu', $this->dropdownMenu)
                ->with('hotCategories', $hotCategories);
        });
    }

    public function makeDropdownMenu($categories)
    {
        $html = '';
        $rows = 0;
        foreach ($categories as $cat)
        {
            if(count($cat->children) > 0)
            {
                $html .= "<li class=\"dropdown\">";
                $html .= "<a  class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\"><i class=\"fa fa-list-ul\"></i> {$cat->name} <span class=\"badge\">".count($cat->children)."</span></a>";
                $html .= "<ul class=\"dropdown-menu\">";
                $html .= $this->makeDropdownMenu($cat->children);
                $html = $html . "</ul></li>";
            }
            else
            {
                if ($rows >= 18)
                {
                    $html .= "<li ><a href=\"#\">More ...</a></li>";
                    break;
                }
                $link = url('/products?c='.$cat->slug);
                $name = str_limit($cat->name, 16);
                $html .= "<li ><a href=\"{$link}\"><i class=\"fa fa-list-ul\"></i> {$name}<span class=\"badge text-info text-right\">".count($cat->products)."</span></a></li>";
                ++$rows;
            }
        }

        return $html;
    }


}
