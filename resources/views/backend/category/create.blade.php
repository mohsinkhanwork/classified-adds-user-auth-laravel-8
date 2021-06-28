@extends('backend.layout.master')
@section('content')

<h3>Add Category </h3>

<div class="row justify-content-center" > 
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
    Form to add category
  </div>
			<div class="card-body">

			<form action="{{route('category.store')}}" method="POST" enctype= "multipart/form-data">@csrf

			  <div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Name of Category">
			    <span><br></span>
					@error('name')
					<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
					</span>
					@enderror
			  </div>

			  <div class="form-group">
			   
			    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
			    @error('image')
					<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
					</span>
					@enderror
			  </div>
				<!-- 
			  <div class="form-group form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1">Check me out</label>
			  </div> -->
			  <br>
			  <div class="form-group">
			  <button type="submit" class="btn btn-primary">save</button>
			  </div>
			</form>


			
</div>
</div>
</div>
</div>


@endsection


