@extends('layouts.master')

@section('content')
    <div id="invoice">
        <div class="panel panel-default" v-clock>
            <div class="panel-heading">
                <div class="clearfix">
                    <span class="panel-title">Create Invoice</span>
                    <a href="{{route('invoices.index')}}" class="btn btn-default pull-right">Back</a>
                </div>
            </div>
            <div class="panel-body">
                @include('invoices.form')
            </div>
            <div class="panel-footer">
                <a href="{{route('invoices.index')}}" class="btn btn-danger">Cancel</a>
                <a href="{{route('invoices.index')}}" class="btn btn-primary" @click="create" :disabled="isProcessing">Create</a>
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