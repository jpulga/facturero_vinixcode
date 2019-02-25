@extends('layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" media="print" href="/css/invoices.css">
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
                <td><img src="/svg/logo.png" class="i-s-i"/></td>
                <td class="t-s-i">N° Factura</td>
                <td></td>
                <td class="t-s-i">Cliente</td>
                <td></td>
                <td class="t-s-i">Fecha de factura</td>
            </tr>
            <tr>
                <td><h6 class="t-s-i-1">www.vinixcode.com</h6></td>
                <td>{{ $invoice->invoice_number }}</td>
                <td></td>
                <td>{{ $invoice->client }}</td>
                <td></td>
                <td>{{ $invoice->date }}</td>
              
            </tr>
            <tr>
                <td><h6 class="t-s-i-2">Factura de venta</h6></td>
                <td class="t-s-i">Vencimiento de factura</td>
                <td></td>
                <td class="t-s-i">Telefono</td>
                <td></td>
                <td class="t-s-i">Tipo de documento</td>
            </tr>
            <tr>
                <td><h6 class="t-s-i-3">Calle 87 Sur # 55-695, Apto. 1603</h6></td>
                <td>{{ $invoice->expiration_date }}</td>
                <td></td>
                <td>{{ $invoice->cellphone }}</td>
                <td></td>
                <td>{{ $invoice->document_type }}</td>
            </tr>
            <tr>
                <td><h6 class="t-s-i-4">La Estrella, Antioquia</h6></td>
                <td colspan="2" class="t-s-i">N&uacute;mero de Documento</td>
                <td colspan="3" class="t-s-i">Dirección</td>
            </tr>
            <tr>
                <td><h6 class="t-s-i-5">NIT: 901116567</h6></td>
                <td colspan="2">{{ $invoice->document_number }}</td>
                <td colspan="3">{{ $invoice->address }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4" class="t-s-i">Notas</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">{!! nl2br($invoice->notes) !!}</td>
            </tr> 
        </tbody>
        </table>

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
            <p class="f-s-i f-s-1">Firma</p>
        </div>

        <div>
            <p class="f-s-i">Esta factura de venta es titulo valor conforme a la ley 1231 del 17 julio 2008. 
               En caso de mora se cobrara la tasa maxima autorizada por la superintendencia finaciera. 
               Autorizo a VINIX CODE S.A.S. para que consulte, reporte o excluya en cualquier central de riesgo. 
               La firma de toda persona distinta al comprador, lleva implicita la autorizacion de este para firmar, 
               confesar la deuda y obligar al comprador.</p>
        </div>
    </div>

    <div class="footer">
        <a href="{{ route('invoices.index') }}" class="btn btn-warning b-c-i">Volver</a>
        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-success b-c-i">Editar</a>

        <form class="form d-md-inline-block" method="post" action="{{route('invoices.destroy', $invoice)}}"
                    onsubmit="return confirm('¿Estas seguro de borrar el egreso #{{$invoice->invoice_number}}?')">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button title="Borrar Factura" type="submit" class="btn btn-danger b-c-i">Borrar</button>
        </form>
    </div>  
</div>
    
@endsection