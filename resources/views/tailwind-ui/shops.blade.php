@extends('tailwind-ui.master.main')

@section('title','Vendors')

@section('content')
    <div class="w-full flex">
        <div class="bg-rqm-dark pb-10 px-2 px-7 rounded shadow w-1/5">
            <div class="py-3 text-2xl text-rqm-yellow">Categories</div>
            @include('tailwind-ui.shops-listcategories', ['categories' => $categories])

            <div class="pt-3 text-2xl text-rqm-yellow">Advance Search</div>
            <div>
                <form action="{{route('search')}}" method="post">
                    {{csrf_field()}}
                    <div>
                        <label for="search" class="text-rqm-yellow-darkest block">Search Terms</label>
                        <input type="text" name="search" id="search" value="{{app('request')->input('query')}}" class="bg-rqm-lighter border rounded">
                    </div>
                    <div>
                        <label for="user" class="text-rqm-yellow-darkest block">User</label>
                        <input type="text" name="user" id="user" value="{{app('request')->input('user')}}" class="bg-rqm-lighter border rounded">
                    </div>
                </form>
            </div>
        </div>
        <div class="bg-rqm-dark ml-5 p-5 w-4/5">content</div>
    </div>
@endsection
