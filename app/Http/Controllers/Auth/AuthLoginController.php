<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\AdminLoginRequest;


class AuthLoginController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function login(){
        return view('Admin.auth.login');
    }
    public function postlogin(AdminLoginRequest $request){
        $username = $request->username;
        $password = $request->password;
        // $num = 0;
        $aruser = [
            'username'=>$username,
            'password'=>$password
        ];
        $kt = array(
            'username' => $username,
            'kt' => 1
        );
        $objCheckUsername = $this->user->getUsername($username)->count();
        if($objCheckUsername<1){
            return redirect()->route('Admin.auth.login')->with('error','Tài khoản không tồn tại');
        }
        $objUser = $this->user->getUsername($username);
        if ($objUser[0]->disabled == 1) {
            return view('Admin.auth.warning');
        }
        if (Auth::attempt($aruser)) {
                Session()->forget('arkt');
                return redirect()->route('Admin.index.index');
        }else{
            if ($username == 'admin') {
                return redirect()->route('Admin.auth.login')->with('error','Mật khẩu chưa đúng');
            }else{
                // Session()->flush();
                $arkt = Session()->get('arkt');
                if (isset($arkt[$username])) {
                    $ktCu = $arkt[$username]['kt'];
                    $ktMoi = $ktCu + 1;
                    $arkt[$username]['kt'] = $ktMoi;
                } else {
                    $kt = array(
                    'username' => $username,
                    'kt' => 1
                );
                    $arkt[$username]=$kt;
                }
                Session()->put('arkt', $arkt);
                if ($arkt[$username]['kt']>3) {
                    $arrLook = array(
                        'disabled'=>1
                    );
                    Session()->flush();
                    $result = $this->user->getLookUser($username,$arrLook);
                    return view('Admin.auth.warning');

                }else{
                    return redirect()->route('Admin.auth.login')->with('error', 'Tên đăng nhập hoặc mật khẩu chưa đúng');
                }
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('Admin.auth.login');
    }
    public function getemail(){
        return view('Admin.auth.email');
    }
    public function postemail(Request $request){
        $email = $request->email;
        // echo $email;
        $objUser = $this->user->getMail($email);

        $objEmail = $this->user->getMail($email)->count();
        if ($objEmail==0) {
            return redirect()->route('Admin.auth.email')->with('error','Email chưa được thêm vào danh sách khôi phục mật khẩu');
        }else{
            $name = $objUser[0]->username;
            $objRandom = rand(1000,9999);
            $arUser = array(
                'checkpass' => $objRandom
            );
            $result = $this->user->getpass($email,$arUser);
            $data = [
                'code' => $objRandom
            ];
            // echo '<pre>';
            //     print_r($data);
            // echo '</pre>';
            Mail::send('Admin.auth.code',$data, function($message) use ($email,$name){
                $message->from('hoangvu.tt2707@gmail.com','Ablog web');
                $message->to($email,$name);
                $message->subject('Mã khôi phục mật khẩu cho tài khoản người dùng');
            });
            return redirect()->route('Admin.auth.changePass',['mail'=>$email]);


        }
        // return view('Admin.auth.email');
    }
    public function warning(){
        return view('Admin.auth.warning');
    }
}
