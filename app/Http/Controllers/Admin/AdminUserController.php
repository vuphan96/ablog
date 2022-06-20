<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\AdminUserRequest;
use App\Http\Requests\Admin\AdminUserEditRequest;

class AdminUserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index (Request $request){
        if($key = $request->search){
            $key = $key;
        }else{
            $key = '';
        }
        $start = 1; //số danh mục bắt đầu
        $total = $this->user->getcounts(); //tổng số danh mục
        $curent = getenv('ROW_COUNT');// số danh mục cuối
        if($userNum = $request->page){
            $curent = $curent*$userNum;
            $start = $curent - (getenv('ROW_COUNT')-1);
            if ($curent>=$total) {
                $curent = $total;
            }
        }
        $objUsers = $this->user->getItems($key);
        return view('Admin.user.index',compact('objUsers','start','curent','total'));
    }
    public function add (){
        return view('Admin.user.add');
    }
    public function postadd(AdminUserRequest $request){
        $username = $request->username;
        $fullname = $request->fullname;
        $email = $request->email;
        $password = bcrypt($request->password);
        $arUser = array(
            'username' => $username,
            'fullname' => $fullname,
            'password' => $password,
            'email' => $email
        );
        $result = $this->user->getAdd($arUser);
        if($result == true){
            return redirect()->Route('Admin.user.index')->with('msg','Thêm thành công ');
        }else{
            return redirect()->Route('Admin.user.index')->with('msg','Đã có lỗi xảy ra');
        }
    }
    public function edit ($id){
        $objUser = $this->user->getItem($id);
        return view('Admin.user.edit',compact('objUser'));
    }
    public function postedit($id,AdminUserEditRequest $request){
        $fullname = $request->fullname;
        $email = $request->email;
        if ($request->password) {
            $password = bcrypt($request->password);
            $arUser = array(
                'fullname' => $fullname,
                'email' => $email,
                'password' => $password
            );
        }else{
            $arUser = array(
                'email' => $email,
                'fullname' => $fullname
            );
        }

        $result = $this->user->getEdit($id, $arUser);
        if($result == true){
            return redirect()->Route('Admin.user.index')->with('msg','Sửa thành công ');
        }else{
            return redirect()->Route('Admin.user.index')->with('msg','Đã có lỗi xảy ra');
        }
    }
    public function del ($id){
        $objUser = $this->user->getItem($id);
        $username = $objUser->username;
        if ($username == 'admin') {
            return redirect()->Route('Admin.index.index')->with('msg','Không được quyền xóa tài khoản Admin');
        }
        // echo $username;
        $result = $this->user->getDel($id);
        if($result == true){
            return redirect()->Route('Admin.user.index')->with('msg','Xóa thành công ');
        }else{
            return redirect()->Route('Admin.user.index')->with('msg','Đã có lỗi xảy ra');
        }
    }
    public function active($id){
        $objUser = $this->user->getItem($id);
        return view('Admin.user.active',compact('objUser'));
    }
    public function postactive($id,Request $request){
        $active = $request->active;
        $arUser = array(
            'disabled' => $active
        );
        $result = $this->user->getEdit($id, $arUser);
        if($result == true){
            return redirect()->Route('Admin.user.index')->with('msg','Chỉnh sửa trạng thái thành công ');
        }else{
            return redirect()->Route('Admin.user.index')->with('msg','Đã có lỗi xảy ra');
        }
    }
}
