<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminBlogRequest;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Cat;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminBlogController extends Controller
{
    public function __construct(Blog $blog,Cat $cat)
    {
        $this->blog = $blog;
        $this->cat = $cat;
    }
    public function index (Request $request){
        if($key = $request->search){
            $key = $key;
        }else{
            $key = '';
        }
        $objBlogs = $this->blog->getItems('',$key);
        return view('Admin.blog.index',compact('objBlogs'));
    }
    public function add (){
        $objCats = $this->cat->getItems();
        return view('Admin.blog.add',compact('objCats'));
    }
    public function postadd(AdminBlogRequest $request){
        if($request->has('picture')){
            $tmp = $request->file('picture')->store('public/files');
            // $request->file('file')->store('public/files');
            $tmp = explode('/',$tmp);
            $picture = end($tmp);
        }else{
            $picture = '';
        }
        $idUser = Auth::user()->id;
        $blog = array(
            'name'=>$request->name,
            'preview_text'=>$request->preview,
            'detail_text'=>$request->detail,
            'cat_id'=>$request->cat_id,
            'picture'=>$picture,
            'sort'=>$request->sort,
            'is_hot'=>$request->bloghot,
            'counter'=>0,
            'user_id'=>$idUser
        );
        $objBlog = $this->blog->getAdd($blog);
        // dd($arNews);
        if($objBlog == true){
            return redirect()->route('Admin.blog.index')->with('msg','Thêm thành công');
        }else{
            return redirect()->Route('Admin.blog.index')->with('msg','Đã có lỗi xảy ra');
        }
    }
    public function edit ($id){
        $objCats = $this->cat->getItems();
        $objBlog = $this->blog->getItem($id);
        $idUserBlog = $objBlog->user_id;
        // echo $idUser;
        $idUser = Auth::user()->id;
        if ($idUserBlog == $idUser || $idUser == '1' || $idUser == '2') {
            // echo 'được phép truy cập';
            return view('Admin.blog.edit',compact('objCats','objBlog'));
        }else{
            // echo 'không được phép truy cập';
            return redirect()->Route('Admin.index.index')->with('msg','Bạn không được quyền thực hiện chức năng này');
        }
        // return view('Admin.blog.edit',compact('objCats','objBlog'));

    }
    public function postedit($id, Request $request){
        // $idUser = $request->user_id;
        // echo $idUser;
        $objBlog = $this->blog->getItem($id);
        if($request->has('picture')){
            $tmp = $request->file('picture')->store('public/files');
            // $request->file('file')->store('public/files');
            $tmp = explode('/',$tmp);
            $picture = end($tmp);
            $oldpic = $objBlog->picture;
            if ($oldpic !='') {
                Storage::delete('public/files/'.$oldpic);
            }
        }else{
            $picture = $objBlog->picture;
        }
        $blog = array(
            'name'=>$request->name,
            'preview_text'=>$request->preview,
            'detail_text'=>$request->detail,
            'cat_id'=>$request->cat_id,
            'picture'=>$picture,
            'sort'=>$request->sort,
            'is_hot'=>$request->bloghot
        );
        $result = $this->blog->getEdit($id,$blog);
        if($result == true){
            return redirect()->route('Admin.blog.index')->with('msg','sửa thành công');
        }else{
            return redirect()->Route('Admin.blog.index')->with('msg','Đã có lỗi xảy ra');
        }

    }
    public function del ($id){
        $objBlog = $this->blog->getItem($id);
        $idUserBlog = $objBlog->user_id;
        $idUser = Auth::user()->id;
        if ($idUserBlog == $idUser || $idUser == '1' || $idUser == '2') {
            // echo 'được phép truy cập';
            $oldpic = $objBlog->picture;
            if ($oldpic !='') {
                Storage::delete('public/files/'.$oldpic);
            }
            $result = $this->blog->delItem($id);
            if($result == true){
                return redirect()->Route('Admin.blog.index')->with('msg','Xóa thành công ');
            }else{
                return redirect()->Route('Admin.blog.index')->with('msg','Đã có lỗi xảy ra');
            }
        }else{
            // echo 'không được phép truy cập';
            return redirect()->Route('Admin.index.index')->with('msg','Bạn không được quyền thực hiện chức năng này');
        }

    }
}
