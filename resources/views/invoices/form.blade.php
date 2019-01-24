<div class="row">
    <div class="col-sm-4">
        <div class="row">
            <div class="col-sm-6">
                <label>Invoice N.</label>
                <input type="text" class="form-control" v-model="form.invoice_number">
                <p v-if="errors.invoice_number" class="error">@{{errors.invoice_number[0]}}</p>
            </div>

            <div class="col-sm-6">
                <label>Company Origin</label>
                <input type="text" class="form-control" v-model="form.company_origin" value="Vinix Code S.A.S">
                <p v-if="errors.company_origin" class="error">@{{errors.company_origin[0]}}</p>
            </div>
        </div>      
        <br>  

        <div class="form-group">
            <label>Client</label>
            <input type="text" class="form-control" v-model="form.client">
            <p v-if="errors.client" class="error">@{{errors.client[0]}}</p>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <label>Invoice Date</label>
                <input type="date" class="form-control" v-model="form.date">
                <p v-if="errors.date" class="error">@{{errors.date[0]}}</p>
            </div>
            <div class="col-sm-6">
                <label>Expiration Date</label>
                <input type="date" class="form-control" v-model="form.expiration_date">
                <p v-if="errors.expiration_date" class="error">@{{errors.expiration_date[0]}}</p>
            </div>
        </div>
        <br>
    </div>
    
    <div class="col-sm-4">
        <div class="form-group">
            <label>Notes</label>
            <textarea class="form-control" v-model="form.notes"></textarea>
            <p v-if="errors.notes" class="error">@{{errors.notes[0]}}</p>
        </div>

        <div class="row">
            <div class="col-sm-6 campo-modificar">
                <label>Document Type</label>
                <select class="form-control" v-model="form.document_type">
                    <option value="NIT">Nit</option>
                    <option value="Cedula">Cédula</option>
                </select>
                <p v-if="errors.document_type" class="error">@{{errors.document_type[0]}}</p>
            </div>
            <div class="col-sm-6 campo-modificar">
                <label>Document Number</label>
                <input type="tex" class="form-control" v-model="form.document_number">
                <p v-if="errors.document_number" class="error">@{{errors.document_number[0]}}</p>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="row">
            <div class="col-sm-6">
                <label>Cellphone</label>
                <input type="text" class="form-control" v-model="form.cellphone">
                <p v-if="errors.cellphone" class="error">@{{errors.cellphone[0]}}</p>
            </div>
            <div class="col-sm-6">
                <label>State</label>
                <select class="form-control" v-model="form.state">
                    <option value="Debe">Debe</option>
                    <option value="Paga">Paga</option>
                </select>
                <p v-if="errors.state" class="error">@{{errors.state[0]}}</p>
            </div>
        </div>
        <br>

        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" v-model="form.address">
            <p v-if="errors.address" class="error">@{{errors.address[0]}}</p>
        </div>

        <div class="form-group">
            <label>Currency</label>
            <select class="form-control" v-model="form.currency">
                <option value="USD">USD (Dolares Americanos)</option>
                <option value="COP">COP (Pesos Colombianos)</option>
            </select>
            <p v-if="errors.currency" class="error">@{{errors.currency[0]}}</p>
        </div>        
    </div>
</div>

<hr>

<div v-if="errors.products_empty">
    <p class="alert alert-danger">@{{errors.products_empty[0]}}</p>
    <hr>
</div>
<table class="table table-bordered table-form">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Qty</th>
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
                <span @click="addLine" class="table-add_line">Add Line</span>
            </td>
            <td class="table-label">Sub Total</td>
            <td class="table-amount">@{{subTotal}}</td>
        </tr>
        <tr>
            <td class="table-empty" colspan="2"></td>
            <td class="table-label">Discount</td>
            <td class="table-discount" :class="{'table-error': errors.discount}">
                <input type="text" class="table-discount_input" v-model="form.discount">
            </td>
        </tr>
        <tr>
            <td class="table-empty" colspan="2"></td>
            <td class="table-label">Grand Total</td>
            <td class="table-amount">@{{grandTotal}}</td>
        </tr>
    </tfoot>
</table>