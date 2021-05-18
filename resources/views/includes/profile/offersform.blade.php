@extends('includes.profile.addingform')

@section('form-content')
@if(optional($productsOffers) -> isNotEmpty())
    <table class="table table-striped table-hover ">
    <thead>
        <tr>
        <th scope="col">Price ({{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }})</th>
        <th scope="col">Minimum quantity</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
        @foreach($productsOffers as $offer)
            <tr>
                <th>{{ $offer -> local_price }}</th>
                <td>{{ $offer -> min_quantity }}</td>
                <td class="text-right">
                    <a href="{{ route('profile.vendor.product.offers.remove', [ $offer -> min_quantity, $basicProduct]) }}" class="btn btn-sm btn-outline-danger">Remove</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
@else
    <div class="text-rqm-white text-2xl text-center py-5">You don't have any offer please add at least one!</div>
@endif

<h3 class="text-rqm-yellow-dark text-2xl  py-5">Add offer</h3>
<hr>
<form method="POST" action="{{ route('profile.vendor.product.offers.add', $basicProduct) }}">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="col">
            <input type="number" step=".01" min="0.01" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('price', $errors) is-invalid @enderror" name="price" value="{{ old('min_quantity') }}" placeholder="Price in {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}">
            @error('price', $errors)
            <div class="invalid-feedback">
                {{ $errors -> first('price') }}
            </div>
            @enderror
        </div>
        <div class="col">
            <input type="min_quantity" step="1" min="1" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('min_quantity', $errors) is-invalid @enderror" value="{{ old('min_quantity') }}" name="min_quantity" placeholder="Minimum quantity for this price">
            @error('price', $errors)
            <div class="invalid-feedback">
                {{ $errors -> first('price') }}
            </div>
            @enderror
        </div>
        <div class="col">
            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-900 hover:border-transparent rounded text-center" type="submit"><i class="fas fa-plus mr-2"></i> Add offer</button>
        </div>
    </div>
</form>

<div class="col-md-12 text-center mt-3">
    @if(request() -> is('profile/vendor/product/update/*'))
        <a href="{{ route('profile.vendor.product.edit', [$basicProduct, $basicProduct -> afterOffers()]) }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-900 hover:border-transparent rounded"><i class="fas fa-chevron-down mr-2"></i>  Next</a>
    @elseif(request() -> is('admin/product/*'))
        <a href="{{ route('admin.product.edit', [$basicProduct, $basicProduct -> afterOffers()]) }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-900 hover:border-transparent rounded"><i class="fas fa-chevron-down mr-2"></i>  Next</a>
    @else
        <a href="{{ route('profile.vendor.product.' . ( session('product_type') == 'physical' ? 'delivery' : 'digital' ) ) }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-900 hover:border-transparent rounded"><i class="fas fa-chevron-down mr-2"></i>  Next</a>
    @endif
</div>
@stop
