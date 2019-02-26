@if(Session::has('success'))
<div class="container-fluid">
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        {{ Session::get('success') }}
    </div>
</div>
@endif

@if(!empty($errors->first()))
<div class="container-fluid">
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </div>
</div>
@endif