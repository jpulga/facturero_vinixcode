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
                    <h1 class="mb-4 uno">Factura de Venta</h1>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col col-md-4">
                    <strong># Factura</strong><br />
                    {{ $invoice->invoice_number }}
                </div>

                <div class="col col-md-4">
                    <strong>Cliente</strong><br />
                    {{ $invoice->client }}
                </div>

                <div class="col col-md-4">
                    <strong>Fecha de Factura</strong><br />
                    {{ $invoice->date }}
                </div>
            </div>

            <div class="row my-3">
                <div class="col col-md-4">
                    <strong>Vencimiento de Factura</strong><br />
                    {{ $invoice->expiration_date }}
                </div>

                <div class="col col-md-4">
                    <strong>Telefono</strong><br />
                    {{ $invoice->cellphone }}
                </div>

                <div class="col col-md-4">
                    <strong>Tipo de Documento</strong><br />
                    {{ $invoice->document_type }}
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-4">
                    <strong>N&oacute;mero de Documento</strong><br />
                    {{ $invoice->document_number }}
                </div>

                <div class="col-md-4">
                    <strong>Direcci&oacute;n</strong><br />
                    {{ $invoice->address }}
                </div>
            </div>

            <div class="row my-3">
                <div class="col">
                    <strong>Descripci&oacute;n</strong><br />
                    {!! nl2br($invoice->notes) !!}s
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th class="cortar">Precio</th>
                        <th class="cortar">Cantidad</th>
                        <th class="cortar">Total</th>
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
                        <td class="table-amount text-right">$ {{ number_format ($invoice->sub_total)}}</td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Descuento</td>
                        <td class="table-amount text-right">$ {{$invoice->discount}}</td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Total a Pagar</td>
                        <td class="table-amount text-right">$ {{ number_format ($invoice->grand_total)}}</td>
                    </tr>
                </tfoot>
            </table>

        <div>
            <p class="footer-firma">Firma</p>
        </div>

        <div>
            <p class="footer-texto">Esta factura de venta es titulo valor conforme a la ley 1231 del 17 julio 2008. 
               En caso de mora se cobrara la tasa maxima autorizada por la superintendencia finaciera. 
               Autorizo a VINIX CODE S.A.S. para que consulte, reporte o excluya en cualquier central de riesgo. 
               La firma de toda persona distinta al comprador, lleva implicita la autorizacion de este para firmar, 
               confesar la deuda y obligar al comprador.</p>
        </div>
    </div>

    <div class="footer">
        <a href="{{ route('invoices.index') }}" class="btn btn-warning button-create-invoice">Volver</a>
        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-success button-create-invoice">Editar</a>

        <form class="form d-md-inline-block" method="post" action="{{route('invoices.destroy', $invoice)}}"
                    onsubmit="return confirm('¿Estas seguro de borrar la factura #{{$invoice->invoice_number}}?')">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button title="Borrar Factura" type="submit" class="btn btn-danger button-create-invoice">Borrar</button>
        </form>
    </div>  
</div>
    
@endsection