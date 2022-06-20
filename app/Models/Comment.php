<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $primarykey = 'comment_id';
    const UPDATED_AT = null;

    public function User(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function getAdd($data){
        return $this->insert($data);
    }
    public function getItem($id){
        return $this->where('blog_id',$id)->where('parent_id',0)->orderBy('comment_id','DESC')->get();
    }
    public function getItemrep($id){
        return $this->where('blog_id',$id)->orderBy('comment_id','DESC')->get();
    }
}
