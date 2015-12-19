@extends('layouts.master')

@section('sidebar')
@stop

@section('content')
{{ Form::open(['url' => 'login', 'class'=>'form-horizontal']) }}

@if(Session::has('error_message'))
{{ Session::get('error_message') }}
@endif

<h2>Log in</h2>
<div class="form-group error">
    {{ Form::label('correo', 'Correo', ['class'=>'col-sm-3 control-label']) }}

    <div class="col-sm-9">
        {{ Form::text('correo', '', ['class'=>'form-control has-error']) }}
    </div>
</div>
<div class="form-group error">
    {{ Form::label('contrasena', 'Contraseña', ['class'=>'col-sm-3 control-label']) }}

    <div class="col-sm-9">
        {{ Form::password('contrasena', ['class'=>'form-control has-error']) }}
    </div>
</div>
<div class="form-group error">
    {{ Form::label('remember', 'Recordarme', ['class'=>'col-sm-3 control-label']) }}

    <div class="col-sm-9">
        {{ Form::checkbox('remember', true) }}
    </div>
</div>
<div class="form-group error">
    {{ Form::label('', '', ['class'=>'col-sm-3 control-label']) }}

    <div class="col-sm-9">
        {{ Form::submit('Iniciar sesión', ['class' => 'btn btn-primary']) }}
    </div>
</div>

{{ Form::close() }}
@stop