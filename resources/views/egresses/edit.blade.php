@extends('layouts.master')

@section('content')
<div id="egresses">
    <div class="panel panel-default" v-clock>
        <div class="panel-heading">
            <div class="clearfix div-edit-egress">
                <span class="panel-title">Editar Egreso</span>
            </div>
        </div>
            @include('egresses.form_edit')
    </div>
</div>
@endsection

@push('scripts')
    <script src="/js/app.js"></script>
@endpush