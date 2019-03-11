@extends('layouts.master')

@section('content')

@include('fragment.info')
<div class="container-fluid my-3">
    @if($cash_receipts->count())
    <div class="px-4 clearfix">
        <div class="float-left">
            <h3>Recibos de caja</h3>
        </div>
        
        <div class="float-right">
            {!! Form::open(['route' => 'cash_receipts.index', 'method' => 'GET', 'class' => 'form-inline my-2 my-md-0', 'role' => 'search']) !!}
                <div class="input-group">
                    {!! Form::text('Recibimos', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                
                <div class="action-buttons mt-2 mt-sm-0 ml-sm-1">
                    <a href="{{ route('cash_receipts.create') }}" class="btn btn-primary d-none d-sm-block">Crear</a>
                    <a href="{{ route('cash_receipts.create') }}" class="btn btn-primary btn-lg btn-block d-block d-sm-none">Crear</a>
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
                    <th>N. Caja</th>              
                    <th>Recibimos</th>
                    <th>Tipo de Documento</th>
                    <th >Numero de Documento</th>
                    <th>Fecha</th>
                    <th>Valor</th>
                    <th class="descripcion">Descripcion</th>
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
                    <td>${{ number_format ($cash_receipt->value) }}</td>
                    <td>{{$cash_receipt->description}}</td>
                    <td>{{$cash_receipt->created_at->diffForHumans()}}</td>
                    <td>
                        <a title="Ver Recibo" href="{{ route('cash_receipts.show', $cash_receipt->id) }}" class="btn btn-outline-dark btn-sm"><i class="far fa-file-pdf"></i></a>
                        <a title="Editar Recibo" href="{{ route('cash_receipts.edit', $cash_receipt->id) }}" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i></a>
                        <a title="Clonar Recibo" href="{{ route('cash_receipts.duplicate', $cash_receipt->id) }}" class="btn btn-outline-success btn-sm"><i class="far fa-clone"></i></a>
                        <form class="form-inline d-inline-block" method="post" action="{{route('cash_receipts.destroy', $cash_receipt)}}"
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
            <p class="cash_receipt-empty-title">
                No existen recibos. <a href="{{route('cash_receipts.create')}}">Crea una</a>.
            </p>
        </div>
        @endif
    </div>    
</div>
@endsection