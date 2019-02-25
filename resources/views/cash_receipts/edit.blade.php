@extends('layouts.master')

@section('content')
@include('fragment.info')

<div class="container my-4 d-c-c">
    <div class="px-4 clearfix">
        <div class="float-left">
            <h3 class="t-c-c">Editar recibo</h3>
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