@extends('layouts.master')

@section('content')
@include('fragment.info')

<div id="cash_receipt">
    <div class="panel panel-default" v-clock>
        <div class="panel-heading">
            <div class="clearfix div-create-cash">
                <span class="panel-title">Crear Recibo Caja</span>
                <a href="{{ route('cash_receipts.index') }}" class="btn btn-outline-warning buttom-create-cash">Volver</a>
            </div>
        </div>
        @include('cash_receipts.form')
    </div>
</div>
@endsection