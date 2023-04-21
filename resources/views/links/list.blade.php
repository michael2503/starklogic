<x-app-layout>
    @section('title', 'All Links')

    <x-breadcrum data="Links"/>


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

        <div class="card mb-5">
            <div class="card-header">
                <div class="text-right">
                    <div class="d-flex justify-content-between">
                        <div class="allLink text-left">
                            <p><b>All Links</b>: {{ count($links) }}</p>
                            <p class="mb-0"><b>Total Clicks</b>: {{ $totalClick }}</p>
                        </div>
                        <div class="allLink">
                            <button class="btn btn-success" data-toggle="modal" data-target="#addLink">Create Link</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Link</th>
                        <th>No. of Clicks</th>
                        <th>Created On</th>
                        <th>Options</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($links as $link)
                    <tr>
                        <td>#{{ $link->id }}</td>
                        <td>{{ $baseUrl.'/'.$link->link_name }}</td>
                        <td>{{ $link->clicks }}</td>
                        <td>{{ date('M d, Y', strtotime($link->created_at)) }}</td>
                        <td style="width: 200px">
                            <a href="{{ route('singleLink', $link->id) }}" title="Edit Link" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('viewLink', $link->link_name) }}" title="View Link" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
                            <button title="Share Link" onclick='shareLink("{{ $link->link_name }}", "{{ $link->title }}")' class="btn btn-info btn-sm" data-toggle="modal" data-target="#shareLink"><i class="fa fa-share-alt"></i></button>
                            <button title="Share Link" onclick='copyLink("{{ $link->link_name }}", "{{ $link->title }}")' class="btn btn-info btn-sm"><i class="fa fa-copy"></i></button>
                            <button onclick="deleteLink({{ $link->id }})" title="Delete Link" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Links Available</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>


        <div class="d-flex justify-content-center">
            {!! $links->links() !!}
        </div>
    </div>



    <!-- The Link Modal -->
    <div class="modal fade" id="addLink">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Create Link</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <form method="post" action="{{ route('addLink') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Link Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Personalised your link e.g: john doe is here" required>
                        </div>

                        <div class="mt-5">
                            <p class="text-danger">Do you want to add any information. whenever a user visit your link, the information you added below will be display</p>
                        </div>

                        <div class="form-group">
                            <label for="linkImg">Upload Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="linkImg" name="image">
                                <label class="custom-file-label" for="linkImg">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mytextarea">Content</label>
                            <textarea name="content" class="form-control" id="mytextarea" cols="30" rows="10">{{ old('content') }}</textarea>
                        </div>

                        <div class="mt-4 text-center">
                            <button class="btn btn-primary">ADD LINK</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- Share link --}}
    <div class="modal fade" id="shareLink">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Share Link</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="d-flex justify-content-center">
                        <div class="share mr-3" id="facebookLink"></div>
                        <div class="share mr-3" id="twitterLink"></div>
                        <div class="share mr-3" id="linkedinLink"></div>
                        <div class="share mr-3" id="whatsappLink"></div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    {{-- Delete link --}}
    <div class="modal fade" id="deleteLinkModal">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">

                    <p class="text-center mb-4 mt-4">Are you sure you want to delete this link?</p>

                    <form action="{{ route("deleteLink") }}" method="post">
                        @csrf
                        <input type="hidden" id="deleteID" name="id">

                        <div class="text-center mb-3">
                            <button class="btn btn-danger btn-sm mr-5" type="submit">YES</button>
                            <button class="btn btn-success btn-sm ml-5" data-dismiss="modal" type="button">NO</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


    <script>
        function shareLink(link, title) {
            document.getElementById('facebookLink').innerHTML = '<a href="https://www.facebook.com/share.php?u={{ $baseUrl }}/' + link + '" target="_blank" class="facebook"><span class="fa fa-facebook"></span></a>';
            document.getElementById('whatsappLink').innerHTML = '<a href="https://web.whatsapp.com/send?text={{ $baseUrl }}/' + link + '" target="_blank" class="whatsapp"><span class="fa fa-whatsapp"></span></a>';
            document.getElementById('twitterLink').innerHTML = '<a href="https://twitter.com/intent/tweet?text=' + title +'title&url={{ $baseUrl }}/' + link + '" target="_blank" class="twitter"><span class="fa fa-twitter"></span></a>';
            document.getElementById('linkedinLink').innerHTML = '<a href="https://www.linkedin.com/shareArticle?title=' + title + '&url={{ $baseUrl }}/' + link + '" target="_blank" class="linkedin"><span class="fa fa-linkedin"></span></a>';
        }

        function deleteLink(linkID) {
            $('#deleteLinkModal').modal();
            document.getElementById('deleteID').value = linkID;
        }

        function copyLink(link) {
            navigator.clipboard.writeText("{{ $baseUrl }}/" + link);
            alert("Link successfully copied");
        }
    </script>

</x-app-layout>
