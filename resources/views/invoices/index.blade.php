@extends('layouts.master')

@section('content')

@include('fragment.info')
<div class="container-fluid my-3">
    @if($invoices->count())
    <div class="px-4 clearfix">
        <div class="float-left">
            <h3>Facturas</h3>
        </div>
        
        <div class="float-right">
            {!! Form::open(['route' => 'invoices.index', 'method' => 'GET', 'class' => 'form-inline my-2 my-md-0', 'role' => 'search']) !!}
                <div class="input-group">
                    {!! Form::text('cliente', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                
                <div class="action-buttons mt-2 mt-sm-0 ml-sm-1">
                    <a href="{{ route('invoices.create') }}" class="btn btn-primary d-none d-sm-block">Crear</a>
                    <a href="{{ route('invoices.create') }}" class="btn btn-primary btn-lg btn-block d-block d-sm-none">Crear</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="table-responsive px-4">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>N° Factura</th>              
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Estado</th>
                    <th>Total</th>
                    <th>Fecha de Creacion</th>
                    <th>Acciones</th>
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
                <td>
                    <a title="Ver Factura" href="{{ route('invoices.show', $invoice) }}" class="btn btn-outline-dark btn-sm"><i class="far fa-file-pdf"></i></a>
                    <a title="Editar Factura" href="{{ route('invoices.edit', $invoice) }}" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i></a>
                    <a title="Clonar Factura" href="{{ route('invoices.duplicate', $invoice) }}" class="btn btn-outline-success btn-sm"><i class="far fa-clone"></i></a>
                    <form class="form-inline d-inline-block" method="post" action="{{route('invoices.destroy', $invoice)}}"
                                onsubmit="return confirm('¿Estas seguro de borrar la factura #{{$invoice->invoice_number}}?')">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button title="Borrar Factura" type="submit" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>
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
                No existen egresos. <a href="{{route('invoices.create')}}">Crea una</a>.
            </p>
        </div>
        @endif
    </div>    
</div>
@endsection
