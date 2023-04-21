<x-guest-layout>
    @section('title', 'Register')

    <div class="form-bg">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 col-md-8">

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <x-error-message />
                        </div>
                    </div>



                    <form method="post" action="{{ route('register') }}" class="form-horizontal">
                        @csrf
                        <div class="text-center">
                            <img src="{{ asset('assets/images/starlogic.jpg') }}" class="mb-3" width="170" alt="">
                            <div class="heading">{{ __('Welcome to Stark Logic, Please Sign Up') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group mt-4">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name">
                                    <div class="formErr">{{$errors->first('name')}}</div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group mt-4">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="email">
                                    <div class="formErr">{{$errors->first('email')}}</div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group mt-4">
                                    <label for="phone">{{ __('Phone') }}</label>
                                    <input type="text" value="{{ old('phone') }}" name="phone" class="form-control" id="phone">
                                    <div class="formErr">{{$errors->first('phone')}}</div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group mt-4">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    <div class="formErr">{{$errors->first('password')}}</div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group mt-4">
                                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                    <div class="formErr">{{$errors->first('password_confirmation')}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <span class="btn-txt">{{ __('SIGNUP') }}</span>
                                <span class="btn-icon">
                                    <span class="fa fa-arrow-right"></span>
                                </span>
                            </button>
                        </div>

                        <div class="form-group text-center mt-5">
                            <p>{{ __('Already a member?') }} <a href="{{ route('login') }}">{{ __('Login') }}</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
