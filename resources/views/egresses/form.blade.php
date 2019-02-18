<form action="{{ route('egresses.store') }}" method="POST" class="form-egress">
    @csrf
    <div class="col-sm-12">
        <div class="row form-cash">
            <div class="col-sm-3">
                <label>N° Egreso</label>
                <input type="text" class="form-control" name="exit_number" >
            </div>

            <div class="col-sm-3">
                <label>Girado</label>
                <input type="text" class="form-control" name="turned">
            </div>

            <div class="col-sm-3">             
                <label>Tipo de Documento</label>
                <select class="form-control" name="document_type">
                    <option value="NIT">Nit</option>
                    <option value="Cedula">Cédula</option>
                </select>
            </div>

            <div class="col-sm-3">
                <label>Numero de Documento</label>
                <input type="text" class="form-control" name="document_number">
            </div>
        </div> 

        <div class="row form-cash">
            <div class="col-sm-4">
                <label>Fecha</label>
                <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>">
            </div>

            <div class="col-sm-4">
                <label>Valor</label>
                <input type="text" class="form-control" name="value">
            </div>

            <div class="col-sm-4">             
                <label>Valor e Letras</label>
                <input type="text" class="form-control" name="value_in_letters">
            </div>
        </div> 
    </div>
    
    <div class="col-sm-12">
        <div class="form-group">
            <label>Descripcion</label>
            <textarea class="form-control" name="description"></textarea>
        </div>     
    </div>

    <div class="panel-footer div-create-egress">
        <a href="{{ route('egresses.index') }}" class="btn btn-outline-danger">Cancelar</a>
        <button type="submit" class="btn btn-outline-success">Crear</button>
    </div>    
</form>


