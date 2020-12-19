@extends('maintemplate')
@section('content')

<div class="col-md-8" style="background-color: #f2f3f4">
	<div class="card my-5 p-3" style="background-color: #f2f3f4">
		  <div class="row">
    <div class="col mb-5">
      <center>
        <h2><span class="color-b">Edit</span>Post<span>He</span>re!
          
        </h2>
      </center>
    </div>
  </div>
		<hr>
	<!-- ********* -->
		<form method="post" action="{{route('company.update',$company->id)}}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label>Post title:</label>
				<input type="text" name="title" class="form-control" value="{{$company->title}}">
			</div>

			<div class="form-group">
				<label>Description:</label>
				<textarea name="body" class="form-control">{{$company->description}}</textarea>
			</div>

			<div class="form-group">
				<label>Image:</label>
				<input type="file" name="image" class="form-control-file">
				<img src="{{asset($company->image)}}" width="100">
				<input type="hidden" name="oldimg" value="{{$company->image}}">
			</div>

			<div class="form-group">
				<label>Category:</label>
				<select name="category" class="form-control">
					<option value="">
						Choose Category
					</option>
					@foreach($categories as $category)
					<option value="{{$category->id}}"
						@if($category->id==$company->type)
						{{'selected'}}
						@endif
						>{{$category->name}}
					</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<input type="submit" name="btnok" value="Update" class="btn btn-success">
			</div>
		</form>
	</div>
</div>
@endsection