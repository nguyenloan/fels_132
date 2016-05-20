@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    {!! Form::open(['url' => 'register', 'name' => 'frmRegister', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'name']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'email']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'password']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => 'Confirm Password']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::button("<i class=\"fa fa-btn fa-user\"></i> " . 'register', [
                                'class' => 'btn btn-default btn-register',
                                'type' => 'submit'
                            ]) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
