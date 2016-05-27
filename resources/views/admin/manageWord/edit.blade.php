@extends('layouts.app')

@section('content')
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9 user-content">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>Edit</small>
                    Manage Word
                </h1>
            </div>
            <div class="col-lg-7 user-main">
                @include('common.errors')
                {!! Form::model($word, [
                    'route' => ['admin.word.update', $word->id],
                    'method' => 'PATCH',
                    'files' => true
                ]) !!}
                    <div class="form-group">
                        {!! Form::label('content', 'Content', [
                            'class' => 'col-sm-2 control-label'
                        ]) !!}
                        <div class="col-sm-10">
                            {!! Form::text('content', $word->content, [
                                'class' => 'form-control',
                                'placeholder' => 'Input name'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_id', 'Category', [
                            'class' => 'col-sm-2 control-label'
                        ]) !!}
                        {!! Form::select('category_id', $categories, [
                            'class' => 'form-control'
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Update User', [
                                'class' => 'btn btn-success btn-sm pull-left'
                            ]) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
