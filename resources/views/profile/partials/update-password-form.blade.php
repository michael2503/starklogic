<section>
    <header>
        <h5>
            {{ __('Update Password') }}
        </h5>

        <p>
            <small>{{ __("Ensure your account is using a long, random password to stay secure.") }}</small>
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" id="current_password" name="current_password" class="form-control" autocomplete="current-password" >
            <div class="formErr">{{$errors->updatePassword->first('current_password')}}</div>
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" class="form-control" autocomplete="new-password" >
            <div class="formErr">{{$errors->updatePassword->first('password')}}</div>
        </div>

        <div class="form-group">
            <label for="password_confirmation">New Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" autocomplete="new-password" >
            <div class="formErr">{{$errors->updatePassword->first('password_confirmation')}}</div>
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">Save</button>
            {{-- <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif --}}
        </div>
    </form>
</section>
