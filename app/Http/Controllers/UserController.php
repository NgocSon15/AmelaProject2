<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(Request $request)
    {
        if ($request->session()->get('user') && $request->session()->get('user')->role == 'admin')
        {
            return view('admin.home');
        } else {
            $mostViewCars = Car::orderByDesc('view_count')->limit('19')->get();
            return view('frontend.home', compact('mostViewCars'));
        }
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Lấy thông tin đang nhập từ request gửi lên từ trình duyệt
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->get();
        // Kiểm tra thông tin đăng nhập
        if ($user && $user->first()->password == $password)
        {
            session([
               'login' => 'true',
               'user' => $user->first()
            ]);

            return redirect()->route('home');
        }

        // Nếu thông tin đăng nhập không chính xác, gán thông báo vào Session
        $message = 'Tên người dùng hoặc mật khẩu không đúng.';
        $request->session()->flash('login-fail', $message);

        //Quay trở lại trang đăng nhập
        return redirect()->route('show.login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $name = $request->input('name');
        $username = $request->input('username');
        $password = $request->input('password');
        $password_retype = $request->input('password_retype');

        if ($password != $password_retype)
        {
            $message = 'Mật khẩu nhập lại không khớp';
            $request->session()->flash('register-fail', $message);

            return redirect()->route('show.register');
        }

        $user = new User();
        $user->name = $name;
        $user->username = $username;
        $user->password = $password;
        $user->role = 'customer';
        $user->save();

        session([
           'login' => true,
           'user' => $user
        ]);

        $message = 'Đăng ký thành công';
        $request->session()->flash('success', $message);

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        // Xóa Session login, đưa người dùng về trạng thái chưa đăng nhập
        $request->session()->flush();
        return redirect()->route('home');
    }
}
