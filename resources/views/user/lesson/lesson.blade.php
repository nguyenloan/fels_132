@extends('user.lesson.app')

@section('content')
<div class="panel panel-success">
    <div class="panel-heading">
        <h2>Lesson {{ session()->get('categoryName') }}</h2>
        <h3>Question: {{ session()->get('questionIndex') + 1 }} / {{ session()->get('totalQuestions') }}</h3>
    </div>
    <div class="panel-body">
        <div class="col-lg-11">
            <div class="panel-body">
                @include('common.flash_message')
                <div class="col-lg-5">
                    <h3>{{ $words[session()->get('questionIndex')]->content }}</h3>
                </div>
                <div class="col-lg-7">
                    @foreach($lessonOptions as $lessonOption)
                        {!! Form::open(['method' =>  'POST', 'url' => 'user/lessonwords/']) !!}
                            {!! Form::hidden('lessonId', $lessonId) !!}
                            {!! Form::hidden('wordId', $lessonOption['wordId']) !!}
                            {!! Form::hidden('wordAnswerId', $lessonOption['wordAnswerId']) !!}
                            {!! Form::hidden('wordAnswerCorrect', $lessonOption['wordAnswerCorrect']) !!}
                            {!! Form::submit($lessonOption['wordAnswerContent'], ['class' => 'btn btn-info']) !!}
                        {!! Form::close() !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
