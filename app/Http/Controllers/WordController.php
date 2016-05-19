<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Word;
use App\Models\User;
use App\Models\UserWord;
use App\Http\Controllers\UserWordController;
use Auth;

class WordController extends Controller
{
    public function index(Request $request){
        $word = new Word;
        $nameCategories = Category::pluck('name', 'id')->all();
        $categoryId = $request->input('category');
        $statusRadio = $request->input('learn');
        $words = $word->getWord($categoryId, $statusRadio);
        return view('wordList', [
            'nameCategories' => $nameCategories,
            'words' => $words,
        ]);
    }
}
