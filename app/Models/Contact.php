<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = "contact";
    protected $primaryKey = "contact_id";
    public $timestamps = false;

    public function getItems($key){
        return $this->orderBy('contact_id','DESC')->where('fullname','like','%'.$key.'%')->paginate(getenv('ROW_COUNT'));
    }
    public function getDel($id){
        return $this->destroy($id);
    }
    public function getAdd($data){
        return $this->insert($data);
    }
}
