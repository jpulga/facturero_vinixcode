@extends('layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" media="print" href="/css/egress.css">
@endsection

@section('content')

<div class="container my-4">
    <div class="table-responsive">
        <table class="table table-borderless">
        <thead>
            <tr></tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="/svg/logo.png" class="i-s-e"/></td>
                <td class="t-s-e">N° Egreso</td>
                <td></td>
                <td class="t-s-e">Girado A</td>
                <td></td>
                <td class="t-s-e">Fecha</td>
            </tr>
            <tr>
                <td><h6 class="t-s-e-1">www.vinixcode.com</h6></td>
                <td>{{$egress->exit_number}}</td>
                <td></td>
                <td>{{ $egress->turned }}</td>
                <td></td>
                <td>{{ $egress->date }}</td>
              
            </tr>
            <tr>
                <td><h6 class="t-s-e-2">Egreso</h6></td>
                <td class="t-s-e">Tipo de Documento</td>
                <td></td>
                <td class="t-s-e">N&uacute;mero de Documento</td>
                <td></td>
                <td class="t-s-e">Valor</td>
            </tr>
            <tr>
                <td><h6 class="t-s-e-3">Calle 87 Sur # 55-695, Apto. 1603</h6></td>
                <td>{{ $egress->document_type }}</td>
                <td></td>
                <td>{{ $egress->document_number }}</td>
                <td></td>
                <td>$ {{ number_format($egress->value) }}</td>
            </tr>
            <tr>
                <td><h6 class="t-s-e-4">La Estrella, Antioquia</h6></td>
                <td colspan="4" class="t-s-e">La suma de</td>
            </tr>
            <tr>
                <td><h6 class="t-s-e-5">NIT: 901116567</h6></td>
                <td colspan="4">{{ $egress->value_in_letters }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4" class="t-s-e">Descripci&oacute;n</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">{!! nl2br($egress->description) !!}</td>
            </tr> 
        </tbody>
        </table>

        <table class="table table-borderless f-s-e">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Elaboro</th>
                <th>Reviso</th>
                <th>Aprobo</th>
                <th>Firma y Sello</th>
                <th></th>
            </tr>
        </thead>
        </table>
    </div>

    <div class="footer">
        <a href="{{ route('egresses.index') }}" class="btn btn-warning b-c-e">Volver</a>
        <a href="{{ route('egresses.edit', $egress->id) }}" class="btn btn-success b-c-e">Editar</a>

        <form class="form d-md-inline-block" method="post" action="{{route('egresses.destroy', $egress)}}"
                    onsubmit="return confirm('¿Estas seguro de borrar el egreso #{{$egress->exit_number}}?')">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button title="Borrar Egreso" type="submit" class="btn btn-danger b-c-e">Borrar</button>
        </form>
    </div>  
</div>


@endsection

            