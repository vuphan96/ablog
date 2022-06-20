<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $table = "category";
    protected $primaryKey = "cat_id";
    public $timestamps = false;

    public function getItem($key){
        return $this->orderBy('sort','ASC')->where('name','like','%'.$key.'%')->paginate(getenv('ROW_COUNT'));
    }
    public function getItems(){
        return $this->all();
    }
    public function getcounts(){
        return $this->all()->count();
    }
    public function addItem($data){
        return $this->insert($data);
    }
    public function getEdit($id){
        return $this->find($id);
    }
    public function editItem($id,$data){
        return $this->where('cat_id',$id)->update($data);
    }
    public function delItem($id){
        return $this->destroy($id);
    }
    // public function listCats(){
    //     return $this->all();
    // }
    // public function search($key){
    //     return $this->where('name','like','%'.$key.'%');
    // }
}
