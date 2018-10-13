<?php

namespace App\Http\Controllers\Home;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Spec;

class ProductController extends FrontController
{
    public function __construct()
    {
        parent::__construct();
        $this->activeMenu['products'] = 'active';
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = '';

        if ($request->isMethod('get') && $request->ajax())
        {
            $products = Product::whereStatus(1)->orderByDesc("updated_at")->paginate(12);
            return response()->json($products);
        }

        $cat = null;
        $spec = null;
        if ($request->has('category'))
        {
            $cat = Category::findBySlugOrFail($request->get('category'));
            $cat->views += 1;
            $cat->save();

            $title = 'Category - ' . ucfirst($cat->name);
            $products = $cat->products()->where('status', 1)->orderByDesc('updated_at')->paginate(10);
        }
        else if ($request->has('spec'))
        {
            $spec = Spec::findBySlugOrFail($request->get('spec'));
            $spec->views += 1;
            $spec->save();

            $title = ucfirst($spec->name) .' - ' . strtolower($spec->value);
            $products = $spec->products()->where('status', 1)->orderByDesc('updated_at')->paginate(10);
        }
        else if ($request->get('search'))
        {
            $search = $request->get('search');
            $title = 'Search - ' . $search;
            $products = Product::orWhere('title', 'like', '%'.$search.'%')
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })->orWhereHas('specs', function ($query) use ($search) {
                    $query->where('value', 'like', '%'.$search.'%');
                })->whereStatus(1)->orderByDesc('updated_at')->paginate(10);
        }
        else
        {
            $products = Product::whereStatus(1)->orderByDesc("updated_at")->paginate(10);
        }

        $categories = Category::whereParentId(0)->get();
        $specs = Spec::all()->groupBy('name');
        $sidebarCategory = $this->_sidebar_category($categories, $cat);
        $sidebarSpec =  $this->_sidebar_spec($specs, $spec);

        return view('home.products2', [
            'products' => $products,
            'title'    => $title,
            'sidebarCategory' => isset($sidebarCategory) ? $sidebarCategory : null,
            'sidebarSpec' => isset($sidebarSpec) ? $sidebarSpec : null,
            'search' => isset($search) ? $search : null,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::findBySlugOrFail($slug);
//        return response()->json(new ProductResource($product));
//        return response()->json($product);

        $spec_ids = array_column(json_decode($product->specs, true), 'id');
        $relate1 = Product::whereCategoryId($product->category_id)->take(2)->get();
        $relate2 = Product::with(['specs' => function($query) use($spec_ids) {
            $query->whereIn('spec_id', $spec_ids)->get();
        }])->whereStatus(1)->where('category_id', '!=', $product->category_id)->take(2)->get();

        $relates = $relate1->merge($relate2);

        $product->views += 1;
        $product->save();

        return view('home.product_profile', [
            'product' => $product,
            'relates' => $relates,
        ]);
    }

    public function like(Request $request, $id)
    {
        if ($request->isMethod('post') && $request->ajax())
        {
            $product = Product::findBySlugOrFail($id);
            $product->likes += 1;
            $product->save();

            return response()->json(['likes' => $product->likes]);
        }

        return response('', 200);
    }

    public function categories()
    {
        $cats = Category::all();

        return response()->json($cats);
    }

    /**
     * make a tree category sidebar menu
     *
     * @Author: Yuri Young<yuri.young@qq.com>
     * @param $categories
     * @param $current_cat
     * @return string
     */
    private function _sidebar_category($categories, $current_cat)
    {
        $html = '';
        foreach ($categories as $index => $cat)
        {
            if(count($cat->children) > 0 || !$cat->parent)
            {
                $expanded = isset($current_cat) ? (($current_cat->parent ? $current_cat->parent->id : -1) == $cat->id ? true : false) : false;
                $collapsed = $expanded ? '' : 'collapsed';
                $show = $expanded ? 'show' : '';
                $html .= "<li class=\"nav-item\">";
                $html .= "<a  class=\"nav-link {$collapsed}\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse{$index}\" aria-expanded=\"{$expanded}\" aria-controls=\"collapse{$index}\"><i class=\"fa fa-list-ul\"></i> {$cat->name} <span class=\"badge\">".count($cat->children)."</span></a>";
                $html .= "<ul class=\"menu collapse {$show}\" id=\"collapse{$index}\">";
                $html .= $this->_sidebar_category($cat->children, $current_cat);
                $html = $html . "</ul></li>";

            }
            else
            {
                $active = isset($current_cat) ? ($current_cat->id === $cat->id ? 'active' : '') : '';
                $link = url('/products?category='.$cat->slug);
                $html .= "<li class=\"nav-item\"><a class=\"nav-link {$active}\" href=\"{$link}\"><i class=\"fa fa-list-ul\"></i> {$cat->name}<span class=\"badge default-bg pull-right\">" . count($cat->products) . "</span></a></li>";
            }
        }
        return $html;
    }

    /**
     *
     * make a parent-children specs sidebar menu
     *
     * @Author: Yuri Young<yuri.young@qq.com>
     * @param string $current_item
     * @param array $collect
     */
    private function _sidebar_spec($collect = [], $current_item)
    {
        $html = '';

        foreach ($collect as $name => $specs)
        {
            $name_slug = str_slug($name);
            $expanded = isset($current_item) ? ($name === $current_item->name ? true : false) : false;
            $collapsed = $expanded ? '' : 'collapsed';
            $show = $expanded ? 'show' : '';
            $html .= "<li class=\"nav-item\">";
            $html .= "<a  class=\"nav-link {$collapsed}\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse_{$name_slug}\" aria-expanded=\"{$expanded}\" aria-controls=\"collapse_{$name_slug}\"><i class=\"fa fa-list-ul\"></i> {$name} <span class=\"badge\">".count($specs)."</span></a>";
            $html .= "<ul class=\"menu collapse {$show}\" id=\"collapse_{$name_slug}\">";

            foreach ($specs as $spec)
            {
                $active = isset($current_item) ? ($current_item->id === $spec->id ? 'active' : '') : '';
                $link = url('/products?spec='.$spec->slug);
                $html .= "<li class=\"nav-item\"><a class=\"nav-link {$active}\" href=\"{$link}\"><i class=\"fa fa-list-ul\"></i> {$spec->value}<span class=\"badge default-bg pull-right\">" . count($spec->products) . "</span></a></li>";
            }

            $html = $html . "</ul></li>";
        }

        return $html;
    }
}
