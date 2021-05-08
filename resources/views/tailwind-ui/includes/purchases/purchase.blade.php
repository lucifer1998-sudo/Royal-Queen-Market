@extends('tailwind-ui.master.profile')

@section('title')
    @yield('purchase-title')
@stop

@section('profile-content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.flash.success')
            @include('includes.flash.error')
            @include('includes.validation')

        </div>

    </div>
    <div class="flex">
        <div class="w-full">
            <div class="h-full">
                <div class="bg-rqm-lighter p-5 rounded shadow w-full">
                    <span class="text-2xl text-gray-400 block text-rqm-yellow">
                        @yield('purchase-title') -@include('tailwind-ui.includes.currency', ['usdValue' => $purchase -> value_sum ])
                    </span>
                    <p class="text-white text-sm">Created {{ $purchase -> timeDiff() }} - {{ $purchase -> created_at }}</p>
                </div>
            </div>
        </div>
    </div>

    @if($purchase->status_notification !== null)
        <div class="row">
            <div class="col">
                <div class="alert alert-danger">
                    {{$purchase->status_notification}}
                </div>
            </div>
        </div>
    @endif
    <div class="flex my-4">
        @include('tailwind-ui.includes.purchases.components.offer')
        @include('tailwind-ui.includes.purchases.components.delivery')
    </div>
    <div class="flex my-4">
        @include('tailwind-ui.includes.purchases.components.message')
        @include('tailwind-ui.includes.purchases.components.payment')
    </div>
    <div class="row">
        @include('tailwind-ui.includes.purchases.components.feedback')
    </div>
    <div class="row">
        @include('includes.purchases.components.dispute')
    </div>


@stop
