@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix div-show-invoices">
                <span class="panel-title">Factura</span>
                    <a href="{{ route('invoices.index') }}" class="btn btn-outline-warning btn-show-invoices">Volver</a>
                    <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-outline-primary ">Editar</a>
                    <form class="form-inline" method="post" action="{{route('invoices.destroy', $invoice)}}"
                          onsubmit="return confirm('¿Esta seguro de borrar la factura #{{$invoice->invoice_number}}?')">

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
                        <p><img src="/svg/Vinix Code-01.png" alt="" width="42%" class="img-uno-invoices"></p>
                    </div>
                    <div class="form-group">
                        <label class="label-uno-invoices">www.vinixcode.com</label><br>
                        <label class="label-dos-invoices">Factura de Venta</label><br>
                        <label class="label-tres-invoices">Calle 87 Sur # 55-695, Apto. 1603</label><br>
                        <label class="label-cinco-invoices">La Estrella, Antioquia</label><br>
                        <label class="label-seis-invoices">NIT: 901116567</label>
                    </div>
                </div>

                <div class="col-sm-4 show-invoices">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="label-show-invoices">N° de Factura</label>
                            <p>{{$invoice->invoice_number}}</p>
                        </div>

                        <div class="col-sm-6">
                            <label class="label-show-invoices">Cliente</label>
                            <p>{{$invoice->client}}</p>
                        </div>

                        <div class="col-sm-6">
                            <label class="label-show-invoices">Dirección</label>
                            <p>{{$invoice->address}}</p>
                        </div>

                        <div class="col-sm-6">
                            <label class="label-show-invoices">Teléfono</label>
                            <p>{{$invoice->cellphone}}</p>
                        </div> 
                    </div>

                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <label style="font-weight: bold;">Notas</label>
                                <p>{!! nl2br($invoice->notes) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 show-invoices">
                    <div class="row">
                        <div class="col-sm-6">
                            <label style="font-weight: bold;">Fecha de Factura</label>
                            <p>{{$invoice->date}}</p>
                        </div>

                        <div class="col-sm-6">
                            <label style="font-weight: bold;">Vencimiento de Factura</label>
                            <p>{{$invoice->expiration_date}}</p>
                        </div>

                        <div class="col-sm-6">
                            <label style="font-weight: bold;">Tipo de Documento</label>
                            <p>{{$invoice->document_type}}</p>
                        </div>
                        
                        <div class="col-sm-6">
                            <label style="font-weight: bold;">Número de Documento</label>
                            <p>{{$invoice->document_number}}</p>
                        </div> 
                    </div>
                </div>
            </div>
            <hr>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice->products as $product)
                        <tr>
                            <td class="table-name">{{$product->name}}</td>
                            <td class="table-price">$ {{ number_format ($product->price)}}</td>
                            <td class="table-qty">{{$product->qty}}</td>
                            <td class="table-total text-right">$ {{ number_format ($product->qty * $product->price)}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Subtotal</td>
                        <td class="table-amount">$ {{ number_format ($invoice->sub_total)}}</td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Descuento</td>
                        <td class="table-amount">$ {{$invoice->discount}}</td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Total a Pagar</td>
                        <td class="table-amount">$ {{ number_format ($invoice->grand_total)}}</td>
                    </tr>
                </tfoot>
            </table>
            <br><br>
            <p class="firma-invoices">Firma</p>
            <p class="firma2-invoices">
               Esta factura de venta es titulo valor conforme a la ley 1231 del 17 julio 2008. 
               En caso de mora se cobrara la tasa maxima autorizada por la superintendencia finaciera. 
               Autorizo a VINIX CODE S.A.S. para que consulte, reporte o excluya en cualquier central de riesgo. 
               La firma de toda persona distinta al comprador, lleva implicita la autorizacion de este para firmar, 
               confesar la deuda y obligar al comprador.
            </p>
        </div>
    </div>
@endsection