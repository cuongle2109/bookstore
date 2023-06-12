<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }


    public function customLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'required' => 'Không được bỏ trống'
        ]
        );


        if ($validator->fails()) {
            return redirect("login")
                ->withErrors($validator);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->isAdmin) {
                return redirect()->route('admin.dashboard.index')
                    ->withSuccess('Signed in');
            } else {
                return redirect()->route('mypage.home.index')
                    ->withSuccess('Signed in');
            }
        }

        return redirect("login")->with('message', 'Đăng nhập thất bại');
    }



    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'address' => 'required',
            'phone' => 'required',
        ],
        [
            'required' => 'Không được bỏ trống',
            'email' => ':attribute sai định dạng',
            'unique' => ':attribute dã tồn tại',
            'min' => ':attribute phải lớn hơn :min'
        ]
        );

        $data = $request->all();
        $data['isAdmin'] = 0;

        $check = $this->create($data);

        return redirect()->route('admin.dashboard.index')->withSuccess('Đăng ký thành công');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'isAdmin' => $data['isAdmin']
        ]);
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
        }
}
