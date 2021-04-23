<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>Login - Royal Queen Market</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/rqm-app.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{URL::asset('/media/rqm-icon.png')}}" type="image/png" sizes="16x16">
    <script defer src="https://kit.fontawesome.com/b111388ee6.js" crossorigin="anonymous"></script>

</head>

<body class="page-bg-color">

    <div class="container login-margin-top">
        <div class="row">
            <div class="col-md-4 offset-md-4 rounded-3 shadow p-0">
                <div class="login-case">
                    <img src="{{URL::asset('/media/login-case.png')}}" class="img-fluid" alt="">
                </div>
                <h1 class="h3 text-warning mt-4 text-center">SIGN UP</h1>
                <p class="text-warning text-center">GET YOUR ACCOUNT IN MINUTES</p>
                <form action="{{route('auth.register.with.invite.post', ['code' => $code])}}" method="post" class="needs-validation">
                    @csrf
                    <div class="row">
                        <div class="col-md-10 offset-md-1 mb-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text text-warning" id="basic-addon1"><i
                                        class="far fa-user-circle"></i></span>
                                <input type="text" class="form-control @if($errors->has('username')) is-invalid @endif" placeholder="Username" value="{{$username}}" name="username" id="username" readonly>
                                @if($errors->has('username'))
                                    <p class="text-danger">{{$errors->first('username')}}</p>
                                @endif
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text text-warning" id="basic-addon1"><i
                                        class="fas fa-lock"></i></i></span>
                                <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Password" name="password"
                                   id="password">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text text-warning" id="basic-addon1"><i
                                        class="fas fa-lock"></i></i></span>
                                <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Confirm Password"
                                   name="password_confirmation" id="password_confirm">
                            </div>
                            @if($errors->has('password'))
                                <p class="text-danger">{{$errors->first('password')}}</p>
                            @endif
                            <div class="form-group mt-1">
                                <span class="text-muted">
                                    Your private key for decrypting messages will be protected with your password. Please make
                                    sure that you choose a strong one
                                </span>
                            </div>
                        </div>
                        <div class="col-md-10 offset-md-1 mb-3">
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Invite Code</div>
                            </div>
                            <input type="text" name="code" value="{{$code}}" class="form-control"
                                   @if($code !== '') readonly @endif>
                        </div>

                    </div>

                    <div class="form-group mt-1">
                        <span class="text-muted">
                            Copy Encrypted Message and decrypt it to get validation number
                        </span>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <textarea rows="7" type="text" name="notes" class="form-control"
                                   @if($notes !== '') readonly @endif>{{$notes}}</textarea>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Validation Number</div>
                            </div>
                            <input type="text" name="validation_number" class="form-control">
                        </div>

                    </div>
                        </div>
                        <div class="col-md-10 offset-md-1 mb-3">
                            <label for="captcha" class="form-label text-white">Security Challenge</label>
                            <div class="text-center">
                                <img src="{{$captcha}}" alt="">
                            </div>
                            <div class="input-group mb-3">
                                <!-- <span class=" rounded-0 input-group-text text-warning" id="basic-addon1"><i
                                        class="fas fa-shield-alt"></i></i></span> -->
                                <input class="form-control mt-3 @if($errors->has('captcha')) is-invalid @endif" type="text" name="captcha" placeholder="Enter Captcha">
                                <div class="invalid-feedback">
                                    Prove You are a Human
                                </div>
                            @if($errors->has('captcha'))
                                <p class="text-danger">{{$errors->first('captcha')}}</p>
                            @endif
                            </div>


                        </div>
                        <div class="col-md-6 offset-md-3">
                            <div class="d-grid mb-2">
                                <button class="btn btn-info text-white" type="submit">SIGN UP</button>
                            </div>
                            <p class="text-center"><a href="{{route('auth.signin')}}" class="text-white">LOG IN</a></p>
                            <p class="text-center"><a href="./" class="text-muted">HOME</a></p>
                        </div>


                    </div>
                </form>
                <div class="login-case mb-4">
                    <img src="{{URL::asset('/media/bottom-separator-1.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>

<script src="{{ URL::asset('js/rqm-scripts.js') }}"></script>

</html>
