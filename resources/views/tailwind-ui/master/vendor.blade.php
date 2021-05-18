@extends('tailwind-ui.master.main')

@section('title','Vendor - ' . $vendor -> username )

@section('bg')
        @include('master.navbar')
        @include('includes.jswarning')
@endsection

@section('content')
    <div class="h-20 rounded">
        <img src="{{URL::asset('/media/profile-bg-1.jpg')}}" class="object-cover rounded-full w-full" alt="Profile background">
    </div>
    
        @include('tailwind-ui.includes.vendor.card')
    
    @include('tailwind-ui.includes.vendor.stats')
    @yield('vendor-content')
@stop
