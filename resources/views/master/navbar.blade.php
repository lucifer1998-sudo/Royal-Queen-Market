<header class="header" id="myHeader">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 col-xl-1 col-4">
                <img src="{{URL::asset('/media/royal-queen-logo.png')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <ul class="nav menu-margin">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{URL('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{URL('featured')}}">Featured</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{URL('shop')}}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{URL('vendors')}}">Vendors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL('faqs')}}">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ route('profile.tickets') }}">Contact Us</a>
                    </li>
                    @admin
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{route('admin.index')}}">Admin Dashboard</a>
                        </li>
                    @endadmin
                    @moderator
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{route('admin.index')}}">Admin Panel</a>
                        </li>
                    @endmoderator
                </ul>
            </div>
            <div class="col-2 d-block d-md-none"></div>
            <div class="col-md-2 d-none d-md-block d-lg-none"></div>
            <div class="col-md-6 col-xl-3 col-6 text-end">
                <div class="row menu-margin">
                    <div class="d-none d-md-block col-md-6 col-lg-6">
                        <form action="{{route('search')}}" method="POST" class="form-inline h-100">
                            @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." aria-label="Search"
                                aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                    class="fas fa-search"></i></button>
                        </div>
                        </form>
                    </div>  
                    <div class="col-2 d-md-none"></div>
<!--                   
                    <div class="col-md-2 col-lg-2 text-end col-3">
                        <a class="btn btn-link btn-lg text-white" href=""><i
                                class="fas fa-plus"></i></a>
                    </div>
                     -->
                    <div class="col-md-2 col-lg-2  text-end col-3">
                        <button onclick="window.location.href='/profile/index'" class="btn btn-link btn-lg text-white"><i
                                class="far fa-user-circle"> {{ Auth::user()->username }}</i></button>
                    </div>
                    @auth
                    <div class="col-md-2 col-lg-2  text-end col-3">
                        <form action="{{route('auth.signout.post')}}" method="post">
                            @csrf
                        <button class="btn btn-link btn-lg text-white" type="submit">Logout</button>
                        </form>
                    </div>
                    @endauth
                    <div class="col-md-2 d-lg-none text-end col-3">
                        <button type="button" onclick="openNav()" class="btn btn-link btn-lg text-white"><i
                                class="fas fa-bars"></i></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>