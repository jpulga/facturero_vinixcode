@extends('layouts.master')

@section('content')
@include('fragment.info')

<div class="container my-4 d-c-e">
    <div class="px-4 clearfix">
        <div class="float-left">
            <h3 class="t-c-e">Editar egreso</h3>
        </div>          
    </div>
</div>

<div class="container">       
    @include('egresses.form_edit')
</div>
@endsection

@push('scripts')
    <script src="/js/app.js"></script>
@endpush