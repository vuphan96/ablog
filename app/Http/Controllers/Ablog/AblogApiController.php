<?php

namespace App\Http\Controllers\Ablog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class AblogApiController extends Controller
{
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
    public function ajaxSearch(Request $request){
        $timkiem = $request->timkiem;
        $objBlogSearch = $this->blog->getItemsearch($timkiem);
        return $objBlogSearch;
    }
}
