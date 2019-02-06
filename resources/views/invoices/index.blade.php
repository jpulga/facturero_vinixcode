@extends('layouts.master')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light nav-invoice" >
    <a class="navbar-brand" href="#">Facturas</a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

        <form class="form-inline my-2 my-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <a href="{{ route('invoices.create') }}" class="btn btn-outline-primary my-2 my-sm-0 uno">Crear</a>
        </form>

    </div>
</nav>
<br>
@include('invoices.fragment.info')
<div class="container container-principal">
    @if($invoices->count())
    <table class="table table-hover">
        <thead>
            <tr>
                <th>N° Factura</th>              
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Fecha de Vencimiento</th>
                <th>Estado</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{$invoice->invoice_number}}</td>
                <td>{{$invoice->client}}</td>
                <td>{{$invoice->date}}</td>
                <td>{{$invoice->expiration_date}}</td>
                <td>{!! $invoice->state == 'Paga' ? '<span class="green">Paga</span>' : '<span class="red">Debe</span>' !!}</td>
                <td>$ {{ number_format($invoice->grand_total)}}</td>
                <td class="text-right">
                    <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-default btn-sm">Ver</a>
                    <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form class="form-inline" method="post" action="{{route('invoices.destroy', $invoice)}}"
                                onsubmit="return confirm('Estas seguro que deseas borrar esta Factura?')">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" value="Borrar" class="btn btn-danger btn-sm">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $invoices->render() !!}
    @else
    <div class="invoice-empty">
        <p class="invoice-empty-title">
            No Invoices were created.
            <a href="{{route('invoices.create')}}">Create Now!</a>
        </p>
    </div>
    @endif
</div>
@endsection