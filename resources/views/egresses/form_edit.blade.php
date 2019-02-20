<form action="{{ route('egresses.update', $egress->id) }}" method="POST" class="form-egress">
    
    @csrf
    @method('PUT')

    <div class="col-sm-12">
        <div class="row form-cash">
            <div class="col-sm-3">
                <label>N° Egreso</label>
                <input type="text" class="form-control" name="exit_number" value="{{ $egress->exit_number }}">
            </div>

            <div class="col-sm-3">
                <label>Girado A</label>
                <input type="text" class="form-control" name="turned" value="{{ $egress->turned }}">
            </div>

            <div class="col-sm-3">             
                <label>Tipo de Documento</label>
                <select class="form-control" name="document_type">
                    <option value="NIT" @if($egress->document_type == 'NIT') selected @endif>Nit</option>
                    <option value="Cedula" @if($egress->document_type == 'Cedula') selected @endif>Cédula</option>
                </select>
            </div>

            <div class="col-sm-3">
                <label>Numero de Documento</label>
                <input type="text" class="form-control" name="document_number" value="{{ $egress->document_number }}">
            </div>
        </div> 

        <div class="row form-cash">
            <div class="col-sm-4">
                <label>Fecha</label>
                <input type="date" class="form-control" name="date" value="{{ $egress->date }}">
            </div>

            <div class="col-sm-4">
                <label>Valor</label>
                <input type="text" class="form-control" name="value" value="{{ $egress->value }}">
            </div>

            <div class="col-sm-4">             
                <label>Valor en Letras</label>
                <input type="text" class="form-control" name="value_in_letters" value="{{ $egress->value_in_letters }}">
            </div>
        </div> 
    </div>
    
    <div class="col-sm-12">
        <div class="form-group">
            <label>Descripcion</label>
            <textarea class="form-control" name="description">{{ $egress->description }}</textarea>
        </div>     
    </div>

    <div class="panel-footer div-edit-egress">
        <a href="{{ route('egresses.index') }}" class="btn btn-outline-danger">Cancelar</a>
        <button type="submit" class="btn btn-outline-success">Actualizar</button>
    </div>    
</form>


