<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Register Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>
</head>
<body class="bg-white font-family-karla h-screen">

    <div class="w-full flex flex-wrap">

        <!-- Register Section -->
        <div class="w-full md:w-1/2 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-12">
                <a href="#" class="bg-black text-white font-bold text-xl p-4">Logo</a>
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">Join Us.</p>
                <form class="flex flex-col pt-3 md:pt-8" action="{{route('auth.signup.post')}}" method="post">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <label for="username" class="text-lg">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @if($errors->has('username')) is-invalid @endif">
                                @if($errors->has('username'))
                                    <p class="text-danger">{{$errors->first('username')}}</p>
                                @endif
                    </div>
    
                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @if($errors->has('password')) is-invalid @endif">
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="password_confirm" class="text-lg">Confirm Password</label>
                        <input type="password" id="password_confirm" name="password_confirmation" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @if($errors->has('password')) is-invalid @endif">
                            @if($errors->has('password'))
                                <p class="text-danger">{{$errors->first('password')}}</p>
                            @endif
                        <p>Please create a strong password and save it. This password will be used to decrypt your inbox and they cannot be decrypted by anyone else.</p>
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="refid" class="text-lg">Referral Code</label>
                        <input type="text" id="refid" name="refid" placeholder="Referral Code" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @if($refid !== '') readonly @endif">
                    </div>

                    <div class="flex flex-col pt-4">
                        <label class="text-lg">Captcha</label>
                        <img src="{{$captcha}}" alt="">
                        <input type="text" id="captcha" name="captcha" placeholder="Captcha" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @if($errors->has('captcha')) is-invalid @endif">
                                @if($errors->has('captcha'))
                                <p class="text-danger">{{$errors->first('captcha')}}</p>
                                @endif
                    </div>
    
                    <input type="submit" value="Register" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Already have an account? <a href="login.html" class="underline font-semibold">Log in here.</a></p>
                </div>
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0">
        </div>
    </div>

</body>
</html>