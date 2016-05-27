@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Creat Word</div>
                <div class="panel-body">
                    {!! Form::open([
                        'route' => 'admin.word.store',
                        'method' => 'post'
                    ]) !!}
                        <div class="form-group">
                            {!! Form::label('content', 'Content', [
                                'class' => 'col-sm-2 control-label'
                            ]) !!}
                            {!! Form::text('content') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category_id', 'Category_id', [
                                'class' => 'col-sm-2 control-label'
                            ]) !!}
                            {!! Form::select('category_id', $categories, [
                                'class' => 'form-control'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Create Word', [
                                    'class' => 'btn btn-success btn-sm pull-left'
                                ]) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

