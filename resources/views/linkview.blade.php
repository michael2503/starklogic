<x-app-layout>
    @section('title', $link->title)
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <x-breadcrum data="{{ $link->title }}"/>

    <section class="linkView">


    <div class="container mb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <div class="imgWrapper">
                    <img src="{{ asset("uploads/$link->image") }}" alt="">
                </div>

                <div class="text mt-4">
                    <h4>{{ $link->title }}</h4>
                    {!!$link->content ?? '' !!}
                </div>

            </div>
        </div>
    </div>
   </section>

</x-app-layout>
