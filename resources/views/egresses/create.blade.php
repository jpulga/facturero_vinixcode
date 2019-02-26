@extends('layouts.master')

@section('content')
@include('fragment.info')

<div class="container my-4 div-create-egress">
    <div class="px-4 clearfix">
        <div class="float-left">
            <h3 class="title-create-egress">Crear Egreso</h3>
        </div>
        
        <div class="float-right action-buttons mt-2 mt-sm-0 ml-sm-1">
            <a href="{{ route('egresses.index') }}" class="btn btn-warning d-none d-sm-block">Volver</a>
        </div>            
    </div>
</div>

<div class="container">       
    @include('egresses.form')
</div>
@endsection