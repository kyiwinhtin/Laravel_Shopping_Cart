@extends('layout.master')

@section('content')

			
			@if(Session::has('success'))	

			<div class="row">
				<div class="col-sm-6 col-md-4 cold-md-offset-4 cold-sm-offset-3">
					<div id="charge-message" class="alert alert-success">
						{{ Session::get('success') }}
					</div>
				</div>


			</div>

			@endif
	
			<div class="row">
						@foreach($products as $product)
				  <div class="col-md-4">
				    
					      <img src="{{ $product->imagePath }}" class="img-responsive"  alt="Image">
					      <div class="caption">
					        <h3>{{ $product->title}}</h3>
					        <p class="description">{{ $product->description }}</p>
					        <div class="clearfix"> 
					        	<div class="pull-left price">$ {{ $product->price }}</div>
					        	<a href="{{ action('ProductController@getAddtoCart',$product->id) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
					        </div>
					      </div>
				   
				  </div>
			  			@endforeach	
			  			<div class="col-md-4"></div>
				  <div class="col-md-4"></div>
			</div>


@stop

