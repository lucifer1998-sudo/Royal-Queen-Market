{{--<div class="card mt-5 profile-card border border-secondary" >--}}
{{--    <div class="card-body">--}}

{{--        <div class="row">--}}
{{--            <div class="col-sm-3">--}}
{{--                <h4><a href="{{ route('vendor.show', $vendor) }}" style="color: black">{{ $vendor -> username }}</a></h4>--}}
{{--                <p> --}}
{{--                    <span class="btn @if($vendor->vendor->experience >= 0) btn-primary @else btn-danger @endif active">--}}
{{--                        Level {{$vendor->vendor->getLevel()}}--}}
{{--                    </span>--}}
{{--                    <span class="@if($vendor->vendor->experience < 0) text-danger @endif">--}}
{{--                        ({{$vendor->vendor->getShortXP()}} XP)</span>--}}
{{--                </p>--}}
{{--                @if($vendor->vendor->isTrusted())--}}
{{--                    <p class="badge badge-success">Trusted vendor <span class="fa fa-check-circle"></span></p>--}}
{{--                @endif--}}
{{--                @if($vendor->vendor->isDwc())--}}
{{--                    <p class="badge badge-danger">Deal with caution <span class="fa fa-exclamation-circle"></span></p>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--            <div class="col-sm-5 text-center">--}}
{{--                <p>--}}
{{--                    {{$vendor->vendor->about}}--}}
{{--                </p>--}}
{{--            </div>--}}
{{--            <div class="col-sm-4 text-right">--}}
{{--                <p>--}}
{{--                    <a href="{{ route('profile.messages').'?otherParty='.$vendor->username}}" class="btn btn-outline-secondary"><span class="fas fa-envelope"></span> Send message</a></p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <hr>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-12">--}}
{{--                @include('includes.vendor.feedback')--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}
<div class="rounded overflow-hidden border w-full lg:w-6/12 md:w-6/12 bg-rqm-lighter mx-3 md:mx-0 lg:mx-0">
    <div class="w-full flex justify-between m-5">
        <div class="w-full md:w-1/2 block uppercase tracking-wide font-bold text-left p-2">
            <a class="text-2xl text-white" href="{{ route('vendor.show', $vendor) }}">{{ $vendor -> username }}</a>
            <p class="text-white text-xl mt-5">
            <span class="rounded rounded-xl p-4 mt-3 @if($vendor->vendor->experience >= 0) bg-indigo-500 @else bg-red-500 @endif active">
                Level {{$vendor->vendor->getLevel()}}
            </span>
            <span class="ml-2 @if($vendor->vendor->experience < 0) text-red-500 @endif">
                ({{$vendor->vendor->getShortXP()}} XP)
            </span>
            </p>
        </div>
        <div class="w-full md:w-1/2 p-3">
            <p class="text-right">
                <a href="{{ route('profile.messages').'?otherParty='.$vendor->username}}" class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4">
                    Send message
                </a>
            </p>
        </div>
        <span class="px-2 hover:bg-gray-300 cursor-pointer rounded"><i class="fas fa-ellipsis-h pt-2 text-lg"></i></span>
    </div>
    <hr class="m-5">
    <div class="flex">
        <div class="w-full">
            @include('tailwind-ui.includes.vendor.feedback')
        </div>
    </div>
</div>
