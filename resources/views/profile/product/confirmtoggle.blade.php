@extends('master.confirmation')

@if($product -> active == 1)
	@section('confirmation-title', 'Hide ' . $product -> name)
@elseif($product -> active == 0)
	@section('confirmation-title', 'Show ' . $product -> name)
@endif

@if($product -> active == 1)
	@section('confirmation-content')
	    Confirm to hide product <strong>{{ $product -> name }}</strong>? All products offers, delivery options and images will be hidden as well!
	@endsection
@elseif($product -> active == 0)
	@section('confirmation-content')
	    Confirm to show product <strong>{{ $product -> name }}</strong>?
	@endsection
@endif



@section('confirmation-back', route('profile.vendor'))
@section('confirmation-next', route('profile.vendor.product.toggle', $product -> id))