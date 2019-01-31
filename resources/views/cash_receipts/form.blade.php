<div class="row">
    <div class="col-sm-4">
        <div class="row form-cash">
            <div class="col-sm-6">
                <label>N° Recibo de Caja</label>
                <input type="text" class="form-control" v-model="form.box_number">
            </div>

            <div class="col-sm-6">
                <label>Fecha</label>
                <input type="text" class="form-control" v-model="form.date" value="<?= date('Y-m-d') ?>">
            </div>
        </div> 
        
        <div class="form-group">
            <label>Recibimos</label>
            <input type="text" class="form-control" v-model="form.we_received">
        </div>

        <div class="form-group">
            <label>Direccion</label>
            <input type="text" class="form-control" v-model="form.address">
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="form-group">
            <label>Descripcion</label>
            <textarea class="form-control form-cash" v-model="form.description"></textarea>
        </div>

        <div class="row">
            <div class="col-sm-6 campo-modificar">
                <label>Valor</label>
                <input type="tex" class="form-control" v-model="form.value">
            </div>

            <div class="col-sm-6 campo-modificar">
                <label>Valor en Letras</label>
                <input type="tex" class="form-control" v-model="form.value_in_letters">
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
        <label>Tipo de Documento</label>
            <select class="form-control" v-model="form.document_type">
                <option value="NIT">Nit</option>
                <option value="Cedula">Cédula</option>
            </select>
        </div>

        <div class="form-group">
            <label>Numero de Documento</label>
            <input type="text" class="form-control" v-model="form.document_number">
        </div>

         <div class="form-group">
            <label>Ciudad</label>
            <input type="text" class="form-control" v-model="form.city">
        </div>             
    </div>
</div>


