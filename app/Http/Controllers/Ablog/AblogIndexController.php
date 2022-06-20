<?php

namespace App\Http\Controllers\Ablog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class AblogIndexController extends Controller
{
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
    public function index(){
        $objBlogHot = $this->blog->getHotItems();
        $objBlogs = $this->blog->getItems('','');
        return view('Ablog.index.index',compact('objBlogs','objBlogHot'));
    }
}
