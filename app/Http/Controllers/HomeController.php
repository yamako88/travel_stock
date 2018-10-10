<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdate;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function mypage()
    {
        return view('index');
    }

    public function list()
    {
        return view('list');
    }

    public function useredit()
    {
        $user = Auth::user();
        return view('userupdate', ['user' => $user]);
    }

    public function userupdate(UserUpdate $request)
    {
        $users = Auth::user();

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();

        return redirect('home');

    }
}
