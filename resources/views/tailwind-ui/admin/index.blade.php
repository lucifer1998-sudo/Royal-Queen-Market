@extends('tailwind-ui.master.main')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="flex justify-center w-full">
        <div class="pl-10 w-1/6 h-full">
            <span></span>
        </div>
        <div class="flex h-full justify-center pl-10 w-5/6">
            <img src="{{URL::asset('/media/bottom-separator-1.png')}}" class="h-1/3 rotate-180 transform w-2/4" alt="">
        </div>
    </div>
    <div class="flex">

        @include('tailwind-ui.admin.menu')
        <div class="pl-10 w-5/6">
            @if(\Route::currentRouteName() == 'admin.index')
                @include('tailwind-ui.admin.dashboard-content')
            @elseif(\Route::currentRouteName() == 'admin.categories')
                @include('tailwind-ui.admin.categories-content')
            @elseif(\Route::currentRouteName() == 'admin.messages.mass')
                @include('tailwind-ui.admin.bulk-messages-content')
            @elseif(\Route::currentRouteName() == 'admin.users')
                @include('tailwind-ui.admin.users-content')
            @elseif(\Route::currentRouteName() == 'admin.products')
                @include('tailwind-ui.admin.products-content')
            @elseif(\Route::currentRouteName() == 'admin.featuredproducts.show')
                @include('tailwind-ui.admin.featured-products-content')
            @elseif(\Route::currentRouteName() == 'admin.purchases')
                @include('tailwind-ui.admin.purchases-content')
            @elseif(\Route::currentRouteName() == 'admin.log')
                @include('tailwind-ui.admin.logs-content')
            @elseif(\Route::currentRouteName() == 'admin.disputes')
                @include('tailwind-ui.admin.disputes-content')
            @elseif(\Route::currentRouteName() == 'admin.tickets')
                @include('tailwind-ui.admin.tickets-content')
            @elseif(\Route::currentRouteName() == 'admin.vendor.purchases')
                @include('tailwind-ui.admin.vendor-purchases-content')
            @elseif(\Route::currentRouteName() == 'admin.invite.create')
                @include('tailwind-ui.admin.invites-content')
            @elseif(\Route::currentRouteName() == 'admin.tickets.view')
                @include('tailwind-ui.admin.ticket-view-content')
            @elseif(\Route::currentRouteName() == 'admin.product.edit')
                @include('tailwind-ui.admin.product-edit-content')
            @elseif(\Route::currentRouteName() == 'admin.users.view')
                @include('tailwind-ui.admin.user-view-content')
            @endif
        </div>
    </div>
    <div class="flex justify-center w-full">
        <div class="pl-10 w-1/6 h-full">
            <span></span>
        </div>
        <div class="flex h-full justify-center pl-10 w-5/6">
            <img src="{{URL::asset('/media/bottom-separator-1.png')}}" class="h-1/3 transform w-2/4" alt="">
        </div>
    </div>
@endsection
