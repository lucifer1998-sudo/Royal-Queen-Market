@extends('includes.profile.addingform')

@section('form-content')
    @if(optional($productsOffers) -> isNotEmpty())
        <table class="table-auto w-full my-2">
            <thead class="border-b border-rqm-yellow-dark">
            <tr>
                <th scope="col" class="px-2 text-center text-left text-rqm-yellow">Price ({{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }})</th>
                <th scope="col" class="px-2 text-center text-left text-rqm-yellow">Minimum quantity</th>
                <th scope="col" class="px-2 text-center text-left text-rqm-yellow"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($productsOffers as $index => $offer)
                <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                    <th>{{ $offer -> local_price }}</th>
                    <td class="border-gray-600 border-r text-center px-2 py-2 text-rqm-white">{{ $offer -> min_quantity }}</td>
                    <td class="border-gray-600 border-r text-center px-2 py-2 text-rqm-white">
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
    <form method="POST" action="{{ route('profile.vendor.product.offers.add', $basicProduct) }}">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="col">
                <input type="number" step=".01" min="0.01" class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white @error('price', $errors) is-invalid @enderror" name="price" value="{{ old('min_quantity') }}" placeholder="Price in {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}">
                @error('price', $errors)
                <div class="invalid-feedback">
                    {{ $errors -> first('price') }}
                </div>
                @enderror
            </div>
            <div class="col">
                <input type="min_quantity" step="1" min="1" class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white @error('min_quantity', $errors) is-invalid @enderror" value="{{ old('min_quantity') }}" name="min_quantity" placeholder="Minimum quantity for this price">
                @error('price', $errors)
                <div class="invalid-feedback">
                    {{ $errors -> first('price') }}
                </div>
                @enderror
            </div>
            <div class="col">
                <button class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4" type="submit">Add offer</button>
            </div>
        </div>
    </form>

    <div class="col-md-12 text-center mt-3">
        @if(request() -> is('profile/vendor/product/edit/*'))
            <a href="{{ route('profile.vendor.product.edit', [$basicProduct, $basicProduct -> afterOffers()]) }}" class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4">Next</a>
        @elseif(request() -> is('admin/product/*'))
            <a href="{{ route('admin.product.edit', [$basicProduct, $basicProduct -> afterOffers()]) }}" class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4">Next</a>
        @else
            <a href="{{ route('profile.vendor.product.' . ( session('product_type') == 'physical' ? 'delivery' : 'digital' ) ) }}" class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4">Next</a>
        @endif
    </div>
@stop
