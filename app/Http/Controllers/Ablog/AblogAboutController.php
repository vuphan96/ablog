<?php

namespace App\Http\Controllers\Ablog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AblogAboutController extends Controller
{
    public function __construct(About $about)
    {
        $this->about = $about;
    }
    public function about ()
    {
        $objAbout = $this->about->getAboutOne();
        return view('Ablog.about.about',compact('objAbout'));
    }
}
