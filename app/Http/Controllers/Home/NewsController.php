<?php

namespace App\Http\Controllers\Home;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;

class NewsController extends FrontController
{
    public function __construct()
    {
        parent::__construct();

        $this->activeMenu['news'] = 'active';
    }

    /**
     *
     * @author Yuri Young<yuri.young@qq.com>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::orderByDesc("updated_at")->paginate(8);
        return view('home.news',[
            'news' => $news,
        ]);
    }

    /**
     *
     * @author Yuri Young<yuri.young@qq.com>
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $news = News::findBySlugOrFail($slug);
        return view('home.news_detail',[
            'news' => $news,
        ]);
    }
}
