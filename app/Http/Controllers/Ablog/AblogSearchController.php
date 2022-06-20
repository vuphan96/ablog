<?php

namespace App\Http\Controllers\Ablog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class AblogSearchController extends Controller
{
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
    public function search(Request $request){
        // $timkiem = $request->tiemkiem;
        // $objBlogSearch = $this->blog->getItemsearch($timkiem);
        // return view('Ablog.search.seacrh');
        // $output = '';
        // foreach ($objBlogSearch as $item) {

        //     $output = '<div class="media">
        //                 <a class="d-flex align-self-bottom" href="">
        //                     <img width="100" src="'.$item->picture.'" alt="">
        //                 </a>
        //                 <div class="media-body" style="margin-left: 10px">
        //                     <h5><a href="">'.$item->name.'</a></h5>
        //                     <p><a href="">'.$item->created_at.'</a></p>
        //                 </div>
        //             </div>';
        // }
        // return response()->json($output);
    }
}
