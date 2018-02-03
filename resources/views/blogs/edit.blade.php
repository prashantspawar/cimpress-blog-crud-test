@if(!empty($blog))

	{{ Form::open(array( 'method' => 'PUT', 'url' => url("/backend/blogs/")."/".$blog['id'])) }}
	{{ method_field('PUT') }}
		<h1>Edit Blog</h1>

		<!-- if there are login errors, show them here -->

		@if($errors->any())
			<h4>{{$errors->first()}}</h4>
		@endif

		<p>
			{{ Form::label('blog_name', 'Blog Name') }}
			{{ Form::text('blog_name', !empty(Input::old('blog_name')) ? Input::old('blog_name') : $blog['blog_name'], array()) }}
		</p>

		<p>
			{{ Form::label('blog', 'Blog') }}
			{{ Form::text('blog', !empty(Input::old('blog')) ? Input::old('blog') : $blog['blog_text'], array()) }}
		</p>

		<p>{{ Form::submit('Submit!') }}</p>
		{{ Form::close() }}

	@endif