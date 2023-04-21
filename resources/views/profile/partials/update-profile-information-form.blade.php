<section>
    <header>
        <h5>
            {{ __('Profile Information') }}
        </h5>

        <p>
            <small>{{ __("Update your account's profile information and email address.") }}</small>
        </p>
    </header>


    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" >
            <div class="formErr">{{$errors->first('name')}}</div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('name', $user->email) }}" required autofocus autocomplete="username" >
            <div class="formErr">{{$errors->first('email')}}</div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>


        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('name', $user->phone) }}" required autofocus autocomplete="username" >
            <div class="formErr">{{$errors->first('phone')}}</div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</section>
