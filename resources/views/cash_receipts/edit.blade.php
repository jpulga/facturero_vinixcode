@extends('layouts.master')

@section('content')
<div id="cash_receipt">
    <div class="panel panel-default" v-clock>
        <div class="panel-heading">
            <div class="clearfix div-edit-cash">
                <span class="panel-title">Editar Recibo de Caja</span>
            </div>
        </div>

        <div class="panel-body">
            @include('cash_receipts.form_edit')
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="/js/app.js"></script>
@endpush
 