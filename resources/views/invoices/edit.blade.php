@extends('layouts.master')

@section('content')
@include('fragment.info')

<div id="invoice">
    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST" class="form-invoices">
        <div class="panel panel-default" v-clock>
            <div class="panel-heading">
                <div class="clearfix div-edit-invoices">
                    <span class="panel-title">Editar Factura</span>
                    <a href="{{ route('invoices.index') }}" class="btn btn-outline-warning buttom-edit-invoices">Volver</a>
                </div>
            </div>

            @include('invoices.form_edit')
            
        </div>
    </form>
</div>
@endsection

@push('scripts')
    <script src="/js/vue.min.js"></script>
    <script src="/js/vue-resource.min.js"></script>
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = '{{csrf_token()}}';

        window._form = {!! $invoice->toJson() !!};
    </script>
    <script src="/js/app.js"></script>
@endpush