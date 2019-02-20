<form action="{{ route('cash_receipts.update', $cash_receipt->id) }}" method="POST" class="form-cash" >
   
    @csrf
    @method('PUT')

    <div class="col-sm-12">
        <div class="row form-cash">
            <div class="col-sm-3">
                <label>N° Recibo de Caja</label>
                <input type="text" class="form-control" name="box_number" value="{{ $cash_receipt->box_number }}">
            </div>

            <div class="col-sm-3">
                <label>Fecha</label>
                <input type="date" class="form-control" name="date" value="{{ $cash_receipt->date }}">
            </div>

            <div class="col-sm-3">
                <label>Recibimos De</label>
                <input type="text" class="form-control" name="we_received" value="{{ $cash_receipt->we_received }}">
            </div>

            <div class="col-sm-3">
                <label>Direccion</label>
                <input type="text" class="form-control" name="address" value="{{ $cash_receipt->address }}">
            </div>
        </div> 

        <div class="row form-cash">
            <div class="col-sm-4">             
                <label>Tipo de Documento</label>
                <select class="form-control" name="document_type">
                    <option value="NIT" @if($cash_receipt->document_type == 'NIT') selected @endif>Nit</option>
                    <option value="Cedula" @if($cash_receipt->document_type == 'Cedula') selected @endif>Cédula</option>
                </select>
            </div>

            <div class="col-sm-4">
                <label>Numero de Documento</label>
                <input type="text" class="form-control" name="document_number" value="{{ $cash_receipt->document_number }}">
            </div>

            <div class="col-sm-4">
                <label>Ciudad</label>
                <input type="text" class="form-control" name="city" value="{{ $cash_receipt->city }}">
            </div>
        </div> 

        <div class="row form-cash">
            <div class="col-sm-6">             
                <label>Valor</label>
                <input type="text" class="form-control" name="value" value="{{ $cash_receipt->value }}">
            </div>

            <div class="col-sm-6">
                <label>Valor en Letras</label>
                <input type="text" class="form-control" name="value_in_letters" value="{{ $cash_receipt->value_in_letters }}">
            </div>
        </div> 
    </div>
    
    <div class="col-sm-12">
        <div class="form-group">
            <label>Descripcion</label>
            <textarea class="form-control" name="description">{{ $cash_receipt->description }}</textarea>
        </div>     
    </div>

    <div class="panel-footer div-edit-cash">
        <a href="{{ route('cash_receipts.index') }}" class="btn btn-outline-danger">Cancelar</a>
        <button type="submit" class="btn btn-outline-success">Actualizar</button>
    </div>
</form>


