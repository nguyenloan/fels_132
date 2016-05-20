@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Word List</div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'get', 'route' => ['wordList']]) !!}
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('label', 'Category', ['class' => 'col-md-4 control-label']) !!}
                            </div>
                            <div class="row-center">
                                {!! Form::select('category', $nameCategories, ['class' => 'form-control']) !!}
                                {!! Form::radio('learn', 'learn','true') !!}
                                {!! Form::label('learn', 'learn') !!}
                                {!! Form::radio('learn', 'notlearn','true') !!}
                                {!! Form::label('notlearn', 'not learn') !!}
                                {!! Form::radio('learn', 'all', 'true') !!}
                                {!! Form::label('all', 'all') !!}
                            </div>
                            <div class="row text-center">
                                {!! Form::submit('Filter', ['class' => 'btn btn-success']) !!}
                            </div>
                            <div class="row">
                                @foreach( $words as $word )
                                    <div class="row col-md-4 control-label">
                                        {{ $word->content }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

