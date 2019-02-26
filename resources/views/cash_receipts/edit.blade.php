@extends('layouts.master')

@section('content')
@include('fragment.info')

<div class="container my-4 div-create-cash">
    <div class="px-4 clearfix">
        <div class="float-left">
            <h3 class="title-create-cash">Editar Recibo de Caja</h3>
        </div>          
    </div>
</div>

<div class="container">       
    @include('cash_receipts.form_edit')
</div>
@endsection

@push('scripts')
    <script src="/js/app.js"></script>
@endpush