<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Cat;
use App\Models\Blog;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $catItems = new Cat;
        $blogItems = new Blog;
        $objTopBlogs = $blogItems->getTopBlog();
        $objCats = $catItems->getItems();
        view()->share('listCats',$objCats);
        view()->share('listTopBlog',$objTopBlogs);
        // View::share('listCats',Cat::listCats());

    }
}
