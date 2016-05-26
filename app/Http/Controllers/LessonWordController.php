<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\Models\WordAnswer;
use App\Models\LessonWord;
use App\Models\UserWord;
use App\Models\Word;
use App\Models\Lesson;
use Auth;

class LessonWordController extends Controller
{
    public function __construct()
    {
        session()->keep([
            'questionIndex',
            'totalQuestions',
            'categoryName',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $word = new Word;
        $lessonWord = new LessonWord;
        $categoryId = intval($request->categoryId);
        $lessonId = intval($request->lessonId);
        $questionIndex = intval(session('questionIndex'));
        $words = $word->getQuestion($categoryId);

        if (empty($lessonId)) {
            redirect()->back();
        }

        if (empty(session('questionIndex'))) {
            session()->flash('questionIndex', 0);
        } else {
            session()->keep('questionIndex');
        }

        session()->flash('totalQuestions', count($words));
        $lessonOptions = $lessonWord->createOption($categoryId, $questionIndex);

        return view('user.lesson.lesson', [
            'lessonOptions' => $lessonOptions,
            'words' => $words,
            'lessonId' => $lessonId
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lessonWord = new LessonWord;
        $userWord = new UserWord;
        $lesson = new Lesson;
        $nextIndex = intval(session('questionIndex')) + 1;

        try {
            $lessonWord->createLessonWord($request);
        } catch(Exception $e) {
            return redirect()->back()->with('errors', 'Fail, Can not create lessonword');
        }

        if ($request->wordAnswerCorrect == WordAnswer::IS_CORRECT) {
            try {
                $check = 0;
                $listWords = $userWord->getListWord(Auth::user()->id);
                foreach ($listWords as $listWord) {
                    if ($request->wordId == $listWord->word_id)
                        $check++;
                }

                if (!$check) {
                    $userWord->createUserWord($request);
                }

            } catch(Exception $e) {
                return redirect()->back()->with('errors', 'Fail, Can not create User Word');
            }
        }

        if ($nextIndex < intval(session('totalQuestions'))) {
            session()->flash('questionIndex', $nextIndex);

            return redirect()->back();
        } else {
            $lessonId = $request->lessonId;
            $totalCorrect = $lesson->totalCorrect($lessonId);
            $content = sprintf('Learned %s / %s in %s', $totalCorrect, session('totalQuestions'), session('categoryName'));

            try {
                $lesson->createActivityLesson($content);
            } catch(Exception $e) {
                return redirect()->back()->with('errors', 'Fail, Can not create activity');
            }

            return redirect()->action('LessonController@show', ['lessonId' => $lessonId]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
