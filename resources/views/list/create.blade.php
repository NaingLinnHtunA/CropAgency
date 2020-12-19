@extends('admintemplate')
@section('content')
	<div class="col-lg-10 col-md-10">
		<div class="card my-5 p-3">
			<h4>Add User Name Here!</h4>
			<hr>
			<form method="post" action="{{route('list.store')}}">
				@csrf
				<div class="form-group">
					<label>User Name:</label>
					<input type="text" name="name" class="form-control">
				</div>

				@if ($errors->has('name'))
					<li class="text-danger">{{$errors->first('name')}}</li>
				@endif

				<div class="form-group">
					<label>User Email:</label>
					<input type="email" name="email" class="form-control">
				</div>

				@if ($errors->has('email'))
					<li class="text-danger">{{$errors->first('email')}}</li>
				@endif

				<div class="form-group">
					<label>User Password:</label>
					<input type="text" name="password" class="form-control">
				</div>

				@if ($errors->has('password'))
					<li class="text-danger">{{$errors->first('password')}}</li>
				@endif

				<div class="form-group">
					<label>User Role:</label>
					<input type="text" name="role" class="form-control">
				</div>

				@if ($errors->has('role'))
					<li class="text-danger">{{$errors->first('role')}}</li>
				@endif

				<div class="form-group">
					<label>User AccType:</label>
					<input type="text" name="acctype" class="form-control">
				</div>

				@if ($errors->has('acctype'))
					<li class="text-danger">{{$errors->first('acctype')}}</li>
				@endif

				<div class="form-group">
					<label>Time Length:</label>
					<input type="text" name="timelength" class="form-control">
				</div>

				@if ($errors->has('timelength'))
					<li class="text-danger">{{$errors->first('timelength')}}</li>
				@endif
				
				<div class="form-group">
					<input type="submit" name="btn" class="btn btn-primary" value="Save">
				</div>
			</form>
		</div>
	</div>
@endsection