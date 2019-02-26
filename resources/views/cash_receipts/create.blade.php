@extends('layouts.master')

@section('content')
@include('fragment.info')

<div class="container my-4 div-create-cash">
    <div class="px-4 clearfix">
        <div class="float-left">
            <h3 class="title-create-cash">Crear Recibo de Caja</h3>
        </div>
        
        <div class="float-right action-buttons mt-2 mt-sm-0 ml-sm-1">
            <a href="{{ route('cash_receipts.index') }}" class="btn btn-warning d-none d-sm-block">Volver</a>
        </div>            
    </div>
</div>

<div class="container">       
    @include('cash_receipts.form')
</div>
@endsection