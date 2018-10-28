<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreate;
use App\Http\Requests\SpotCreate;
use App\Models\SpotsCategories;
use App\Models\Spots;
use App\Models\Posts;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;


/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class PostController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post()
    {
        $categories = SpotsCategories::all();
        return view('post', ['categories' => $categories]);
    }

    /**
     * @param PostCreate $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postCreate(PostCreate $request)
    {
        $user_id = Auth::id();

        $post = new Posts;
        $post->user_id = $user_id;
        $post->title = $request->title;
        $post->comment = $request->comment;
        $post->like_count = null;
        $post->is_public = null;
        $post->save();

        $post_id = $post->id;

        return $this->spotCreate($post_id, $request);

    }

    /**
     * @param $post_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function spotCreate($post_id, $request)
    {
        $yoteis = $request->yotei;

        foreach ($yoteis as $yotei){
        $spot = new Spots;
        $spot->name = $yotei['text'];
        if(isset($yotei['url'])){
            $spot->url = $yotei['url'];
        }
        $spot->started_hour_at = $yotei['first_hour'];
        $spot->started_minute_at = $yotei['first_minute'];
        $spot->finished_hour_at = $yotei['finish_hour'];
        $spot->finished_minute_at = $yotei['finish_minute'];
        $spot->spot_category_id = null;
        $spot->day = null;
        $spot->post_id = $post_id;
        $spot->icon = $yotei['icon'];
        $spot->save();
        }

        return redirect('home');
    }

    /**
     * @param $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDelete($post)
    {
        Posts::destroy($post);
        return redirect('home')->with('message', '記事が削除されました');
    }

    /**
     * @param $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postUpdate($post)
    {
        $posts = Posts::find($post);
        $spots = Spots::where('post_id',$post)->get();
        $categories = SpotsCategories::all();
        return view('postupdate', ['posts' => $posts, 'categories' => $categories, 'spots' => $spots]);
    }

}
