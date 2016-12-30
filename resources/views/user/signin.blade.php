@extends('layout.master')

@section('content')

<div class="row">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-4">
		<h1>Sign In</h1>
		@if($errors->any())

			<div class="alert alert-danger">
				@foreach($errors->all() as $error)
					<p>{{ $error }}</p>

				@endforeach
			</div>

		@endif

		<form action="" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email"  class="form-control" >
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" >
			</div>

			<button class="btn btn-primary">Sign In</button>

		</form>
		<p>Don't have an Account? <a href="{{ route('user.signup') }}">Sign Up Instead!</a></p>

		@if(Session::has('loginerror'))	
			<br>
					<div class="alert alert-danger">
						{{ Session::get('loginerror') }}
					</div>
		@endif

	</div>	
</div>

@stop