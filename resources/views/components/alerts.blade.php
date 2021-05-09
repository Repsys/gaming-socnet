@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p class="m-0 px-3">{{ $message }}</p>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p class="m-0 px-3">{{ $message }}</p>
    </div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="m-0 px-3">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
