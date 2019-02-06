<form action="{{ route('cash_receipts.store') }}" method="POST">
                @csrf
                <div class="col-sm-12">
                    <div class="row form-cash">
                        <div class="col-sm-3">
                            <label>N° Recibo de Caja</label>
                            <input type="text" class="form-control" name="box_number">
                        </div>

                        <div class="col-sm-3">
                            <label>Fecha</label>
                            <input type="text" class="form-control" name="date" value="<?= date('Y-m-d') ?>">
                        </div>

                        <div class="col-sm-3">
                            <label>Recibimos</label>
                            <input type="text" class="form-control" name="we_received">
                        </div>

                        <div class="col-sm-3">
                            <label>Direccion</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div> 

                    <div class="row form-cash">
                        <div class="col-sm-4">             
                            <label>Tipo de Documento</label>
                            <select class="form-control" name="document_type">
                                <option value="NIT">Nit</option>
                                <option value="Cedula">Cédula</option>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <label>Numero de Documento</label>
                            <input type="text" class="form-control" name="document_number">
                        </div>

                        <div class="col-sm-4">
                            <label>Ciudad</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                    </div> 

                    <div class="row form-cash">
                        <div class="col-sm-6">             
                            <label>Valor</label>
                            <input type="text" class="form-control" name="value">
                        </div>

                        <div class="col-sm-6">
                            <label>Valor en Letras</label>
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

                <div class="panel-footer div-create">
                    <a href="{{ route('cash_receipts.index') }}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Crear</button>
                </div>
            </form>


