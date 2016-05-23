<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\UserWord;
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
        $countWordUserLearned = UserWord::count();
        $resultOfUser = User::with(['lessons', 'lessons.category'])->find(Auth::user()->id);

        return view('home', compact('resultOfUser', 'countWordUserLearned'));
    }
}
