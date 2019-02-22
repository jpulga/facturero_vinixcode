@extends('layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" media="print"href="/css/cash.css">
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix div-show-cash">
                <span class="panel-title">Recibo de Caja</span>
                    <a href="{{ route('cash_receipts.index') }}" class="btn btn-outline-warning btn-show-cash">Volver</a>
                    <a href="{{ route('cash_receipts.edit', $cash_receipt->id) }}" class="btn btn-outline-primary">Editar</a>
                    <form class="form-inline" method="post" action="{{route('cash_receipts.destroy', $cash_receipt->id) }}" 
                        onsubmit="return confirm('¿Estas seguro de borrar el recibo #{{$cash_receipt->box_number}}?')">
                        
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" value="Borrar" class="btn btn-outline-danger">
                    </form> 
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <p><img src="/svg/Vinix Code-01.png" alt="" width="42%" class="img-uno-cash"></p>
                    </div>

                    <div class="form-group">
                        <label class="label-uno-cash">www.vinixcode.com</label><br>
                        <label class="label-dos-cash">Recibo de Caja</label><br>
                        <label class="label-tres-cash">Calle 87 Sur # 55-695, Apto. 1603</label><br>
                        <label class="label-cinco-cash">La Estrella, Antioquia</label><br>
                        <label class="label-seis-cash">NIT: 901116567</label>
                    </div>
                </div>

                <div class="col-sm-8 show-cash1">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="label-show-cash">N° Recibo de Caja</label>
                            <p>{{$cash_receipt->box_number}}</p>
                        </div>

                        <div class="col-sm-4">
                            <label class="label-show-cash">Recibimos De</label>
                            <p>{{ $cash_receipt->we_received }}</p>
                        </div>

                        <div class="col-sm-4">
                            <label class="label-show-cash">Ciudad</label>
                            <p>{{ $cash_receipt->city }}</p>
                        </div>

                        <div class="col-sm-4">
                            <label class="label-show-cash">Fecha</label>
                            <p>{{ $cash_receipt->date }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show-cash">Tipo de Documento</label>
                            <p>{{ $cash_receipt->document_type }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show-cash">N&uacute;mero de Documento</label>
                            <p>{{ $cash_receipt->document_number }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show-cash">Valor</label>
                            <p>$ {{ number_format($cash_receipt->value) }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show-cash">Valor en Letras</label>
                            <p>{{ $cash_receipt->value_in_letters }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show-cash">Direcci&oacute;n</label>
                            <p>{{ $cash_receipt->address }}</p>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <label style="font-weight: bold;">Descripci&oacute;n</label>
                                <p>{!! nl2br($cash_receipt->description) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
 
            <div class="row show-cash">
                <div class="col-sm-6">
                    <label class="label-show">Elaboro</label>
                </div>

                <div class="col-sm-6">
                    <label class="label-show">Firma y Sello</label>
                </div>
            </div>
        </div>
    </div>
@endsection

            