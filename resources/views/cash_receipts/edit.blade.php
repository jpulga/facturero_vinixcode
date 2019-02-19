@extends('layouts.master')

@section('content')
@include('fragment.info')

<div id="cash_receipt">
    <div class="panel panel-default" v-clock>
        <div class="panel-heading">
            <div class="clearfix div-edit-cash">
                <span class="panel-title">Editar Recibo de Caja</span>
            </div>
        </div>
            @include('cash_receipts.form_edit')
    </div>
</div>
@endsection

@push('scripts')
    <script src="/js/app.js"></script>
@endpush
 