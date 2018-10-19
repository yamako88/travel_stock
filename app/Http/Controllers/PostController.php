<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdate;
use App\Models\SpotsCategories;
use Illuminate\Support\Facades\Auth;


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

}
