@extends('layouts.master')

@section('content')
<div id="cash_receipt">
    <div class="panel panel-default" v-clock>
        <div class="panel-heading">
            <div class="clearfix div-create">
                <span class="panel-title">Editar Recibo de Caja</span>
                <a href="{{ route('cash_receipts.index') }}" class="btn btn-warning edit-cash">Volver</a>
            </div>
        </div>

        <div class="panel-body">
            @include('cash_receipts.form_edit')
        </div>
        
        <div class="panel-footer div-create">
            <a href="{{ route('cash_receipts.index') }}" class="btn btn-danger">Cancelar</a>
            <a href="{{ route('cash_receipts.index') }}" class="btn btn-success" @click="update" :disabled="isProcessing">Actualizar</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="/js/vue.min.js"></script>
    <script src="/js/vue-resource.min.js"></script>
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = '{{csrf_token()}}';

        window._form = {!! $cash_receipt->toJson() !!};
    </script>
    <script src="/js/app.js"></script>
@endpush
