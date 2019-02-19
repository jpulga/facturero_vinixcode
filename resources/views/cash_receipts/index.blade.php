@extends('layouts.master')

@section('content')

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">Recibos de caja</a>
    {!! Form::open(['route' => 'cash_receipts.index', 'method' => 'GET', 'class' => 'form-inline', 'role' => 'search']) !!}
        {!! Form::text('Recibimos', null, ['class' => 'form-control mr-sm-2 buscar-cash', 'placeholder' => 'Buscar']) !!}
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        <a href="{{ route('cash_receipts.create') }}" class="btn btn-outline-primary my-2 my-sm-0">Crear</a>
    {!! Form::close() !!}
</nav>
<br>
@include('fragment.info')
<div class="container container-principal">
    @if($cash_receipts->count())
    <table class="table table-hover">
        <thead>
            <tr>
                <th>N. Caja</th>              
                <th>Recibimos</th>
                <th>Tipo de Documento</th>
                <th>Numero de Documento</th>
                <th>Fecha</th>
                <th>Valor</th>
                <th>Descripcion</th>
                <th>Fecha de Creacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cash_receipts as $cash_receipt)
            <tr>
                <td>{{$cash_receipt->box_number}}</td>
                <td>{{$cash_receipt->we_received}}</td>
                <td>{{$cash_receipt->document_type}}</td>
                <td>{{$cash_receipt->document_number}}</td>
                <td>{{$cash_receipt->date}}</td>
                <td>$ {{ number_format ($cash_receipt->value) }}</td>
                <td>{{$cash_receipt->description}}</td>
                <td>{{$cash_receipt->created_at->diffForHumans()}}</td>
                <td>
                    <a title="Ver Recibo" href="{{ route('cash_receipts.show', $cash_receipt->id) }}" class="btn btn-outline-dark btn-sm"><i class="far fa-file-pdf"></i></a>
                    <a title="Editar Recibo" href="{{ route('cash_receipts.edit', $cash_receipt->id) }}" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i></a>
                    <a title="Clonar Recibo" href="{{ route('cash_receipts.duplicate', $cash_receipt->id) }}" class="btn btn-outline-success btn-sm"><i class="far fa-clone"></i></a>
                    <form class="form-inline" method="post" action="{{route('cash_receipts.destroy', $cash_receipt)}}"
                                onsubmit="return confirm('¿Estas seguro de borrar el recibo #{{$cash_receipt->box_number}}?')">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button title="Borrar Recibo" type="submit" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $cash_receipts->render() !!}
    @else
    <div class="cash_receipt-empty">
        <p class="cash_receipt-empty-title text-center">
            No existen recibos de caja. <a href="{{route('cash_receipts.create')}}">Crea uno</a>.
        </p>
    </div>
    @endif
</div>
@endsection