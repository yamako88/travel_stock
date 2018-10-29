<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdate;
use App\Models\Post;
use App\Models\Spot;
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
        $posts = Post::all()->sortByDesc('id')->where('user_id', $id);
//        dd($posts);
        return view('home', compact('posts'));
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
//        dd($post);
        $posts = Post::find($post);
        $spots = Spot::where('post_id',$post)->get();
        return view('list', compact('posts','spots'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userEdit()
    {
        $user = Auth::user();
        return view('userupdate', compact('user'));
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
