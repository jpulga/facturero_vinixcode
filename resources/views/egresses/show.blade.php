@extends('layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" media="print" href="/css/print.css">
@endsection

@section('content')

<div class="container my-4">
    <div class="row my-2">
        <div class="col col-md-4 text-center">
            <img height="60" src="/svg/logo.png" />
            <p class="mt-4 egresses-legend">
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
                    <h1 class="mb-4">Comprobante de Egreso</h1>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col col-md-4">
                    <strong># Egreso</strong><br />
                    {{$egress->exit_number}}
                </div>

                <div class="col col-md-4">
                    <strong>Girado A</strong><br />
                    {{ $egress->turned }}
                </div>

                <div class="col col-md-4">
                    <strong>Fecha</strong><br />
                    {{ $egress->date }}
                </div>
            </div>

            <div class="row my-3">
                <div class="col col-md-4">
                    <strong>Tipo de Documento</strong><br />
                    {{ $egress->document_type }}
                </div>

                <div class="col col-md-4">
                    <strong>N&uacute;mero de Documento</strong><br />
                    {{ $egress->document_number }}
                </div>

                <div class="col col-md-4">
                    <strong>Valor</strong><br />
                    $ {{ number_format($egress->value) }}
                </div>
            </div>

            <div class="row my-3">
                <div class="col">
                    <strong>La suma de</strong><br />
                    {{ $egress->value_in_letters }}
                </div>
            </div>

            <div class="row my-3">
                <div class="col">
                    <strong>Descripci&oacute;n</strong><br />
                    {!! nl2br($egress->description) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row firmas-show-egress">
        <div class="col-md-3"><strong>Elaboro</strong></div>
        <div class="col-md-3"><strong>Aprobo</strong></div>
        <div class="col-md-3"><strong>Reviso</strong></div>
        <div class="col-md-3"><strong>Firma y Sello</strong></div>
    </div>
</div>

<div class="container">
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

            