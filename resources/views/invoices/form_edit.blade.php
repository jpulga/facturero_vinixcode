<div class="form-row">
    <div class="form-group col-md-2">
        <label>N° de Factura</label>
        <input type="text" class="form-control" v-model="form.invoice_number">
    </div>

    <div class="form-group col-md-2">
        <label>Cliente</label>
        <input type="text" class="form-control" v-model="form.client">
    </div>

    <div class="form-group col-md-2">
        <label>Fecha</label>
        <input type="date" class="form-control" v-model="form.date">
    </div>

    <div class="form-group col-md-2">
        <label>Fecha de Vencimiento</label>
        <input type="date" class="form-control" v-model="form.expiration_date">
    </div>

    <div class="form-group col-md-2">
        <label>Tipo de Documento</label>
        <select class="form-control" v-model="form.document_type">
            <option value="NIT">Nit</option>
            <option value="Cedula">Cédula</option>
        </select>
    </div>

    <div class="form-group col-md-2">
        <label>Numero de Documento</label>
        <input type="text" class="form-control" v-model="form.document_number">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
        <label>Direccion</label>
        <input type="text" class="form-control" v-model="form.address">
    </div>

    <div class="form-group col-md-3">
        <label>Telefono</label>
        <input type="text" class="form-control" v-model="form.cellphone">
    </div>

    <div class="form-group col-md-3">
        <label>Moneda</label>
        <select class="form-control" v-model="form.currency">
            <option value="USD">USD (Dolares Americanos)</option>
            <option value="COP">COP (Pesos Colombianos)</option>
        </select>
    </div>

    <div class="form-group col-md-3">
        <label>Estado</label>
        <select class="form-control" v-model="form.state" name="state">
            <option value="Debe">Debe</option>
            <option value="Paga">Paga</option>
        </select>
    </div>

    <div class="form-group col-md-3" hidden>
        <label>Compañia de Origen</label>
        <input type="text" class="form-control" v-model="form.company_origin" value="Vinix Code S.A.S">
    </div>
</div>

<div class="mb-3">
    <label class="text-center">Notas</label>
    <textarea class="form-control" v-model="form.notes"></textarea>
</div>
<hr>

<table class="table table-bordered table-form">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="product in form.products">
            <td class="table-name" :class="{'table-error': errors['products.' + $index + '.name']}">
                <input class="table-control" v-model="product.name">
            </td>
            <td class="table-price" :class="{'table-error': errors['products.' + $index + '.price']}">
                <input type="text" class="table-control"  v-model="product.price">
            </td>
            <td class="table-qty" :class="{'table-error': errors['products.' + $index + '.qty']}">
                <input type="text" class="table-control" v-model="product.qty">
            </td>
            <td class="table-total">
                <span class="table-text">@{{product.qty * product.price}}</span>
            </td>
            <td class="table-remove">
                <span @click="remove(product)" class="table-remove-btn">&times;</span>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td class="table-empty" colspan="2">
                <span @click="addLine" class="table-add_line">Agregar Producto</span>
            </td>
            <td class="table-label">Sub Total</td>
            <td class="table-amount">@{{subTotal}}</td>
        </tr>
        <tr>
            <td class="table-empty" colspan="2"></td>
            <td class="table-label">Descuento</td>
            <td class="table-discount" :class="{'table-error': errors.discount}">
                <input type="text" class="table-discount_input" v-model="form.discount">
            </td>
        </tr>
        <tr>
            <td class="table-empty" colspan="2"></td>
            <td class="table-label">Total a Pagar</td>
            <td class="table-amount">@{{grandTotal}}</td>
        </tr>
    </tfoot>
</table>

