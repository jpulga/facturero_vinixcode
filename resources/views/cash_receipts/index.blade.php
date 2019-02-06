@extends('layouts.master')

@section('content')

<div class="col-sm-12">
    @include('cash_receipts.fragment.aside')
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light nav-invoice">
    <a class="navbar-brand" href="#">Todos los Recibos de Caja</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
        
        <form class="form-inline my-2 my-lg-0">
            <a href="{{ route('cash_receipts.create') }}" class="btn btn-success my-2 my-sm-0">Crear</a>
        </form>
    </div>
</nav>
<br>
@include('cash_receipts.fragment.info')
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
                <td>{{ number_format ($cash_receipt->value) }}</td>
                <td>{{$cash_receipt->description}}</td>
                <td class="text-right">
                    <a href="{{ route('cash_receipts.show', $cash_receipt->id) }}" class="btn btn-default btn-sm">Ver</a>
                    <a href="{{ route('cash_receipts.edit', $cash_receipt->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form class="form-inline" method="post" action="{{route('cash_receipts.destroy', $cash_receipt->id) }}">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" value="Borrar" class="btn btn-danger btn-sm">
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
            No Cash Receipts were created.
            <a href="{{ route('cash_receipts.create') }}">Create Now!</a>
        </p>
    </div>
    @endif
</div>
@endsection