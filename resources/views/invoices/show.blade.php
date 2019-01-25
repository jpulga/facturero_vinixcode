@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix div-show">
                <span class="panel-title">Invoice</span>
                    <a href="{{route('invoices.index')}}" class="btn btn-warning btn-show">Back</a>
                    <a href="{{route('invoices.edit', $invoice)}}" class="btn btn-primary ">Edit</a>
                    <form class="form-inline" method="post" action="{{route('invoices.destroy', $invoice)}}"
                          onsubmit="return confirm('Are you sure?')">

                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <p><img src="/svg/Vinix Code-02.png" alt="" width="52%" class="img-uno"></p>
                    </div>
                    <div class="form-group">
                        <label class="label-uno">www.vinixcode.com</label><br>
                        <label class="label-dos">Factura de Venta</label><br>
                        <label class="label-tres">Calle 87 Sur # 55-695, Apto. 1603</label><br>
                        <label class="label-cuatro">N° 055460</label><br>
                        <label class="label-cinco">La Estrella, Antioquia</label><br>
                        <label class="label-seis">NIT:901116567</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <label style="font-weight: bold;">N° Invoice:</label>
                            <p>{{$invoice->invoice_number}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label style="font-weight: bold;">Client:</label>
                            <p>{{$invoice->client}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label style="font-weight: bold;">Address:</label>
                            <p>{{$invoice->address}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label style="font-weight: bold;">Cellphone:</label>
                            <p>{{$invoice->cellphone}}</p>
                        </div>
                    
                    </div>

                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <label style="font-weight: bold;">Notes:</label>
                                <p>{{$invoice->notes}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <label style="font-weight: bold;">Invoice Date:</label>
                            <p>{{$invoice->date}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label style="font-weight: bold;">Expiration Date:</label>
                            <p>{{$invoice->expiration_date}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label style="font-weight: bold;">Document Type:</label>
                            <p>{{$invoice->document_type}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label style="font-weight: bold;">Document Number:</label>
                            <p>{{$invoice->document_number}}</p>
                        </div> 
                    </div>
                </div>
            </div>
            <hr>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice->products as $product)
                        <tr>
                            <td class="table-name">{{$product->name}}</td>
                            <td class="table-price">$ {{$product->price}}</td>
                            <td class="table-qty">{{$product->qty}}</td>
                            <td class="table-total text-right">$ {{$product->qty * $product->price}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Sub Total</td>
                        <td class="table-amount">$ {{$invoice->sub_total}}</td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Discount</td>
                        <td class="table-amount">$ {{$invoice->discount}}</td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Grand Total</td>
                        <td class="table-amount">$ {{$invoice->grand_total}}</td>
                    </tr>
                </tfoot>
            </table>
            <br><br>
            <p class="firma">Firma</p>
            <p class="firma2">
               Esta factura de venta es titulo valor conforme a la ley 1231 del 17 julio 2008. 
               En caso de mora se cobrara la tasa maxima autorizada por la superintendencia finaciera. 
               Autorizo a VINIX CODE S.A.S. para que consulte, reporte o excluya en cualquier central de riesgo. 
               La firma de toda persona distinta al comprador, lleva implicita la autorizacion de este para firmar, 
               confesar la deuda y obligar al comprador.
            </p>
        </div>
    </div>
@endsection