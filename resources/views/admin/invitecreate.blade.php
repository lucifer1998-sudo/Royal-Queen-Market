@extends('master.admin')

@section('bg')
    @include('master.navbar')
    @include('includes.jswarning')
@endsection

@section('admin-content')

    @include('includes.flash.success')
    @include('includes.flash.error')
    @include('includes.validation')

    <h3 class="mb-5 text-white" >Generate Invite Code</h3>
    <hr>
    @if(Session::has('code'))
        <div class="alert alert-success" style="word-wrap: break-word; text-align: left !important;">
            <strong> Generated Code is </strong> <br>
            {{ Session::get('code')}}
        </div>
    @endif
    @if(Session::has('outside_code'))
        <div class="alert alert-success" style="word-wrap: break-word; text-align: left !important;">
            Generated Code link is <br>
            <strong> {{ Session::get('outside_code')}} </strong>
        </div>
    @endif
    @if(Session::has('outside_vendor'))
        <div class="alert alert-warning" style="word-wrap: break-word; text-align: left !important;">
            <strong> {{ Session::get('outside_vendor')}} </strong>
             is a vendor outside the platform. <strong>Please add PGP key to continue..</strong>
        </div>
    @endif

    @if(!Session::has('outside_vendor'))
    <form action="{{ route('admin.invite.store') }}" method="POST" class="text-white">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="col-md-12 mb-2">
                <label for="message">
                    Vendor Username
                </label>
                <input name="vendor_username" placeholder="Vendor name" value="{{$username}}" id="vendor_name" class="form-control" />
            </div>
            <div class="col-md-12 justify-content-lg-end d-flex">
                <button type="submit" class="btn btn-outline-primary mt-auto">Generate Code</button>
            </div>
        </div>
    </form>
    @endif

    <br>

    @if(Session::has('code'))
        <form action="{{ route('admin.messages.usersend') }}" method="POST" class="text-white">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{Session::get('user')->id}}" />
            <div class="form-row">
                <div class="col-md-12 mb-2">
                    <label for="message">
                        Message for {{Session::get('user')->username}}:
                    </label>
                    <textarea name="message" placeholder="Paste your message here." id="message" class="form-control" rows="7"></textarea>
                </div>
                <div class="col-md-12 justify-content-lg-end d-flex">
                    <button type="submit" class="btn btn-outline-primary mt-auto">Send message</button>
                </div>
            </div>
        </form>
    @endif

    @if(Session::has('outside_vendor'))
        <form action="{{ route('admin.invite.outside.store') }}" method="POST" class="text-white">
            {{ csrf_field() }}
            <input type="hidden" name="vendor_username" value="{{Session::get('outside_vendor')}}" />
            <div class="form-row">
                <div class="col-md-12 mb-2">
                    <label for="message">
                        PGP for new user {{Session::get('outside_vendor')}}:
                    </label>
                    <textarea name="newpgp" placeholder="Paste PGP here." id="newpgp" class="form-control" rows="7"></textarea>
                </div>
                <div class="col-md-12 justify-content-lg-end d-flex">
                    <button type="submit" class="btn btn-outline-primary mt-auto">Generate Invite Now</button>
                </div>
            </div>
        </form>
    @endif


    <br>

    <table class="table text-white" >
        <thead>
        <tr>
            <th>Code</th>
            <th>User</th>
            <th>Status</th>
            <th>Date Created</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invites as $invite)
            <tr>
                <td>
                    {{$invite->code}}
                </td>
                <td>
                    {{$invite->user ? $invite->user->username : 'n/a'}}
                </td>
                <td>
                    {{$invite->is_claimed ? 'Claimed' : 'Not yet claimed'}}
                </td>
                <td>
                    {{$invite->created_at}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
