@extends('layouts.master')

@section('content')
    <div class="panel panel-default panel-default-egress">
        <div class="panel-heading">
            <div class="clearfix div-show-egress">
                <span class="panel-title">Egresos</span>
                    <a href="{{ route('egresses.index') }}" class="btn btn-outline-warning btn-show-egress">Volver</a>
                    <a href="{{ route('egresses.edit', $egress->id) }}" class="btn btn-outline-primary">Editar</a>
                    <form class="form-inline" method="post" action="{{route('egresses.destroy', $egress->id) }}" 
                        onsubmit="return confirm('¿Estas seguro de borrar el egreso #{{$egress->exit_number}}?')">
                        
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
                        <p><img src="/svg/Vinix Code-01.png" alt="" width="42%" class="img-uno-egress"></p>
                    </div>

                    <div class="form-group">
                        <label class="label-uno-egress">www.vinixcode.com</label><br>
                        <label class="label-dos-invoices">Egreso</label><br>
                        <label class="label-tres-egress">Calle 87 Sur # 55-695, Apto. 1603</label><br>
                        <label class="label-cinco-egress">La Estrella, Antioquia</label><br>
                        <label class="label-seis-egress">NIT: 901116567</label>
                    </div>
                </div>

                <div class="col-sm-8 show-egress1">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="label-show-egress">N° Egreso</label>
                            <p>{{$egress->exit_number}}</p>
                        </div>

                        <div class="col-sm-4">
                            <label class="label-show-egress">Girado A</label>
                            <p>{{ $egress->turned }}</p>
                        </div>

                        <div class="col-sm-4">
                            <label class="label-show-egress">Fecha</label>
                            <p>{{ $egress->date }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show-egress">Tipo de Documento</label>
                            <p>{{ $egress->document_type }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show-egress">N&uacute;mero de Documento</label>
                            <p>{{ $egress->document_number }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show-egress">Valor</label>
                            <p>$ {{ number_format($egress->value) }}</p>
                        </div> 

                        <div class="col-sm-4">
                            <label class="label-show-egress">La suma de</label>
                            <p>{{ $egress->value_in_letters }}</p>
                        </div> 
                    </div>

                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <label style="font-weight: bold;">Descripci&oacute;n</label>
                                <p>{{ $egress->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
 
            <div class="row show-egress">
                <div class="col-sm-3">
                    <label class="label-show">Elaboro</label>
                </div>

                <div class="col-sm-3">
                    <label class="label-show">Reviso</label>
                </div>

                <div class="col-sm-3">
                    <label class="label-show">Aprobo</label>
                </div>

                <div class="col-sm-3">
                    <label class="label-show">Firma y Sello</label>
                </div>
            </div>
        </div>
    </div>
@endsection

            