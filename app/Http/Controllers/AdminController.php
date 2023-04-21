<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        if (Session::get('admin_name'))
            return view('admin.dashboard');
        else
            return view('admin_login');
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->email;
        $admin_password = md5($request->password);

        $result = DB::table('users')->where('email', $admin_email)->where('password', $admin_password)->first();
        if ($result)
        {
            $infor = DB::table('user_profiles')->where('user_id', $result->id)->first();
            Session::put('admin_name', $infor->name);
            Session::put('admin_id', $result->id);
            return Redirect::to('dashboard');
        }
        else
        {
            Session::put('message', 'Mật khẩu hoặc email không chính xác');
            return Redirect::to('admin');
        }
    }

    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        Auth::logout();
        return Redirect::to('admin');
    }
}
