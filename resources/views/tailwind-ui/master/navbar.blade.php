<nav id="header" class="bg-rqm-lighter mb-10 mt-20 py-3 relative top-0 w-full z-30">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

        <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            <nav>
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                    <li>
                        <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="{{URL('/')}}">
                            <img src="{{URL::asset('/media/royal-queen-logo.png')}}" class="absolute bottom-0 w-2/12" alt="">
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="order-2 md:order-3 flex items-center" id="nav-content">
            <a class="text-white {{Request::is('featured') ? "text-rqm-yellow" : '' }}  px-5 inline-block no-underline hover:text-rqm-yellow-dark" href="{{URL('featured')}}">
                Featured
            </a>
{{--            <a class="text-white {{Request::is('shop') ? "text-rqm-yellow" : '' }} px-5 inline-block no-underline hover:text-rqm-yellow-dark" href="{{URL('shop')}}">--}}
{{--                Shop--}}
{{--            </a>--}}
            <a class="text-white {{Request::is('vendors') ? "text-rqm-yellow" : '' }} px-5 inline-block no-underline hover:text-rqm-yellow-dark" href="{{URL('vendors')}}">
                Vendors
            </a>
            <a class="text-white {{Request::is('faqs') ? "text-rqm-yellow" : '' }} px-5 inline-block no-underline hover:text-rqm-yellow-dark" href="{{URL('faqs')}}">
                FAQs
            </a>

            <a class="text-white @isroute('profile.tickets') text-rqm-yellow @endisroute px-5 inline-block no-underline hover:text-rqm-yellow-dark" href="{{ route('profile.tickets') }}">
                Contact Us
            </a>

            <a class="text-white @isroute('profile.cart') text-rqm-yellow @endisroute px-5 pl-3 inline-block no-underline hover:text-rqm-yellow-dark px-5" href="{{route('profile.cart')}}">
                <svg class="fill-current hover:text-rqm-yellow-dark" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                    <circle cx="10.5" cy="18.5" r="1.5" />
                    <circle cx="17.5" cy="18.5" r="1.5" />
                </svg>
            </a>

            <div class="text-white @isroute('profile.index') text-rqm-yellow @endisroute group hover:text-rqm-yellow-dark inline-block no-underline pl-3">
                <svg class="fill-current hover:text-rqm-yellow-dark" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <circle fill="none" cx="12" cy="7" r="3" />
                    <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                </svg>
                <div class="absolute bg-rqm-dark group-hover:visible invisible p-1 right-32 rounded-b-lg w-1/12 z-30">
                    @if(auth()->user())
                        <span class="block text-base px-4 py-2">{{auth() -> user()->username}}</span>
                    @endif
                    <hr class="border-t mx-2 border-rqm-yellow-darkest">
                    <a href="{{ route('profile.index') }}" class="block text-base hover:bg-pink-700 px-4 py-2 hover:grow">View Profile</a>
                    @if(auth()->user())
                        @if(auth() -> user() -> isAdmin())
                            <a href="{{ route('admin.index') }}" class="block text-base hover:bg-pink-700 px-4 py-2 hover:grow">Admin Panel</a>
                        @endif
                    @endif
                    <hr class="border-t mx-2 border-rqm-yellow-darkest">
                    <form action="{{route('auth.signout.post')}}" method="post">
                        @csrf
                        <a href="#" class="block text-base hover:bg-pink-700 px-4 py-2 hover:grow">
                            <button class="btn btn-link btn-lg text-white" type="submit">Logout</button>
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</nav>
