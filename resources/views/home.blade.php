@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">E-Learning</div>
                <div class="panel-body">
                    <div class="col-md-4">
                    <div class="text-center">
                        <img src="{{ url('uploads/image/' . $resultOfUser->avatar) }}" class="img-circle" width="100" height="100">
                        <br/>
                            {{ $resultOfUser->name }}
                        <br/>
                        Learned {{ $countWordUserLearned }} words
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3 text-left">
                                {!! link_to_action('WordController@index', 'word', [], ['class' => 'btn btn-primary']) !!}
                            </div>
                            <div class="col-md-3 text-right">
                                {!! Form::button('Lesson') !!}
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($resultOfUser->lessons as $value)
                                <div class="row">
                                    Learned {{ $value->result }} words in Lesson {{ $value->category->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
