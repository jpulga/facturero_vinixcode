@extends('layouts.master')

@section('content')
<div id="cash_receipt">
    <div class="panel panel-default" v-clock>
        <div class="panel-heading">
            <div class="clearfix div-create">
                <span class="panel-title">Crear Recibo Caja</span>
                <a href="{{route('cash_receipts.index')}}" class="btn btn-warning pull-right buttom-cash-create">Volver</a>
            </div>
        </div>

        <div class="panel-body">
            @include('cash_receipts.form')
        </div>
        
        <div class="panel-footer div-create">
            <a href="{{route('cash_receipts.index')}}" class="btn btn-danger">Cancelar</a>
            <a href="{{route('cash_receipts.index')}}" class="btn btn-success" @click="create" :disabled="isProcessing">Crear</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="/js/vue.min.js"></script>
<script src="/js/vue-resource.min.js"></script>
<script type="text/javascript">
    Vue.http.headers.common['X-CSRF-TOKEN'] = '{{csrf_token()}}';

    window._form = {
        invoice_number: '',
        company_origin: '',
        client: '',
        date: '',
        expiration_date: '',
        document_type: '',
        document_number: '',
        cellphone: '',
        address: '',
        currency: '',
        state: '',
        notes: '',
        discount: 0,
        products: [{
            name: '',
            price: 0,
            qty: 1
        }]
    };
</script>
<script src="/js/app.js"></script>
@endpush