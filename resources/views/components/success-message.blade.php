@if (Session::get('success'))
<div class="row d-flex justify-content-center">
    <div class="col-lg-6">
        <div class="mt-4 alert alert-success">
            <b>{{ Session::get('success') }}</b>
        </div>
    </div>
</div>
@endif
