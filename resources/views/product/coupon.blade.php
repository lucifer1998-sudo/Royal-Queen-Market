@extends('master.product')

@section('product-content')
    <table class="table table-hover table-striped text-white">
        <thead>
        <tr>
            <th scope="col">Code</th>
            <th scope="col">Discount Price</th>
            <th scope="col">Expiration Date</th>

        </tr>
        </thead>
        <tbody>
            @foreach($coupon as $c)
            <tr>
                <td>{{ $c-> code }}</td>
                <td>@include('includes.currency', ['usdValue' => $c -> data -> get ('price') ])</td>
                <td>{{ $c -> expires_at }}</td>

            </tr>
            @endforeach
            <tr>
                <form method="POST" action="{{ route('product.coupon.generate', $product) }}">
                    @csrf
                <td><input type="text" name="cValue" class="form-control" placeholder="Discount in {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}"></td>
                <td><input type="number" step="1" min="1" class="form-control" name="qty" placeholder="Quantity"></td>
                <td><input type="number" class="form-control" name="duration" placeholder="Duration in days"></td>
                <td><button type="submit" class="btn btn-outline-success">Generate Coupon</button></td>
                </form>
            </tr>
        </tbody>
    </table>

@stop