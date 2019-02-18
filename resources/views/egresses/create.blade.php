@extends('layouts.master')

@section('content')
<div id="egress">
    <div class="panel panel-default" v-clock>
        <div class="panel-heading">
            <div class="clearfix div-create-egress">
                <span class="panel-title">Crear Egreso</span>
                <a href="{{ route('egresses.index') }}" class="btn btn-outline-warning buttom-create-egress">Volver</a>
            </div>
        </div>
        @include('egresses.form')    
    </div>
</div>
@endsection