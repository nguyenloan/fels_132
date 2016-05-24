@extends('user.lesson.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>E-Learning Lesson</h4>
                    </div>
                    <div class="panel-body">
                    @foreach($categories as $category)
                        <div class="col-lg-4">
                            <div class="thumbnail">
                                <h3>{{ $category->name }}</h3>
                                {!! Form::open(['method' => 'POST', 'url' => 'user/lessons/']) !!}
                                    {!! Form::hidden('categoryId', $category->id) !!}
                                    {!! Form::submit('Start Learn', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
