<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;
use App\Models\Product;
use Encore\Admin\Media\MediaManager;
use App\Models\DownloadLog;
use Illuminate\Support\Facades\Storage;

class HomeController extends FrontController
{
    /**
     *@brief Display the home page.
     *@author Yuri Young<yuri.young@qq.com>
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index()
    {
        $this->activeMenu['home'] = 'active';

        $latest_products = Product::whereStatus(1)->orderByDesc('created_at')->limit(10)->get();

        return view('home.index', [
            'latestProducts' => $latest_products
        ]);
    }

    /**
     *@brief Change language.
     *@author Yuri Young<yuri.young@qq.com>
     *
     * @param  string $lang
     * @param  //App\Jobs\ChangeLocaleCommand $changeLocale
     * @return \Illuminate\Support\Facades\Response
     */
    public function language($lang)
    {
        // ...

        return redirect()->back();
    }

    /**
     * @brief The services provides ...
     * @author Yuri Young<yuri.young@qq.com>
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function services()
    {
        $this->activeMenu['services'] = 'active';
        return view('home.services');
    }

    /**
     * @brief The news provides ...
     * @author Yuri Young<yuri.young@qq.com>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function news()
    {
        $this->activeMenu['news'] = 'active';
        return view('home.news');
    }

    /**
     * @brief The downloads provides ...
     * @author Yuri Young<yuri.young@qq.com>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function downloads()
    {
        $this->activeMenu['downloads'] = 'active';

//        $storage = Storage::disk('media');
        $manager = new MediaManager('downloads');

        return view('home.downloads', [
            'files' => $manager->ls(),
        ]);
    }

    public function doDownload(Request $request)
    {
        $file = $request->get('file');
        $manager = new MediaManager('downloads/'.$file);
        $result = $manager->download();
        if($result->isOk())
        {
            DownloadLog::log($request);
        }

        return $result;
    }

    /**
     * @brief The about provides ...
     * @author Yuri Young<yuri.young@qq.com>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $this->activeMenu['about'] = 'active';
        return view('home.about');
    }

    /**
     * @brief The contact provides ...
     * @author Yuri Young<yuri.young@qq.com>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        $this->activeMenu['contact'] = 'active';
        return view('home.contact');
    }
}
