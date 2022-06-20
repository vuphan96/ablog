<?php

namespace App\Http\Controllers\Ablog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class AblogBlogcontroller extends Controller
{
    public function __construct(Blog $blog,Comment $comment)
    {
        $this->blog = $blog;
        $this->comment = $comment;
    }
    public function blog($slug,$id){

        $objBlogs = $this->blog->getItemCat($id);
        return view('Ablog.blog.blog',compact('objBlogs'));
    }
    public function detail($slug,$id){
        $objComments = $this->comment->getItem($id);
        $objCommentreps = $this->comment->getItemrep($id);
        $objBlog = $this->blog->getItem($id);
        $CatId = $objBlog->cat_id;
        $objBlogs = $this->blog->getItemLQ($CatId,$id);
        return view('Ablog.blog.detail',compact('objBlog','objBlogs','objComments','objCommentreps'));
    }
    // public function comment(){


    // }
    public function comment(Request $request){
        $id_user = Auth::user()->id;
        $idBlog = $request->idBlog;
        $content = $request->content;
            $arComment = array(
                'user_id' => $id_user,
                'blog_id' => $idBlog,
                'description' => $content,
                'active' => 1,
                'parent_id'=>$request->idComment ? $request->idComment : 0
            );
        $result = $this->comment->getAdd($arComment);
        $objComments = $this->comment->getItem($idBlog);
        $objCommentreps = $this->comment->getItemrep($idBlog);
        return view('Ablog.blog.listComment',compact('objComments','objCommentreps'));
    }


}
