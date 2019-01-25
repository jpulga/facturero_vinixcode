<div class="row">
    <div class="col-sm-4">
        <div class="row">
            <div class="col-sm-6">
                <label>Invoice N.</label>
                <input type="text" class="form-control" v-model="form.invoice_number">
            </div>

            <div class="col-sm-6">
                <label>Company Origin</label>
                <input type="text" class="form-control" v-model="form.company_origin" value="Vinix Code S.A.S">
            </div>
        </div> 

        <br>  
        
        <div class="form-group">
            <label>Client</label>
            <input type="text" class="form-control" v-model="form.client">
        </div>

        <div class="row">
            <div class="col-sm-6">
                <label>Invoice Date</label>
                <input type="date" class="form-control" v-model="form.date">
            </div>

            <div class="col-sm-6">
                <label>Expiration Date</label>
                <input type="date" class="form-control" v-model="form.expiration_date">
            </div>
        </div>
        <br>
    </div>
    
    <div class="col-sm-4">
        <div class="form-group">
            <label>Notes</label>
            <textarea class="form-control" v-model="form.notes"></textarea>
        </div>

        <div class="row">
            <div class="col-sm-6 campo-modificar">
                <label>Document Type</label>
                <select class="form-control" v-model="form.document_type">
                    <option value="NIT">Nit</option>
                    <option value="Cedula">Cédula</option>
                </select>
            </div>

            <div class="col-sm-6 campo-modificar">
                <label>Document Number</label>
                <input type="tex" class="form-control" v-model="form.document_number">
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="row">
            <div class="col-sm-6">
                <label>Cellphone</label>
                <input type="text" class="form-control" v-model="form.cellphone">
            </div>

            <div class="col-sm-6">
                <label>State</label>
                <select class="form-control" v-model="form.state" name="state" value="hola">
                    <option value="Debe">Debe</option>
                    <option value="Paga">Paga</option>
                </select>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" v-model="form.address">
        </div>

        <div class="form-group">
            <label>Currency</label>
            <select class="form-control" v-model="form.currency" name="currency">
                <option value="USD">USD (Dolares Americanos)</option>
                <option value="COP">COP (Pesos Colombianos)</option>
            </select>
        </div>        
    </div>
</div>

<hr>

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