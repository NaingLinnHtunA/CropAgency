@extends('maintemplate')
@section('content')

<div class="col-md-8">
	<div class="card my-5 p-3">
		 
      <center>
        <h2><span class="color-b">Edit</span>Post<span>He</span>re!
          
        </h2>
      </center>
   
		<hr>

		<form method="post" action="{{route('seller.update',$seller->id)}}" enctype="multipart/form-data">
			@csrf
			@method('PUT')

			<div class="form-group">
				<label>Post Title</label>

				<input type="text" name="title" class="form-control" value="{{$seller->title}}">
			</div>

			<div class="form-group">
				<label>Category:</label>
				<select name="type" class="form-control">
					<option value="">Choose Category:</option>
					@foreach($categories as $category)
					<option value="{{$category->id}}" 
						@if($category->id==$seller->categoryid){{'selected'}}
						@endif>
						{{$category->name}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>Sub Category:</label>
				<select name="subtype" class="form-control">
					<option value="">Choose Sub Category</option>
					@foreach($sub_categories as $sub_category)
					<option value="{{$sub_category->id}}" 
						@if($sub_category->id==$seller->subcategoryid){{'selected'}}
						@endif>
						{{$sub_category->name}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>Price:</label>
				<input type="text" name="price" class="form-control" value="{{$seller->price}}">
			</div>

			<div class="form-group">
				<label>Quantity</label>
				<input type="number" name="qty" class="form-control" value="{{$seller->quantity}}">
			</div>

			<div class="form-group">
				<label>Image:</label>
				<input type="file" name="image" class="form-control-file">
				<img src="{{asset($seller->image)}}" width="100">
				<input type="hidden" name="oldimg" value="{{$seller->image}}">
			</div>

			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control">
					{{$seller->description}}
				</textarea>
				
			</div>

			<div class="form-group">
				<input type="submit" name="btnok" class="btn btn-primary" value="Update">
			</div>
		</form>
	</div>
</div>
@endsection('content')