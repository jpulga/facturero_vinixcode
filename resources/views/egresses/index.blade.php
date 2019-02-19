@extends('layouts.master')

@section('content')
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">Egresos</a>
    {!! Form::open(['route' => 'egresses.index', 'method' => 'GET', 'class' => 'form-inline', 'role' => 'search']) !!}
        {!! Form::text('Girado', null, ['class' => 'form-control mr-sm-2 buscar-cash', 'placeholder' => 'Buscar']) !!}
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        <a href="{{ route('egresses.create') }}" class="btn btn-outline-primary my-2 my-sm-0">Crear</a>
    {!! Form::close() !!}
</nav>
<br>
@include('fragment.info')
<div class="container container-principal">
    @if($egresses->count())
    <table class="table table-hover">
        <thead>
            <tr>
                <th>N. Egreso</th>              
                <th>Girado</th>
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
            @foreach($egresses as $egress)
            <tr>
                <td>{{$egress->exit_number}}</td>
                <td>{{$egress->turned}}</td>
                <td>{{$egress->document_type}}</td>
                <td>{{$egress->document_number}}</td>
                <td>{{$egress->date}}</td>
                <td>$ {{ number_format ($egress->value) }}</td>
                <td>{{$egress->description}}</td>
                <td>{{$egress->created_at->diffForHumans()}}</td>
                <td>
                    <a title="Ver Egreso" href="{{ route('egresses.show', $egress->id) }}" class="btn btn-outline-dark btn-sm"><i class="far fa-file-pdf"></i></a>
                    <a title="Editar Egreso" href="{{ route('egresses.edit', $egress->id) }}" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i></a>
                    <a title="Clonar Egreso" href="{{ route('egresses.duplicate', $egress->id) }}" class="btn btn-outline-success btn-sm"><i class="far fa-clone"></i></a>
                    <form class="form-inline" method="post" action="{{route('egresses.destroy', $egress)}}"
                                onsubmit="return confirm('¿Estas seguro de borrar el egreso #{{$egress->exit_number}}?')">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button title="Borrar Egreso" type="submit" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $egresses->render() !!}
    @else
    <div class="egress-empty">
        <p class="egress-empty-title text-center">
            No existen egresos. <a href="{{route('egresses.create')}}">Crea uno</a>.
        </p>
    </div>
    @endif
</div>
@endsection
