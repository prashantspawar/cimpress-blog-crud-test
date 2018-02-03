<!-- Current Blog -->

@if($isAdminOrUser)
	<a href="{{url('/backend/blogs/create')}}">Create Blog</a>
@endif

@if (count($blogs) > 0)
	<div>
		<div>
			Blogs List
		</div>

		<div>
			<table border="1">

				<!-- Table Headings -->
				<thead>
					<th>Blog Name</th>
					<th>Blog</th>
					@if($isAdminOrUser)
						<th>Action</th>
					@endif
				</thead>

				<!-- Table Body -->
				<tbody>
					@foreach ($blogs as $blog)
						<tr>

							<!-- Blog Name -->
							<td>
								<div>{{ $blog['blog_name'] }}</div>
							</td>

							<!-- Blog Text -->
							<td>
								<div>{{ $blog['blog_text'] }}</div>
							</td>

							@if($isAdminOrUser)
								<td>
								@if($userType == 'admin')
									<div><a href="{{ url('/backend/blogs') }}/{{ $blog['id'] }}/edit">Edit</a></div>
								@endif
								@if($userId == $blog['created_by'])
									<div><a href="{{ url('/backend/blogs') }}/{{ $blog['id'] }}/edit">Edit</a></div>
								@endif
								</td>
							@endif
							
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endif
@if($isAdminOrUser)
<a href="{{url('/logout')}}">Logout</a>
@endif

@if(empty($isAdminOrUser))
<a href="{{route('login')}}">Login</a>
@endif