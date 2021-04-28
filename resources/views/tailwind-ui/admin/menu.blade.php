<div class="bg-rqm-dark py-10 rounded w-1/6 relative min-h-screen">
    <div class="py-2 pl-3 text-rqm-yellow-dark hover:bg-pink-800 hover:shadow @isnotroute('admin.index') hover:grow @endisnotroute @isroute('admin.index')transform scale-105 bg-pink-800 shadow @endisroute">
        <a class="flex w-full" href="{{ route('admin.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            Dashboard
        </a>
    </div>

    <div class="py-2 pl-3 flex text-rqm-yellow-dark hover:bg-pink-800 hover:shadow @isnotroute('admin.categories') hover:grow @endisnotroute @isroute('admin.categories')transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('admin.categories') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Categories
        </a>
    </div>
    <div class="py-2 pl-3 flex text-rqm-yellow-dark hover:bg-pink-800 hover:shadow @isnotroute('admin.messages.mass') hover:grow @endisnotroute @isroute('admin.messages.mass') transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('admin.messages.mass') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
            </svg>
            Bulk Messaging
        </a>
    </div>
    <div class="py-2 pl-3 flex text-rqm-yellow-dark hover:bg-pink-800 hover:shadow @isnotroute('admin.users') hover:grow @endisnotroute @isroute('admin.users') transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('admin.users') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Users
        </a>
    </div>
    <div class="py-2 pl-3 flex text-rqm-yellow-dark hover:bg-pink-800 hover:shadow @isnotroute('admin.products') hover:grow @endisnotroute @isroute('admin.products') transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('admin.products') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
            </svg>
            Products
        </a>
    </div>
    <div class="py-2 pl-3 flex text-rqm-yellow-dark hover:bg-pink-800 hover:shadow @isnotroute('admin.featuredproducts.show') hover:grow @endisnotroute @isroute('admin.featuredproducts.show') transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('admin.featuredproducts.show') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
            </svg>
            Featured Products
        </a>
    </div>
    <div class="py-2 pl-3 flex text-rqm-yellow-dark hover:bg-pink-800 hover:shadow @isnotroute('admin.purchases') hover:grow @endisnotroute @isroute('admin.purchases') transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('admin.purchases') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Purchases
        </a>
    </div>
    <div class="py-2 pl-3 flex text-rqm-yellow-dark hover:bg-pink-800 hover:shadow @isnotroute('admin.log') hover:grow @endisnotroute @isroute('admin.log') transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('admin.log') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            Activity Logs
        </a>
    </div>
    <div class="py-2 pl-3 flex text-rqm-yellow-dark hover:bg-pink-800 hover:shadow @isnotroute('admin.disputes') hover:grow @endisnotroute @isroute('admin.disputes') transform scale-105 bg-pink-800 shadow @endisroute">
        <a href="{{ route('admin.disputes') }}" class="flex w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            Disputes
        </a>
    </div>

    <div class="py-24"><span></span></div>

    <div class="absolute inset-x-0 bottom-0 w-full h-16">
        <img src="{{URL::asset('/media/top-separator.png')}}" class="h-full object-cover object-top transform transform:rotate-180 w-full" alt="">
    </div>
</div>
