<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Cat;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blog";
    protected $primaryKey = "blog_id";
    // public $timestamps = false;

    public function cat(){
        return $this->belongsTo('App\Models\Cat','cat_id','cat_id');
    }
    public function getItems($id = '',$key){
        if ($id) {
            return $this->where('blog_id',$id)->where('name','like','%'.$key.'%')->orderBy('blog_id','DESC')->paginate(getenv('ROW_COUNT'));
        }
        return $this->orderBy('blog_id','DESC')->where('name','like','%'.$key.'%')->paginate(getenv('ROW_COUNT'));
    }
    public function getItemsearch($key){

        return $this->where('name','like','%'.$key.'%')->orderBy('blog_id','DESC')->get();
    }
    public function getItem($id){

        return $this->find($id);

    }
    public function getAdd($data){
        return $this->insert($data);
    }
    public function getEdit($id,$data){
        return $this->where('blog_id',$id)->update($data);
    }
    public function delItem($id){
        return $this->destroy($id);
    }
    public function delItems($id){
        return $this->where('cat_id',$id)->delete();
    }
    public function getItemLQ($CatId,$id){
        return $this->where('cat_id',$CatId)->where('blog_id','<>',$id)->orderBy('blog_id','DESC')->get();
    }
    public function getItemCat($id){
        return $this->where('cat_id',$id)->orderBy('blog_id','DESC')->paginate(getenv('ROW_COUNT'));
    }
    public function getHotItems(){
        return $this->where('is_hot',1)->orderBy('blog_id','DESC')->limit(9)->get();
    }
    public function getTopBlog(){
        return $this->orderBy('counter','DESC')->limit(5)->get();
    }
}
