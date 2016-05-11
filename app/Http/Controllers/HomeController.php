<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use App\Models\Lesson;
use App\Models\Category;
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

        $count = DB::table('user_words')->count();
        $user = User::find(Auth::user()->id);

        $model = new Lesson();
        $lessons = Auth::user()->lessons;

        $data = User::with(['lesson', 'lesson.category'])->where('id', '=',Auth::user()->id)->get();
        return view('home', ['data' => $data,'user'=>$user,'count'=>$count]);
    }
}
