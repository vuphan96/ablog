<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCatRequest;
use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Blog;

class AdminCatController extends Controller
{
    public function __construct(Cat $cat,Blog $blog)
    {
        $this->cat = $cat;
        $this->blog = $blog;
    }
    public function index (Request $request){
        if($key = $request->search){
            $key = $key;
        }else{
            $key = '';
        }
        // echo $key;
        $start = 1; //số danh mục bắt đầu
        $objCats = $this->cat->getItem($key);
        $total = $this->cat->getcounts(); //tổng số danh mục
        $curent = getenv('ROW_COUNT');// số danh mục cuối
        if($catNum = $request->page){
            $curent = $curent*$catNum;
            $start = $curent - (getenv('ROW_COUNT')-1);
            if ($curent>=$total) {
                $curent = $total;
            }
        }


        // dd($objCatConut);
        return view('Admin.cat.index',compact('objCats','start','curent','total'));
    }
    public function add (){
        return view('Admin.cat.add');
    }
    public function postadd(AdminCatRequest $request){
        $name = $request->name;
        $sort = 1000;
        if ($request->sort) {
            $sort = $request->sort;
        }
        $arCat = array(
            'name' => $name,
            'sort' => $sort
        );
        $result = $this->cat->addItem($arCat);
        if($result == true){
            return redirect()->Route('Admin.cat.index')->with('msg','Thêm thành công : ')->with('ten',$name);
        }else{
            return redirect()->Route('Admin.cat.index')->with('msg','Đã có lỗi xảy ra');
        }


    }
    public function edit ($id){
        $objCat = $this->cat->getEdit($id);
        return view('Admin.cat.edit',compact('objCat'));
    }
    public function postEdit($id,AdminCatRequest $request){
        // $objCat = $this->cat->getEdit($id);
        // $objCat->name = $request->name;
        // $objCat->sort = $request->sort;
        // $result = $this->cat->editItem($objCat);
        $arCat = array(
            'name' => $request->name,
            'sort' => $request->sort
        );
        $result = $this->cat->editItem($id,$arCat);
        if($result == true){
            return redirect()->Route('Admin.cat.index')->with('msg','Sửa thành công ');
        }else{
            return redirect()->Route('Admin.cat.index')->with('msg','Đã có lỗi xảy ra');
        }
    }
    public function del ($id){
        $result = $this->cat->delItem($id);
        $resultBlog = $this->blog->delItems($id);
        if($result == true&& $resultBlog ==true){
            return redirect()->Route('Admin.cat.index')->with('msg','Xóa thành công ');
        }else{
            return redirect()->Route('Admin.cat.index')->with('msg','Đã có lỗi xảy ra');
        }
    }
}
