@extends('layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" media="print" href="/css/print.css">
@endsection
 
@section('content')

<div class="container my-4 div-print-cash">
    <div class="row my-2">
        <div class="col col-md-4 text-center">
            <img height="60" src="/svg/logo.png" />
            <p class="mt-4 cash-legend">
                Vinix Code SAS<br />
                www.vinixcode.com<br />
                NIT: 901116567-1<br />
                Calle 87 Sur # 55-695, Apto. 1603<br />
                La Estrella, Antioquia<br />
                Tel: 3282967<br />
            </p>
        </div>

        <div class="col col-md-8">
            <div class="row mb-2">
                <div class="text-center">
                    <h1 class="mb-4">Comprobante de Recibo de Caja</h1>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col col-md-4">
                    <strong># Caja</strong><br />
                    {{ $cash_receipt->box_number }}
                </div>

                <div class="col col-md-4">
                    <strong>Recibimos De</strong><br />
                    {{ $cash_receipt->we_received }}
                </div>

                <div class="col col-md-4">
                    <strong>Fecha</strong><br />
                    {{ $cash_receipt->date }}
                </div>
            </div>

            <div class="row my-3">
                <div class="col col-md-4">
                    <strong>Tipo de Documento</strong><br />
                    {{ $cash_receipt->document_type }}
                </div>

                <div class="col col-md-4">
                    <strong>N&uacute;mero de Documento</strong><br />
                    {{ $cash_receipt->document_number }}
                </div>

                <div class="col col-md-4">
                    <strong>Direccion</strong><br />
                    {{ $cash_receipt->address }}
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-4">
                    <strong>Valor</strong><br />
                    ${{ number_format( $cash_receipt->value) }}
                </div>

                <div class="col-md-4">
                    <strong>La suma de</strong><br />
                    {{ $cash_receipt->value_in_letters }}
                </div>
            </div>

            <div class="row my-3">
                <div class="col">
                    <strong>Descripci&oacute;n</strong><br />
                    {!! nl2br($cash_receipt->description) !!}s
                </div>
            </div>

            <div class="row firmas-show-cash">
                <div class="col-md-6"><strong>Elaboro</strong></div>
                <div class="col-md-6"><strong>Firmo y Sello</strong></div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="footer">
        <a href="{{ route('cash_receipts.index') }}" class="btn btn-warning b-c-e">Volver</a>
        <a href="{{ route('cash_receipts.edit', $cash_receipt->id) }}" class="btn btn-success b-c-e">Editar</a>

        <form class="form d-md-inline-block" method="post" action="{{route('cash_receipts.destroy', $cash_receipt)}}"
                    onsubmit="return confirm('¿Estas seguro de borrar el recibo #{{$cash_receipt->box_number}}?')">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button title="Borrar Recibo" type="submit" class="btn btn-danger b-c-e">Borrar</button>
        </form>
    </div>  
</div>


@endsection

            