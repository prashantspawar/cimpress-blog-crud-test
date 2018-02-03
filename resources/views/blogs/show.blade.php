@if(!empty($blog))
	
	<div>
		<div>
			<label>Blog Name:</label>
			<span>{{ $blog['blog_name'] }}</span>
		</div>

		<div>
			<label>Blog:</label>
			<span>{{ $blog['blog_text'] }}</span>
		</div>
	</div>
	
	@endif