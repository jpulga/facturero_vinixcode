<form action="{{ route('egresses.store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-3">
            <label>N° Egreso</label>
            <input type="text" class="form-control" name="exit_number" value="{{ $count+1 }}">
        </div>
    
        <div class="form-group col-md-3">
            <label>Girado A</label>
            <input type="text" class="form-control" name="turned">
        </div>

        <div class="form-group col-md-3">
            <label>Tipo de Documento</label>
            <select class="form-control" name="document_type">
                <option value="NIT">Nit</option>
                <option value="Cedula">Cédula</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label>Numero de Documento</label>
            <input type="text" class="form-control" name="document_number">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-2">
            <label>Fecha</label>
            <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>">
        </div>

        <div class="form-group col-md-4">
            <label>Valor</label>
            <input type="text" class="form-control" name="value"> 
        </div>

        <div class="form-group col-md-6">
            <label>Valor en Letras</label>
            <input type="text" class="form-control" name="value_in_letters">
        </div>
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <textarea class="form-control" name="description"></textarea>   
    </div>

    <div class="f-c-e">
        <button type="submit" class="btn btn-primary b-c-e">Crear</button>
        <a href="{{ route('egresses.index') }}" class="btn btn-danger b-c-e">Cancelar</a>
    </div>
</form>


