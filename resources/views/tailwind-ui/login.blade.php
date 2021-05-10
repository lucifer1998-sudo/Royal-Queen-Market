@extends('tailwind-ui.master.main')

@section('title','FAQs')

@section('content')
    <div class="pt-20 w-full">
        <div class="w-full">
            <div class="flex justify-center px-96">
                <div class="bg-rqm-lighter shadow w-2/3">
                    <div>
                        <img src="{{URL::asset('/media/login-case.png')}}" class="w-full" alt="">
                    </div>
                    <div class="justify-center py-5 text-rqm-yellow">
                        <div class="text-2xl w-full flex justify-center font-sans roboto">LOGIN</div>
                        <div class="flex font-extralight justify-center text-1xl w-full font-sans roboto">Sessions expires every 90 minutes</div>
                    </div>
                    <form action="{{ route('auth.signin.post') }}" method="POST">
                        @csrf
                        @if(session()->has('success'))
                            @include('tailwind-ui.includes.success', ['strongMessage' => 'Success', 'message' => session()->get('success')])
                        @elseif(session()->has('error'))
                            @include('tailwind-ui.includes.warning', ['strongMessage' => 'Warning', 'message' => session()->get('error')])
                        @elseif($errors -> any())
                            @foreach ($errors -> all() as $error)
                                @include('tailwind-ui.includes.warning', ['strongMessage' => 'Warning', 'message' => $error])
                            @endforeach
                        @endif
                        <div class="flex justify-center py-1">
                            <div class="flex justify-center">
                                <div class="bg-rqm-light px-2 py-1 relative flex w-full flex-wrap items-stretch">
                                    <span class="leading-snug z-10 h-full absolute text-rqm-yellow items-center justify-center px-4 py-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg></span>
                                    <input type="text" id="username" name="username" placeholder="Username" class=" py-1 rounded-full relative w-full pl-10" />
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center py-1">
                            <div class="flex justify-center">
                                <div class="bg-rqm-light px-2 py-1">
                                    <span class="leading-snug z-10 h-full absolute text-rqm-yellow items-center justify-center px-4 py-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                    </svg></span>
                                    <input type="password" id="password" name="password" placeholder="Password" class=" py-1 rounded-full relative w-full pl-10" />
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center">

                        </div>
                        <div class="flex justify-center pt-5">
                            <div>
                                <div class="flex justify-center text-lg text-rqm-yellow w-64">
                                    Security Challenge
                                </div>
                                <div class="flex justify-center text-lg text-rqm-yellow w-64">
                                    <img src="{{$captcha}}" alt="">
                                </div>
                                <div class="flex justify-center py-2 text-lg w-64">
                                    <input type="text" id="captcha" name="captcha" placeholder="Captcha" class=" px-2 py-2 text-base rounded-full" />
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center pt-5">
                            <div>
                                <div class="flex justify-center text-lg text-rqm-yellow w-64">
                                    <button type="submit" value="Log In" class="bg-rqm-yellow font-black py-2 text-rqm-dark w-full">Login</button>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 pb-5 pt-10">
                            <div class="flex-1">
                                <div class="flex justify-around px-7 text-white">
                                    <a href="#" class="text-left w-full">
                                        I Lost My Password
                                    </a>
                                    <a href="{{route('auth.signup')}}" class="text-right w-full">
                                        Sign Up
                                    </a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="flex justify-center py-5 w-full">
                            <img src="{{URL::asset('/media/bottom-separator-1.png')}}" class="h-1/3 transform" alt="">
            </div>
        </div>
    </div>
@endsection
