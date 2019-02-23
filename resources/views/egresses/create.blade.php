@extends('layouts.master')

@section('content')
@include('fragment.info')

<div class="container my-4 d-c-e">
    <div class="px-4 clearfix">
        <div class="float-left">
            <h3 class="t-c-e">Crear egreso</h3>
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