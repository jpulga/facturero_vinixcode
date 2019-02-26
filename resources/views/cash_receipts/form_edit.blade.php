<form action="{{ route('cash_receipts.update', $cash_receipt->id) }}" method="POST" >
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="form-group col-md-3">
            <label>N° Recibo de Caja</label>
            <input type="text" class="form-control" name="box_number" value="{{ $cash_receipt->box_number }}">
        </div>

        <div class="form-group col-md-3">
            <label>Recibimos De</label>
            <input type="text" class="form-control" name="we_received" value="{{ $cash_receipt->we_received }}">
        </div>
    
        <div class="form-group col-md-3">
            <label>Tipo de Documento</label>
            <select class="form-control" name="document_type">
                <option value="NIT" @if($cash_receipt->document_type == 'NIT') selected @endif>Nit</option>
                <option value="Cedula" @if($cash_receipt->document_type == 'Cedula') selected @endif>Cédula</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label>Numero de Documento</label>
            <input type="text" class="form-control" name="document_number" value="{{ $cash_receipt->document_number }}">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Ciudad</label>
            <input type="text" class="form-control" name="city" value="{{ $cash_receipt->city }}">
        </div>

        <div class="form-group col-md-4">
            <label>Direccion</label>
            <input type="text" class="form-control" name="address" value="{{ $cash_receipt->address }}">
        </div>

        <div class="form-group col-md-4">
            <label>Fecha</label>
            <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>">
        </div>    
    </div> 
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Valor</label>
            <input type="text" class="form-control" name="value" value="{{ $cash_receipt->value }}">
        </div>

        <div class="form-group col-md-6">
            <label>Valor en Letras</label>
            <input type="text" class="form-control" name="value_in_letters" value="{{ $cash_receipt->value_in_letters }}">
        </div>
    </div> 
    
    <div class="form-group">
        <label>Descripcion</label>
        <textarea class="form-control" name="description">{{ $cash_receipt->description }}</textarea>
    </div>

    <div class="footer-create-cash">
        <button type="submit" class="btn btn-success button-edit-cash">Actualizar</button>
        <a href="{{ route('cash_receipts.index') }}" class="btn btn-danger button-edit-cash">Cancelar</a>
    </div>
</form>


