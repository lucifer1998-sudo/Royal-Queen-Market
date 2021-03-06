<div class="bg-rqm-lighter py-10 rounded w-1/6 relative min-h-screen">
    <div class="py-2 pl-3 text-rqm-white hover:bg-pink-800 hover:shadow @isnotroute('profile.index') hover:grow @endisnotroute @isroute('profile.index')transform scale-105 bg-pink-800 shadow @endisroute">
        <a class="flex w-full" href="{{ route('profile.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Account Settings
        </a>
    </div>

    <div class="py-2 pl-3 flex text-rqm-white hover:bg-pink-800 hover:shadow @isnotroute('profile.pgp') hover:grow @endisnotroute @isroute('profile.pgp')transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('profile.pgp') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
            </svg>
            PGP Key
        </a>
    </div>
    <div class="py-2 pl-3 flex text-rqm-white hover:bg-pink-800 hover:shadow @isnotroute('profile.vendor') hover:grow @endisnotroute @isroute('profile.vendor') transform scale-105 bg-pink-800 shadow @endisroute">
        @if(auth() -> user() -> isVendor())
        <a href="{{ route('profile.vendor') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
            </svg>
            Vendor
        </a>
        @else
        <a href="{{ route('profile.become') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
            </svg>
            Become a Vendor
        </a>
        @endif
    </div>
    @if(auth() -> user() -> isVendor())
    <div class="py-2 pl-3 flex text-rqm-white hover:bg-pink-800 hover:shadow @isnotroute('profile.sales') hover:grow @endisnotroute @isroute('profile.sales') transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('profile.sales') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            Sales
        </a>
    </div>
    @endif
    <div class="py-2 pl-3 flex text-rqm-white hover:bg-pink-800 hover:shadow @isnotroute('profile.wishlist') hover:grow @endisnotroute @isroute('profile.wishlist') transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('profile.wishlist') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            Wishlist
        </a>
    </div>
    <div class="py-2 pl-3 flex text-rqm-white hover:bg-pink-800 hover:shadow @isnotroute('profile.purchases') hover:grow @endisnotroute @isroute('profile.purchases') transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('profile.purchases') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            Your Purchases
        </a>
    </div>
    <div class="py-2 pl-3 flex text-rqm-white hover:bg-pink-800 hover:shadow @isnotroute('profile.messages') hover:grow @endisnotroute @isroute('profile.messages') transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('profile.messages') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
            </svg>
            Messages
            <div>
                @php
                    $messages = auth() -> user() -> receiverconversations() -> count();

                @endphp
{{--                @dd($messages)--}}
                <span class="bg-rqm-white h-0.5 ml-2 px-2 rounded-full text-rqm-dark text-xs">{{$messages}}</span>
            </div>
        </a>
    </div>
    <div class="py-2 pl-3 flex text-rqm-white hover:bg-pink-800 hover:shadow @isnotroute('profile.notifications') hover:grow @endisnotroute @isroute('profile.notifications') transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('profile.notifications') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <div class="flex w-full">
                <div>Notifications</div>
                <div>
                    @php
                        $notifCount = auth()->user()->notifications()->where('read',0)->count();
                    @endphp
                    <span class="bg-rqm-white h-0.5 ml-2 px-2 rounded-full text-rqm-dark text-xs">{{$notifCount}}</span>
                </div>
            </div>
        </a>
    </div>

    <div class="py-24"><span></span></div>

    <div class="absolute inset-x-0 bottom-0 w-full h-16">
        <img src="{{URL::asset('/media/top-separator.png')}}" class="h-full object-cover object-top transform transform:rotate-180 w-full" alt="">
    </div>
</div>
