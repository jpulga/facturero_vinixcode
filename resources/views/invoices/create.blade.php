@extends('layouts.master')

@section('content')
@include('fragment.info')

<div id="invoice">
    <form action="{{ route('invoices.store') }}" method="POST" class="form-invoice">
        <div class="container my-4 div-create-invoice">
            <div class="px-4 clearfix">
                <div class="float-left">
                    <h3 class="title-create-invoice">Crear Factura</h3>
                </div>
            
                <div class="float-right action-buttons mt-2 mt-sm-0 ml-sm-1">
                    <a href="{{ route('invoices.index') }}" class="btn btn-warning d-none d-sm-block">Volver</a>
                </div>            
            </div>
        </div>

        <div class="container">
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