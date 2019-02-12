@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix div-show">
                <span class="panel-title">Recibo de Caja</span>
                    <a href="{{ route('cash_receipts.index') }}" class="btn btn-outline-warning btn-cash">Volver</a>
                    <a href="{{ route('cash_receipts.edit', $cash_receipt->id) }}" class="btn btn-outline-primary">Editar</a>
                    <form class="form-inline" method="post" action="{{route('cash_receipts.destroy', $cash_receipt->id) }}" 
                        onsubmit="return confirm('Are you sure?')">
                        
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
                        <p><img src="/svg/Vinix Code-01.png" alt="" width="52%" class="img-uno"></p>
                    </div>

                    <div class="form-group">
                        <label class="label-uno">www.vinixcode.com</label><br>
                        <label class="label-tres">Calle 87 Sur # 55-695, Apto. 1603</label><br>
                        <label class="label-cuatro">N° 055460</label><br>
                        <label class="label-cinco">La Estrella, Antioquia</label><br>
                        <label class="label-seis">NIT: 901116567</label>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="label-show">N° Recibo de Caja</label>
                            <p>{{$cash_receipt->box_number}}</p>
                        </div>

                        <div class="col-sm-4">
                            <label class="label-show">Recibimos</label>
                            <p>{{ $cash_receipt->we_received }}</p>
                        </div>

                        <div class="col-sm-4">
                            <label class="label-show">Ciudad</label>
                            <p>{{ $cash_receipt->city }}</p>
                        </div>

                        <div class="col-sm-4">
                            <label class="label-show">Fecha</label>
                            <p>{{ $cash_receipt->date }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show">Tipo de Documento</label>
                            <p>{{ $cash_receipt->document_type }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show">Numero de Documento</label>
                            <p>{{ $cash_receipt->document_number }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show">Valor</label>
                            <p>{{ number_format($cash_receipt->value) }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show">Valor en Letras</label>
                            <p>{{ $cash_receipt->value_in_letters }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show">Direccion</label>
                            <p>{{ $cash_receipt->address }}</p>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <label style="font-weight: bold;">Descripcion:</label>
                                <p>{{ $cash_receipt->description }}</p>
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
            <hr>
        </div>
    </div>
@endsection

            