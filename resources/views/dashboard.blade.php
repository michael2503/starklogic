<x-app-layout>
    @section('title', 'Dashboard')

    <x-breadcrum data="Dashboard"/>

    <div class="py-12">

        <div class="container">
            <div class="card card-header pb-5 pt-5">
                <p>You're logged in!</p>
                <p>Click on <b style="display: inline"><a href="{{ route('getLinks') }}">Links</a></b> on the navbar to create a personalised link</p>
            </div>
        </div>
    </div>
</x-app-layout>
