@extends('maintemplate')

@section('content')

 <section>
	<div class="col-md-12 align-items-center mt-5">
	<div class="card my-5 p-3"> 
		<h4><span class="color-b">Up</span>lo<span class="color-b">ad</span> Po<span class="color-b">st</span> He<span class="color-b">re!</span></h4>
		<hr>
		 

		<form method="post" action="{{route('company.store')}}" enctype="multipart/form-data" style="background-color: #f2f3f4">
			@csrf

			
				<div class="container">
	         <div class="row">
					<div class="col-lg-12 form-group">
				<label>Post Title:</label>

				<input type="text" name="title" class="form-control">
			</div>
			 </div>

				<div class="row">
					<div class="col-lg-6 form-group">
						<label>Category:</label>
						<select name="type" id="category" class="form-control">
							<option value="">
								Choose Category
							</option>
								@foreach($categories as $category)
							<option value="{{$category->id}}" data-id="{{$category->id}}">
								{{$category->name}}
							</option>
								@endforeach
						</select>
					</div>

					<div class="col-lg-6 form-group">
						<label>Sub Category:</label>
						<select name="subtype" class="form-control subtype">
							<option value="">
							Choose Sub Category
							</option>
							@foreach($subcategories as $subcategory)
							 <option value="{{$subcategory->id}}">
							 	{{$subcategory->name}}
							 </option>
							 @endforeach
						</select>
					</div>
				</div>
			
				
			
		<div class="row">
			<div class="col-lg-6 form-group">
				<label>Min Amount:</label>
				<input type="text" name="minamount" class="form-control">
				@if($errors->has('minamount'))
				  <li class="text-danger">{{$errors->first('minamount')}}</li>
				@endif
			</div>
			<div class="col-lg-6 form-group">
				<label>Min Price:</label>
				<input type="number" name="minprice" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 form-group">
				<label>Max Amount:</label>
				<input type="text" name="maxamount" class="form-control">
				@if($errors->has('maxamount'))
				  <li class="text-danger">{{$errors->first('maxamount')}}</li>
				@endif
			</div>
			<div class="col-lg-6 form-group">
				<label>Max Price:</label>
				<input type="number" name="maxprice" class="form-control">
			</div> 
		</div>


		
			
		<div class="row">
			<div class="col-lg-6 form-group">
				<label>Image:</label>
				<input type="file" name="image" class="form-control-file">
			</div>
			<div class="col-lg-6 form-group">
				<label>Description</label>
				<textarea name="description" class="form-control"></textarea>
				
			</div>
		</div>

		
			


		<div class="row">
			<div class="col-lg-12 form-group">
				<input type="submit" name="btnok" class="btn btn-success" value="Upload">
			</div>
		</div>
	</div>
		</form>
	</div>
	</div>
</section>
	

@endsection

@section('script')

<script>
	$('#category').change(function(){
		var cat_id = $(this).val();
		console.log(cat_id);
		var div = $(this).parent();
		var op=" ";
		$.ajax({
			type:'get',
			url:'{!!URL::to('getCategory')!!}',
			data:{'id':cat_id},
			success:function(data){
					console.log('success');
					console.log(data);
					op+='<option value="0" selected disabled>Choose category</option>';
					for(var i=0;i<data.length;i++){
						op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
					}
					$('.subtype').html(" ");
					$('.subtype').append(op);
			},
			error:function(){

			}
		})
	});
</script>
@endsection


