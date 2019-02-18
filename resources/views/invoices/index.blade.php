@extends('layouts.master')

@section('content')

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">Facturas</a>
    {!! Form::open(['route' => 'invoices.index', 'method' => 'GET', 'class' => 'form-inline', 'role' => 'search']) !!}
        {!! Form::text('cliente', null, ['class' => 'form-control mr-sm-2 buscar-invoices', 'placeholder' => 'Buscar']) !!}
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        <a href="{{ route('invoices.create') }}" class="btn btn-outline-primary my-2 my-sm-0">Crear</a>
    {!! Form::close() !!}
</nav>
<br>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
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
                <th style="width:210px">Fecha de Vencimiento</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Created At</th>
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
                <td>{{$invoice->created_at->diffForHumans()}}</td>
                <td class="text-right">
                    <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-outline-dark btn-sm">Ver</a>
                    <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                    <form class="form-inline" method="post" action="{{route('invoices.destroy', $invoice)}}"
                                onsubmit="return confirm('Estas seguro que deseas borrar esta factura N° {{$invoice->invoice_number}}')">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" value="Borrar" class="btn btn-outline-danger btn-sm">
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
            No hay Facturas.
            <a href="{{route('invoices.create')}}">Crea Ahora!!</a>
        </p>
    </div>
    @endif
</div>
@endsection