<form action="{{ route('egresses.update', $egress->id) }}" method="POST" class="form-egress">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-3">
            <label>N° Egreso</label>
            <input type="text" class="form-control" name="exit_number" value="{{ $egress->exit_number }}">
        </div>
    
        <div class="form-group col-md-3">
            <label>Girado A</label>
            <input type="text" class="form-control" name="turned" value="{{ $egress->turned }}">
        </div>

        <div class="form-group col-md-3">
            <label>Tipo de Documento</label>
            <select class="form-control" name="document_type">
                <option value="NIT" @if($egress->document_type == 'NIT') selected @endif>Nit</option>
                <option value="Cedula" @if($egress->document_type == 'Cedula') selected @endif>Cédula</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label>Numero de Documento</label>
            <input type="text" class="form-control" name="document_number" value="{{ $egress->document_number }}">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-2">
            <label>Fecha</label>
            <input type="date" class="form-control" name="date" value="{{ $egress->date }}">
        </div>

        <div class="form-group col-md-4">
            <label>Valor</label>
            <input type="text" class="form-control" name="value" value="{{ $egress->value }}">
        </div>

        <div class="form-group col-md-6">
            <label>Valor en Letras</label>
            <input type="text" class="form-control" name="value_in_letters" value="{{ $egress->value_in_letters }}">
        </div>
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <textarea class="form-control" name="description">{{ $egress->description }}</textarea>
    </div>

    <div class="f-c-e">
        <button type="submit" class="btn btn-success b-c-e">Actualizar</button>
        <a href="{{ route('egresses.index') }}" class="btn btn-danger b-c-e">Cancelar</a>    
    </div>
</form>





