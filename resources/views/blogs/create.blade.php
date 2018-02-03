
<a href="{{url('/backend/blogs/')}}">List Blog</a>

{{ Form::open(array( 'method' => 'POST', 'url' => url("/backend/blogs/"))) }}
{{ method_field('POST') }}
<h1>Add Blog</h1>

<!-- if there are login errors, show them here -->

@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif

<p>
{{ Form::label('blog_name', 'Blog Name') }}
{{ Form::text('blog_name', !empty(Input::old('blog_name')) ? Input::old('blog_name') : '', array()) }}
</p>

<p>
{{ Form::label('blog', 'Blog') }}
{{ Form::text('blog', !empty(Input::old('blog')) ? Input::old('blog') : '', array()) }}
</p>

<p>{{ Form::submit('Submit!') }}</p>
{{ Form::close() }}

<a href="{{url('/logout')}}">Logout</a>