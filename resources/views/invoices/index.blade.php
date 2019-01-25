@extends('layouts.master')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light nav-invoice" >
    <a class="navbar-brand" href="#">Invoices</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
        
        <form class="form-inline my-2 my-lg-0">
            <a href="{{route('invoices.create')}}" class="btn btn-success my-2 my-sm-0">Create</a>
        </form>
    </div>
</nav>

<br>

<div class="container container-principal">
    @if($invoices->count())
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Invoice N.</th>              
                <th>Client</th>
                <th>Date</th>
                <th>Exp. Date</th>
                <th>Doc. Type</th>
                <th>State</th>
                <th>Grand Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{$invoice->invoice_number}}</td>
                <td>{{$invoice->client}}</td>
                <td>{{$invoice->date}}</td>
                <td>{{$invoice->expiration_date}}</td>
                <td>{{$invoice->document_type}}</td>
                <td>{{$invoice->state}}</td>
                <td>$ {{$invoice->grand_total}}</td>
                <td class="text-right">
                    <a href="{{route('invoices.show', $invoice)}}" class="btn btn-default btn-sm">View</a>
                    <a href="{{route('invoices.edit', $invoice)}}" class="btn btn-primary btn-sm">Edit</a>
                    <form class="form-inline" method="post"
                        action="{{route('invoices.destroy', $invoice)}}"
                        onsubmit="return confirm('Are you sure?')"
                    >
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $invoices->render() !!}
    @else
    <div class="invoice-empty">
        <p class="invoice-empty-title">
            No Invoices were created.
            <a href="{{route('invoices.create')}}">Create Now!</a>
        </p>
    </div>
    @endif
</div>
@endsection