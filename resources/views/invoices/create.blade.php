@extends('layouts.master')

@section('content')
@include('fragment.info')

<div id="invoice">
    <form action="{{ route('invoices.store') }}" method="POST" class="form-invoice">
        <div class="panel panel-default" v-clock>
            <div class="panel-heading">
                <div class="clearfix div-create-invoices">
                    <span class="panel-title">Crear Factura</span>
                    <a href="{{ route('invoices.index') }}" class="btn btn-outline-warning buttom-create-invoices">Volver</a>
                </div>
            </div>

            @include('invoices.form')
        </div>
    </form>
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