@extends('layouts.master')

@section('content')

@include('fragment.info')
<div class="container-fluid my-3">
    @if($egresses->count())
    <div class="px-4 clearfix">
        <div class="float-left">
            <h3>Egresos</h3>
        </div>
        
        <div class="float-right">
            {!! Form::open(['route' => 'egresses.index', 'method' => 'GET', 'class' => 'form-inline my-2 my-md-0', 'role' => 'search']) !!}
                <div class="input-group">
                    {!! Form::text('Girado', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                
                <div class="action-buttons mt-2 mt-sm-0 ml-sm-1">
                    <a href="{{ route('egresses.create') }}" class="btn btn-primary d-none d-sm-block">Crear</a>
                    <a href="{{ route('egresses.create') }}" class="btn btn-primary btn-lg btn-block d-block d-sm-none">Crear</a>
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
                    <th scope="col">N. Egreso</th>              
                    <th scope="col">Girado</th>
                    <th scope="col">Tipo de Documento</th>
                    <th scope="col">Numero de Documento</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Valor</th>
                    <th scope="col" class="descripcion">Descripcion</th>
                    <th scope="col">Fecha de Creacion</th>
                    <th scope="col">Acciones</th>
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
                        <form class="form-inline d-inline-block" method="post" action="{{route('egresses.destroy', $egress)}}"
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
            <p class="egress-empty-title">
                No existen egresos. <a href="{{route('egresses.create')}}">Crea una</a>.
            </p>
        </div>
        @endif
    </div>    
</div>
@endsection
