<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = "about";
    protected $primaryKey = "about_id";
    public $timestamps = false;

    public function getItems($key){
        return $this->orderBy('sort','ASC')->where('name','like','%'.$key.'%')->paginate(getenv('ROW_COUNT'));
    }
    public function getDel($id){
        return $this->destroy($id);
    }
    public function addItem($data){
        return $this->insert($data);
    }
    public function getItem($id){
        return $this->find($id);
    }
    public function getEdit($id,$data){
        return $this->where('about_id',$id)->update($data);
    }
    public function delItem($id){
        return $this->destroy($id);
    }
    public function getAboutOne(){
        return $this->orderBy('sort','DESC')->first();
    }
}
