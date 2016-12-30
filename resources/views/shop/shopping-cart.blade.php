
@extends('layout.master')

@section('content')


@if(Session::has('cart'))
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-md-offset-3 col-lg-6">
			<ul class="list-group">
				@foreach($products as $product)

					<li class="list-group-item">
						
						<span class="badge">{{ $product['qty'] }}</span>						
						<strong>{{ $product['item'] ['title'] }}</strong>
						<span class="label label-success">{{ $product['price'] }}</span>
						<div class="btn-group">
							<button type="button" class="btn btn-primary btn-xs-dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a href="{{ action('ProductController@getReduceByOne',$product['item']['id']) }}">Reduce by 1</a></li>
								<li><a href="{{ action('ProductController@getRemoveItem',$product['item']['id']) }}">Reduce All</a></li>
							</ul>
						</div>

					</li>


				@endforeach
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-md-offset-3 col-lg-6">
			<strong>Total: {{ $totalPrice }}</strong>
		</div>
	</div>	
	<hr>

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-md-offset-3 col-lg-6">
			<a href="{{ route('checkout') }}" type="button" class="btn btn-success" >CheckOut</a>
		</div>
	</div>		

@else

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-md-offset-3 col-lg-6">
			<h2>No Items In Carts!</h2>
		</div>
	</div>	

@endif



@stop
