<x-app-layout>
    @section('title', 'Edit Link')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Links') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <x-success-message />

                @if ($errors->first('title'))
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="mt-4 alert alert-danger">
                            <b>{{ $errors->first('title') }}</b>
                        </div>
                    </div>
                </div>
                @endif


                <form method="post" action="{{ route('updateLink', $single->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Link Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $single->title }}" placeholder="Personalised your link e.g: john doe is here" required>
                    </div>

                    <div class="mt-5">
                        <p class="text-danger">Do you want to add any information. whenever a user visit your link, the information you added below will be display</p>
                    </div>

                    <div class="form-group">
                        <label for="linkImg">Upload Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="linkImg" name="image" value="{{ $single->image }}">
                            <label class="custom-file-label" for="linkImg">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" id="mytextarea" cols="30" rows="10">{{ $single->content }}</textarea>
                    </div>

                    <div class="mt-4 text-center">
                        <button class="btn btn-primary">UPDATE LINK</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
