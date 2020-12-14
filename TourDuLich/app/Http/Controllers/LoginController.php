<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{

    public function getlogin(){
        return view('auth.login');
    }

    public function postlogin(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->email;
            $password = $request->password;

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect('/');
            } else {
                return redirect()->back()->with('fail', 'Email hoặc mật khẩu không đúng')->withInput();
            }
        } 

    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
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
