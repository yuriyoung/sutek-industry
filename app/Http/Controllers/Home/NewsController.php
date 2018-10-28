<?php

namespace App\Http\Controllers\Home;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;

class NewsController extends FrontController
{
    protected $recent_news = [];
    protected $hot_news = [];
    protected $latest_images = [];

    public function __construct()
    {
        parent::__construct();

        $this->activeMenu['news'] = 'active';
        $this->recent_news = News::orderByDesc('created_at')->take(5)->get();
        $this->hot_news = News::orderByDesc('views')->take(5)->get();
        $this->latest_images = $this->_latest_images();
    }

    /**
     *
     * @author Yuri Young<yuri.young@qq.com>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::orderByDesc('updated_at')->paginate(8);

        return view('home.news',[
            'news' => $news,
            'recent_news' => $this->recent_news,
            'hot_news' => $this->hot_news,
            'latest_images' => $this->latest_images,
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
            'recent_news' => $this->recent_news,
            'hot_news' => $this->hot_news,
            'latest_images' => $this->latest_images,
        ]);
    }

    /**
     * @Author: Yuri Young<yuri.young@qq.com>
     * @return array
     */
    private function _latest_images()
    {
        $images = [];
//        $news = News::latest('updated_at')->first();
        $collect = News::orderByDesc('updated_at')->get();
        foreach ($collect as $news)
        {
            $news = News::where('updated_at', '<=', $news->updated_at)->orderByDesc('updated_at')->first();
            if ($news->image) array_push($images, $news->image);

            if (count($images) == 5)
                break;
        }

        return $images;
    }
}
