@extends('layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" media="print" href="/css/cash.css">
@endsection

@section('content')

<div class="container my-4">
    <div class="table-responsive">
        <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="/svg/logo.png" class="i-s-c"/></td>
                <td class="t-s-c">N° Caja</td>
                <td></td>
                <td class="t-s-c">Recibimos De</td>
                <td></td>
                <td class="t-s-c">Fecha</td>
            </tr>
            <tr>
                <td><h6 class="t-s-c-1">www.vinixcode.com</h6></td>
                <td>{{ $cash_receipt->box_number }}</td>
                <td></td>
                <td>{{ $cash_receipt->we_received }}</td>
                <td></td>
                <td>{{ $cash_receipt->date }}</td>
              
            </tr>
            <tr>
                <td><h6 class="t-s-c-2">Recibo de Caja</h6></td>
                <td class="t-s-c">Tipo de Documento</td>
                <td></td>
                <td class="t-s-c">N&uacute;mero de Documento</td>
                <td></td>
                <td class="t-s-c">Ciudad</td>
            </tr>
            <tr>
                <td><h6 class="t-s-c-3">Calle 87 Sur # 55-695, Apto. 1603</h6></td>
                <td>{{ $cash_receipt->document_type }}</td>
                <td></td>
                <td>{{ $cash_receipt->document_number }}</td>
                <td></td>
                <td>{{ $cash_receipt->city }}</td>
            </tr>
            <tr>
                <td><h6 class="t-s-c-4">La Estrella, Antioquia</h6></td>
                <td colspan="2" class="t-s-c">Direccion</td>
                <td colspan="2" class="t-s-c">Valor</td>
                <td colspan="2" class="t-s-c">Valor en letras</td>
            </tr>
            <tr>
                <td><h6 class="t-s-c-5">NIT: 901116567</h6></td>
                <td colspan="2">{{ $cash_receipt->address }}</td>
                <td colspan="2">${{ number_format ($cash_receipt->value) }}</td>
                <td colspan="2">{{ $cash_receipt->value_in_letters }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4" class="t-s-c">Descripci&oacute;n</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">{!! nl2br($cash_receipt->description) !!}</td>
            </tr> 
        </tbody>
        </table>

        <table class="table table-borderless f-s-c">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Elaboro</th>
                <th></th>
                <th></th>
                <th>Firma y Sello</th>
                <th></th>
            </tr>
        </thead>
        </table>
    </div>

    <div class="footer">
        <a href="{{ route('cash_receipts.index') }}" class="btn btn-warning b-c-e">Volver</a>
        <a href="{{ route('cash_receipts.edit', $cash_receipt->id) }}" class="btn btn-success b-c-e">Editar</a>

        <form class="form d-md-inline-block" method="post" action="{{route('cash_receipts.destroy', $cash_receipt)}}"
                    onsubmit="return confirm('¿Estas seguro de borrar el egreso #{{$cash_receipt->box_number}}?')">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button title="Borrar Recibo" type="submit" class="btn btn-danger b-c-e">Borrar</button>
        </form>
    </div>  
</div>


@endsection

            