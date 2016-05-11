@extends('layouts.app')
@section('content')
{!! Form::open() !!}
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    <div class="col-md-2">
                        <div class="row">
                            <img style="width: 50%;" src="http://file.vforum.vn/hinh/2013/7/hinh-minion-4.jpg" class="img-circle">
                        </div>
                        <div class="row">
                            @foreach($data as $key1)
                                {{$key1->name}}
                            @endforeach
                        </div>
                        <div class="row">
                            Learned {{$count}} words
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                {!! Form::button('Lessons') !!}
                             </div>
                            <div class="col-md-4">
                                {!! Form::button('Words') !!}
                            </div>
                        </div>
                        <div class ="row">
                            <div>
                                {!! Form::label('Activities') !!}
                            </div>
                        </div>
                        <div>
                            @foreach($data as $key)
                                @foreach($key->lesson as $key1)
                                <div class="row">
                                    Learned {{$key1->result}} words in lesson {{$key1->category->name}}
                                 </div>
                                @endforeach

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection
