<x-app-layout>
    @section('title', 'Edit Link')

    <x-breadcrum data="Edit Links"/>


    <div class="container mb-5">
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

        <div class="card card-header">


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

</x-app-layout>
