<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminAboutRequest;
use Illuminate\Http\Request;
use App\Models\About;

class AdminAboutController extends Controller
{
    public function __construct(About $about)
    {
        $this->about = $about;
    }
    public function index (Request $request){
        if($key = $request->search){
            $key = $key;
        }else{
            $key = '';
        }
        $objAbouts = $this->about->getItems($key);
        return view('Admin.about.index',compact('objAbouts'));
    }
    public function add (){
        return view('Admin.about.add');
    }
    public function postadd(AdminAboutRequest $request){
        $name = $request->name;
        $preview = $request->preview;
        $detail = $request->detail;
        $sort = $request->sort;
        $arAbout = array(
            'name' => $name,
            'description' => $preview,
            'detail' => $detail,
            'sort' => $sort
        );
        $result = $this->about->addItem($arAbout);
        if($result == true){
            return redirect()->Route('Admin.about.index')->with('msg','Thêm thành công : ')->with('ten',$name);
        }else{
            return redirect()->Route('Admin.about.index')->with('msg','Đã có lỗi xảy ra');
        }


    }
    public function edit ($id){
        $objAbout = $this->about->getItem($id);
        return view('Admin.about.edit',compact('objAbout'));
    }
    public function postedit($id,Request $request){
        $name = $request->name;
        $preview = $request->preview;
        $detail = $request->detail;
        $sort = $request->sort;
        $arAbout = array(
            'name' => $name,
            'description' => $preview,
            'detail' => $detail,
            'sort' => $sort
        );
        $result = $this->about->getedit($id,$arAbout);
        if($result == true){
            return redirect()->Route('Admin.about.index')->with('msg','Sửa thành công ');
        }else{
            return redirect()->Route('Admin.about.index')->with('msg','Đã có lỗi xảy ra');
        }


    }
    public function del ($id){
        $result = $this->about->delItem($id);
        if($result == true){
            return redirect()->Route('Admin.about.index')->with('msg','Xóa thành công ');
        }else{
            return redirect()->Route('Admin.about.index')->with('msg','Đã có lỗi xảy ra');
        }
    }
}
