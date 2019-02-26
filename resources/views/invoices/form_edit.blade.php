@csrf
@method('PUT')

<div class="form-row">
    <div class="form-group col-md-3">
        <label>N° de Factura</label>
        <input type="text" class="form-control" v-model="form.invoice_number" name="invoice_number" value="{{ $invoice->invoice_number }}">
    </div>

    <div class="form-group col-md-3">
        <label>Cliente</label>
        <input type="text" class="form-control" v-model="form.client" name="client" value="{{ $invoice->client }}">
    </div>

    <div class="form-group col-md-3">
        <label>Fecha</label>
        <input type="date" class="form-control" v-model="form.date" name="date" value="{{ $invoice->date }}">
    </div>

    <div class="form-group col-md-3">
        <label>Fecha de Vencimiento</label>
        <input type="date" class="form-control" v-model="form.expiration_date" name="expiration_date" value="{{ $invoice->expiration_date }}">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label>Tipo de Documento</label>
        <select class="form-control" v-model="form.document_type" name="document_type">
            <option value="NIT">Nit</option>
            <option value="Cedula">Cédula</option>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label>Numero de Documento</label>
        <input type="text" class="form-control" v-model="form.document_number" name="document_number" value="{{ $invoice->document_number }}">
    </div>
    
    <div class="form-group col-md-4">
        <label>Direccion</label>
        <input type="text" class="form-control" v-model="form.address" name="address" value="{{ $invoice->address }}">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label>Telefono</label>
        <input type="text" class="form-control" v-model="form.cellphone" name="cellphone" value="{{ $invoice->cellphone }}">
    </div>

    <div class="form-group col-md-4">
        <label>Moneda</label>
        <select class="form-control" v-model="form.currency" name="currency">
            <option value="USD">USD (Dolares Americanos)</option>
            <option value="COP">COP (Pesos Colombianos)</option>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label>Estado</label>
        <select class="form-control" v-model="form.state" name="state">
            <option value="Debe">Debe</option>
            <option value="Paga">Paga</option>
        </select>
    </div>

    <div class="form-group col-md-3" hidden>
        <label>Compañia de Origen</label>
        <input type="text" class="form-control" v-model="form.company_origin" name="company_origin" value="Vinix Code S.A.S">
    </div>
</div>

<div class="mb-3">
    <label class="text-center">Notas</label>
    <textarea class="form-control" v-model="form.notes" name="notes">{{ $invoice->notes }}</textarea>
</div>
<hr>

<div class="table-responsive">
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
                    <input class="table-control" v-model="product.name" name="products[@{{$index}}][name]">
                </td>
                <td class="table-price" :class="{'table-error': errors['products.' + $index + '.price']}">
                    <input type="text" class="table-control"  v-model="product.price" name="products[@{{$index}}][price]">
                </td>
                <td class="table-qty" :class="{'table-error': errors['products.' + $index + '.qty']}">
                    <input type="text" class="table-control" v-model="product.qty" name="products[@{{$index}}][qty]">
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
                <td class="table-label">Subtotal</td>
                <td class="table-amount">@{{subTotal}}</td>
            </tr>
            <tr>
                <td class="table-empty" colspan="2"></td>
                <td class="table-label">Descuento</td>
                <td class="table-discount" :class="{'table-error': errors.discount}">
                    <input type="text" class="table-discount_input" v-model="form.discount" name="discount">
                </td>
            </tr>
            <tr>
                <td class="table-empty" colspan="2"></td>
                <td class="table-label">Total a Pagar</td>
                <td class="table-amount">@{{grandTotal}}</td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="footer-create-invoice">
    <button type="submit" class="btn btn-success button-create-invoice">Actualizar</button>
    <a href="{{ route('invoices.index') }}" class="btn btn-danger button-create-invoice">Cancelar</a>
</div>