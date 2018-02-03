<!doctype html>
<html>
<head>
<title>Look at me Login</title>
</head>
<body>

{{ Form::open(array('url' => route('login'))) }}
<h1>Login</h1>

<!-- if there are login errors, show them here -->

@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif

<p>
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}
</p>

<p>
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
</p>

<p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
</p>

<p>{{ Form::submit('Submit!') }}</p>
{{ Form::close() }}

<a href="{{ url('/blogs') }}">Blogs</a>