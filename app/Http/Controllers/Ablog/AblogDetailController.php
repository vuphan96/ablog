<?php

namespace App\Http\Controllers\Ablog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AblogDetailController extends Controller
{
    public function detail($slug,$id){
        return view('Ablog.detail.detail');
    }
}
