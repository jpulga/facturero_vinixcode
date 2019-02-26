@extends('layouts.master')

@section('content')
@include('fragment.info')

<div class="container my-4 div-create-egress">
    <div class="px-4 clearfix">
        <div class="float-left">
            <h3 class="title-create-egress">Editar Egreso</h3>
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