<x-app-layout>
    @section('title', 'Profile')

    <x-breadcrum data="Profile"/>



    <div class="container">
        @if (session('status') === 'profile-updated')
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Profile successfully updated.
                </div>
            </div>
        </div>
        @endif

        @if (session('status') === 'password-updated')
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Password successfully changed.
                </div>
            </div>
        </div>
        @endif


        <div class="card card-body shadow sm:rounded-lg mb-4">
            @include('profile.partials.update-profile-information-form')
        </div>



    </div>
</x-app-layout>
