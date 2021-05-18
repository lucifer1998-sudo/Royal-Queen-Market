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
                        <div class="text-2xl font-sans roboto w-full flex justify-center uppercase">Sign Up</div>
                        <div class="flex font-extralight justify-center text-1xl font-sans roboto w-full">Get Your
                            Account in Minutes
                        </div>
                    </div>
                    <form action="{{route('auth.signup.post')}}" method="POST">
                        @csrf
                        @if(session()->has('success'))
                            @include('tailwind-ui.includes.success', ['strongMessage' => 'Success', 'message' => session()->get('success')])
                        @elseif(session()->has('error'))
                            @include('tailwind-ui.includes.warning', ['strongMessage' => 'Warning', 'message' => session()->get('error')])
                        @elseif(session()->has('errormessage'))
                            @include('tailwind-ui.includes.warning', ['strongMessage' => 'Warning', 'message' => session()->get('errormessage')])
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                @include('tailwind-ui.includes.warning', ['strongMessage' => 'Warning', 'message' => $error])
                            @endforeach
                        @endif
                        <div class="flex justify-center py-1">
                            <div class="flex justify-center">
                                <div class="bg-rqm-light px-2 py-1 relative flex w-full flex-wrap items-stretch">
                                    <span
                                        class="leading-snug z-10 h-full absolute text-rqm-yellow items-center justify-center px-4 py-1"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg></span>
                                    <input type="text" id="username" name="username" placeholder="Username"
                                           class=" py-1 rounded-full relative w-full pl-10 placeholder-rqm-dark"
                                           value="{{$username}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center py-1">
                            <div class="flex justify-center">
                                <div class="bg-rqm-light px-2 py-1">
                                    <span
                                        class="leading-snug z-10 h-full absolute text-rqm-yellow items-center justify-center px-4 py-1"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                    </svg></span>
                                    <input type="password" id="password" name="password" placeholder="Password"
                                           class=" py-1 rounded-full relative w-full pl-10 placeholder-rqm-dark"/>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center py-1">
                            <div class="flex justify-center">
                                <div class="bg-rqm-light px-2 py-1">
                                    <span
                                        class="leading-snug z-10 absolute text-rqm-yellow items-center justify-center px-4 py-1"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                    </svg></span>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                           placeholder="Confirm Password"
                                           class=" py-1 rounded-full relative w-full pl-10 placeholder-rqm-dark"/>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="flex pb-4 w-64">
                                <span class="opacity-70 text-justify text-sm text-rqm-yellow">Your private key for decrypting messages will be protected with your password. Please make sure that you choose a strong one. </span>
                            </div>
                        </div>
                        <div class="flex justify-center py-1">
                            <div class="flex justify-center">
                                <div class="bg-rqm-light px-2 py-1">
                                    <span
                                        class="leading-snug z-10 absolute text-rqm-yellow items-center justify-center px-4 py-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                    </svg>
                                    </span>
                                    <input type="text" id="refid" name="refid" value="{{$code}}"
                                           placeholder="Referral Code"
                                           class=" py-1 rounded-full relative w-full pl-10 placeholder-rqm-dark"/>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="flex pb-4 w-64">
                                <span class="opacity-70 text-justify text-sm text-rqm-yellow">
                                     Copy Encrypted Message and decrypt it to get validation number
                                </span>
                            </div>
                        </div>
                        <div class="flex justify-center py-1">
                            <div class="flex justify-center">
                                <div class="bg-rqm-light px-2 py-1">
                                    <textarea rows="7" type="text" id="refid" name="notes"
                                              placeholder="Referral Code"
                                              class=" py-1 rounded relative w-full pl-10 placeholder-rqm-dark">
{{$notes}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center pt-5">
                            <div>
                                <div class="flex justify-center text-lg text-rqm-yellow w-64">
                                    Security Challenge
                                </div>
                                <div class="flex justify-center text-lg text-rqm-yellow w-64">
                                    <img src="{{$captcha}}" alt="">
                                </div>
                                <div class="bg-rqm-light px-2 py-3 py-1">
                                    <span
                                        class="leading-snug z-10 absolute text-rqm-yellow items-center justify-center px-4 py-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                    </svg>
                                    </span>
                                    <input type="text" id="captcha" name="captcha" placeholder="Captcha"
                                           class=" py-1 rounded-full relative w-full pl-10 placeholder-rqm-dark"/>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center pt-5">
                            <div>
                                <div class="flex justify-center text-lg text-rqm-yellow w-64">
                                    <button type="submit" value="Log In"
                                            class="bg-rqm-yellow font-black py-2 text-rqm-dark w-full">Sign Up
                                    </button>
                                </div>
                                <div class="flex justify-center text-lg text-rqm-yellow w-64">
                                    <a href="{{route('auth.signin')}}" class="w-full">
                                        <button type="button" value="Log In" class="w-full">Log In</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center pt-3">
                            <div>

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
