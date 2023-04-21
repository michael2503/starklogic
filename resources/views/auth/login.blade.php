<x-guest-layout>
    @section('title', 'Login')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="form-bg">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-8">

                    <form method="post" action="{{ route('login') }}" class="form-horizontal">
                        @if (Session::get('failed'))
                        <div class="mt-4 alert alert-danger">
                            <b>{{ Session::get('failed') }}</b>
                        </div>
                        @endif

                        @csrf
                        <div class="text-center">
                            <img src="{{ asset('assets/images/logoBWy.png') }}" class="mb-3" width="170" alt="">
                            <div class="heading">{{ __('Welcome to Stark Logic, Please Sign In') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('Email') }}</label>
                            <input type="email" value="{{ old('user') }}" name="email" class="form-control" id="exampleInputEmail1">
                            <div class="formErr">{{$errors->first('email')}}</div>
                        </div>

                        <div class="form-group mt-4">
                            <label for="exampleInputPassword1">{{ __('Password') }}</label>
                            <input type="password" class="form-control" name="password">
                            <div class="formErr">{{$errors->first('password')}}</div>
                        </div>
                        {{-- <div class="form-group mb-4 mt-4 text-right">
                            <a routerLink="/forgot-password">{{ __('Forgot Password') }}</a>
                        </div> --}}

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <span class="btn-txt">{{ __('Login') }}</span>
                                <span class="btn-icon">
                                    <span class="fa fa-arrow-right"></span>
                                </span>
                            </button>
                        </div>

                        <div class="form-group text-center mt-5">
                            <p>{{ __('Not a member?') }} <a href="{{ route('register') }}">{{ __('Register') }}</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-guest-layout>
