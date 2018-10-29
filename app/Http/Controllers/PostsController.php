<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreate;
use App\Models\Post;
use App\Models\Spot;
use App\Models\SpotsCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class PostsController extends Controller
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
    public function create()
    {
        $categories = SpotsCategory::all();
        return view('post', compact('categories'));
    }

    /**
     * @param PostCreate $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PostCreate $request)
    {
        DB::beginTransaction();
        try{
            $user_id = Auth::id();

            $post = new Post;
            $post->user_id = $user_id;
            $post->title = $request->title;
            $post->comment = $request->comment;
            $post->like_count = null;
            $post->is_public = null;
            $post->save();

            $post_id = $post->id;

            foreach ($request->yotei as $yotei){
                $spot = new Spot;
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

            DB::commit();
        } catch (\Exception $exception) {
            // エラーログ出力
            Log::error('旅程の保存処理に失敗しました',
                [
                    'exception' => $exception->getMessage(),
                    'file' => $exception->getFile(),
                    'method' => __FUNCTION__,
                    'line' => $exception->getLine()
                ]);

            DB::rollBack();

            return redirect()->route('home')->withErrors('旅程の保存に失敗しました');
        }

        return redirect('home')->with('success', '旅程の保存に成功しました');
    }

    /**
     * @param $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($post)
    {
        Post::destroy($post);
        return redirect('home')->with('message', '記事が削除されました');
    }

    /**
     * @param $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($post)
    {
        $posts = Post::find($post);
        $spots = Spot::where('post_id',$post)->get();
        $categories = SpotsCategory::all();
        return view('postupdate', compact('posts','categories','spots'));
    }

}
