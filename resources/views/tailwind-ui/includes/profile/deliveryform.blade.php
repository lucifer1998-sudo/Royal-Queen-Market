@extends('includes.profile.addingform')

@section('form-content')
    @if(!empty($productsShipping))
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Price({{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }})</th>
            <th scope="col">Duration</th>
            <th scope="col">Minimum quantity</th>
            <th scope="col">Maximum quantity</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @php
            $i = 0;
        @endphp
        @foreach($productsShipping as $shipping)
            <tr>
                <th>{{ $shipping -> name }}</th>
                <th>{{ $shipping -> local_value }}</th>
                <td>{{ $shipping -> duration }}</td>
                <td>{{ $shipping -> from_quantity }}</td>
                <td>{{ $shipping -> to_quantity }}</td>
                <td class="text-right">
                    @if($shipping -> exists)
                        <a href="{{ route('profile.vendor.product.delivery.remove', [$shipping -> id, $physicalProduct] ) }}" class="btn btn-sm btn-outline-danger">Remove</a>
                    @else
                        <a href="{{ route('profile.vendor.product.delivery.remove', $i) }}" class="btn btn-sm btn-outline-danger">Remove</a>
                    @endif
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
        </tbody>
    </table>
@else
    <div class="text-rqm-white text-2xl text-center py-2">You don't have any offer please add at least one!</div>
@endif

<h3 class="text-rqm-yellow-dark text-3xl">Add delivery option</h3>
<hr>
<form method="POST" action="{{ route('profile.vendor.product.delivery.new', $physicalProduct -> product) }}">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="col-md-4 my-2">
            <input type="text" maxlength="10" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('name', $errors) is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Name">
            @error('name', $errors)
            <div class="invalid-feedback">
                {{ $errors -> first('name') }}
            </div>
            @enderror
        </div>
        <div class="col-md-4 my-2">
            <input type="number" step=".01" min="0.01" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('price', $errors) is-invalid @enderror" value="{{ old('price') }}" name="price" placeholder="Price in {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}(Ex. 15.99)">
            @error('price', $errors)
            <div class="invalid-feedback">
                {{ $errors -> first('price') }}
            </div>
            @enderror
        </div>
        <div class="col-md-4 my-2">
            <input type="text" maxlength="30" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('duration', $errors) is-invalid @enderror" name="duration" value="{{ old('duration') }}" placeholder="Duration(Ex. 1-2 weeks)">
            @error('duration', $errors)
            <div class="invalid-feedback">
                {{ $errors -> first('duration') }}
            </div>
            @enderror
        </div>
        <div class="col-md-4 my-2">
            <input type="number" step="1" min="1" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('from_quantity', $errors) is-invalid @enderror" name="from_quantity" value="{{ old('from_quantity') }}" placeholder="Minimum quantity for this delivery">
            @error('from_quantity', $errors)
            <div class="invalid-feedback">
                {{ $errors -> first('from_quantity') }}
            </div>
            @enderror
        </div>
       <div class="col-md-4 my-2">
            <input type="number" step="1" min="1" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('to_quantity', $errors) is-invalid @enderror" name="to_quantity" value="{{ old('to_quantity') }}" placeholder="Maximum quantity for this delivery">
            @error('to_quantity', $errors)
            <div class="invalid-feedback">
                {{ $errors -> first('to_quantity') }}
            </div>
            @enderror
        </div>
        <div class="col-md-4 my-2 text-center">
            <button class=" resources/views/tailwind-ui/includes/profile/deliveryform.blade.php" type="submit"><i class="fas fa-plus mr-2"></i> Add shipping</button>
        </div>
    </div>
</form>

<h2 class="mt-3" class="text-2xl text-rqm-white py-4">Shipping countries</h2>
<hr>
<form method="POST" action="{{ route('profile.vendor.product.delivery.options', $physicalProduct) }}">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="col-md-4 my-2">
            <label for="countries_option" class="text-xl text-rqm-white py-3">Ships to</label>
            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="countries_option" id="countries_option">
                @foreach(\App\PhysicalProduct::$countriesOptions as $short => $optionName)
                    <option value="{{ $short }}" @if($short == $physicalProduct -> countries_option) selected @endif>{{ $optionName }}</option>
                @endforeach
            </select>


            @error('countries_option', $errors)
            <div class="invalid-feedback">
                {{ $errors -> first('name') }}
            </div>
            @enderror

        </div>
        <div class="col-md-4 my-2">
            <label for="countries" class="text-xl text-rqm-white py-3">Included/excluded countries:</label>
            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white " name="countries[]" multiple>
                @foreach(config('countries') as $countryShort => $countryName)
                    <option value="{{ $countryShort }}" @if(in_array($countryShort, $physicalProduct-> countriesArray())) selected @endif>{{ $countryName }}</option>
                @endforeach
            </select>
            @error('countries', $errors)
            <div class="invalid-feedback">
                {{ $errors -> first('countries') }}
            </div>
            @enderror
        </div>
        <div class="col-md-4 my-2">
            <label for="country_from" class="text-xl text-rqm-white py-3">Country from:</label>
            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="country_from">
                @foreach(config('countries') as $countryShort => $countryName)
                    <option value="{{ $countryShort }}" @if($countryShort == $physicalProduct-> country_from) selected @endif>{{ $countryName }}</option>
                @endforeach
            </select>

            @error('country_from', $errors)
            <div class="invalid-feedback">
                {{ $errors -> first('country_from') }}
            </div>
            @enderror
        </div>


    </div>
    <div class="form-row justify-content-center">
        <div class="col-md-3 text-center">

            @if(request() -> is('profile/vendor/product/edit/*'))
                <button class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4" type="submit"><i class="far fa-save mr-2"></i> Save</button>
                <a href="{{ route('profile.vendor.product.edit', [$basicProduct, 'images']) }}" class="btn btn-outline-primary"><i class="fas fa-chevron-down mr-2"></i> Next</a>
            @elseif(request() -> is('admin/product/*'))
                <button class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4" type="submit"><i class="far fa-save mr-2"></i> Save</button>
                <a href="{{ route('admin.product.edit', [$basicProduct, 'images']) }}" class="btn btn-outline-primary"><i class="fas fa-chevron-down mr-2"></i> Next</a>
            @else
                <button class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4" type="submit"><i class="fas fa-chevron-down mr-2"></i>  Next</button>
            @endif
        </div>
    </div>
</form>

@stop
