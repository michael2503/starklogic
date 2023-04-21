@if (Session::get('failed'))
<div class="row d-flex justify-content-center">
    <div class="col-lg-6">
        <div class="mt-4 alert alert-danger">
            <b>{{ Session::get('failed') }}</b>
        </div>
    </div>
</div>
@endif
