@extends('master.profile')

@section('profile-content')
    @include('includes.flash.error')
    @include('includes.flash.success')

    <h1 class="my-3 text-white">Become a Vendor</h1>

    <p class="my-3 text-white">Become a Vendor on this market and you will have access to post products that you want to sell.</p>

    <p class="my-3 text-white">To become a vendor you must pay vendor fee in amount of <strong>{{ $vendorFee }} USD</strong> to the one of the following addresses.</p>

    <table class="table table-striped text-white">
        <thead>
            <tr>
                <th>Coin</th>
                <th>Address</th>
                <th>Vendor Fee</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            @foreach($depositAddresses as $depositAddress)
            <tr>
                <td>
                    <span class="badge badge-info">{{ strtoupper($depositAddress -> coin) }}</span>
                </td>
                <td>
                    <input type="text" readonly class="form-control" value="{{ $depositAddress -> address }}"/>
                </td>
                <td class="text-right">
                    <span class="badge badge-primary">{{ $depositAddress -> target }}</span>
                </td>
                <td class="text-right">
                    @if($depositAddress -> isEnough())
                        <span class="badge badge-success">Enough funds</span>
                    @endif
                    <span class="badge badge-info">{{ $depositAddress -> balance }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('profile.vendor.become') }}" class="form-inline">
                <button type="submit" class="btn btn-lg btn-success">
                    <i class="fas fa-file-signature mr-2"></i>
                    Become a Vendor
                </button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{ route('profile.become.fromcode') }}" method="POST">
                {{ csrf_field() }}
                <div class="input-group input-group-lg mb-3">
                    <input name="code" type="text" class="form-control" placeholder="Invite Code">
                    <button class="btn btn-lg btn-success" type="submit">
                        <i class="fas fa-ticket-alt mr-2"></i>
                        Submit Code
                    </button>
                </div>
            </form>
        </div>
    </div>


@stop
