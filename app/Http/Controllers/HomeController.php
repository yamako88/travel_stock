<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdate;
use App\Models\Posts;
use App\Models\Spots;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
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
        $id = Auth::id();
        $posts = Posts::all()->sortByDesc('id')->where('user_id', $id);
        return view('home', ['posts' => $posts]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mypage()
    {
        return view('index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list($post)
    {
        $posts = Posts::find($post);
        $spots = Spots::where('post_id',$post)->get();
        return view('list', ['posts' => $posts, 'spots' => $spots]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userEdit()
    {
        $user = Auth::user();
        return view('userupdate', ['user' => $user]);
    }

    /**
     * @param UserUpdate $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userUpdate(UserUpdate $request)
    {
        $users = Auth::user();

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();

        return redirect('home');

    }
}
