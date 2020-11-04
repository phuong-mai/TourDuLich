<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Session;
use Hash;

class LoginController extends Controller
{

    public function getlogin(){
        return view('pages.login');
    }

    public function postlogin(Request $request){
        $this->validate($request,
            ['email' =>'required|email',
                'password' => 'required|min:6'],
            ['email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự']

        );
        $email = $request->input('email');
        $password = $request->input('password');
        if(Auth::attempt(['email'=>$email,'password'=>$password]))
        {

            return redirect('/');
        }

        return redirect()->back()->with(['tt'=>'success','mess'=>'Mật khẩu hoặc Email không đúng']);


    }
    public function logout()
    {
        Auth::logout();
        return redirect('index');
    }
    public function getregister(){
        return view('pages.register');
    }
    public function postregister(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
                'email' =>'required|email|unique:users,email',
                'password' => 'required|min:6',
                're_password'=>'required|same:password',
            ],
            [
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
                're_password.same' => 'Mật khẩu không khớp',
            ]

        );
        $user=new User();

        $user->name = $request->name;
        $user->email=$request->email;
        $user->password=hash::make($request->password);
        $user->save();
        return redirect('login');


    }
}
