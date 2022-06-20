<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminChangePassRequest;
use App\Models\User;

class AuthChangePassController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function changePass($mail){
        return view('Admin.auth.change',compact('mail'));
    }
    public function postchangePass(AdminChangePassRequest $request){
        $mail = $request->mail;
        $code = $request->code;
        $password =bcrypt($request->password);
        $objUser = $this->user->getMail($mail);
        $userCode = $objUser[0]->checkpass;
        // echo "-";
        // echo $code;
        if ($code == $userCode) {
            $arpass = array(
                'password' => $password
            );
            $result = $this->user->getpass($mail,$arpass);
            if ($result == true) {
                return redirect()->route('Admin.auth.login')->with('error','Đổi mật khẩu thành công');
            }

        }else{
            return redirect()->route('Admin.auth.changePass',['mail'=>$mail])->with('error','Mã khôi phục không hợp lệ');
        }
    }
}
