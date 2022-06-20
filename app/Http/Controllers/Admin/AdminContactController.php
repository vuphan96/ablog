<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
    public function index (Request $request){
        if($key = $request->search){
            $key = $key;
        }else{
            $key = '';
        }
        $objContacts = $this->contact->getItems($key);
        return view('Admin.contact.index',compact('objContacts'));
    }
    public function del ($id){
        $result = $this->contact->getDel($id);
        if($result == true){
            return redirect()->Route('Admin.contact.index')->with('msg','Xóa thành công ');
        }else{
            return redirect()->Route('Admin.contact.index')->with('msg','Đã có lỗi xảy ra');
        }
    }
}
