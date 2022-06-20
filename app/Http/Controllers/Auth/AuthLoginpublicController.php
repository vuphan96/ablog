<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\Admin\AdminUserRequest;
use App\Http\Requests\Admin\AdminLoginRequest;

class AuthLoginpublicController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function login(){
        return view('Ablog.auth.login');
    }
    public function postlogin(AdminLoginRequest $request){
        $username = $request->username;
        $password = $request->password;
        $aruser = [
            'username'=>$username,
            'password'=>$password
        ];
        // dd($aruser);
        if (Auth::attempt($aruser)) {
            // Session()->forget('arkt');
            return redirect()->route('Ablog.index.index');
        }else {
            return redirect()->route('Ablog.auth.login')->with('msg','Tên đăng nhập hoặc mật khẩu chưa đúng');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('Ablog.auth.login');
    }
    public function register(){
        return view('Ablog.auth.register');
    }
    public function postregister(AdminUserRequest $request){
        $username = $request->username;
        $fullname = $request->fullname;
        $email = $request->email;
        $password = bcrypt($request->password);
        $arUser = array(
            'username' => $username,
            'fullname' => $fullname,
            'password' => $password,
            'email' => $email,
            'disabled' => 1
        );
        $result = $this->user->getAdd($arUser);
        if($result == true){
            return redirect()->Route('Ablog.auth.login')->with('msg','Thêm thành công ');
        }else{
            return redirect()->Route('Ablog.auth.register')->with('msg','Đã có lỗi xảy ra');
        }
    }
}
