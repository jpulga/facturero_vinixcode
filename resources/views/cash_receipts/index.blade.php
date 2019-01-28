@extends('layouts.master')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light nav-invoice" >
    <a class="navbar-brand" href="#">All Cash Receipts</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
        
        <form class="form-inline my-2 my-lg-0">
            <a href="{{route('invoices.create')}}" class="btn btn-success my-2 my-sm-0">Create</a>
        </form>
    </div>
</nav>

<br>

<div class="container container-principal">
    @if($cash_receipts->count())
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Box  N.</th>              
                <th>We received</th>
                <th>Document Type</th>
                <th>Document number</th>
                <th>Date</th>
                <th>Value</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cash_receipts as $cash_receipt)
            <tr>
                <td>{{$cash_receipt->box_number}}</td>
                <td>{{$cash_receipt->we_received}}</td>
                <td>{{$cash_receipt->document_type}}</td>
                <td>{{$cash_receipt->document_number}}</td>
                <td>{{$cash_receipt->date}}</td>
                <td>{{ number_format ($cash_receipt->value)}}</td>
                <td>$ {{$cash_receipt->description}}</td>
                <td class="text-right">
                    <a href="{{route('cash_receipts.show', $cash_receipt)}}" class="btn btn-default btn-sm">View</a>
                    <a href="{{route('cash_receipts.edit', $cash_receipt)}}" class="btn btn-primary btn-sm">Edit</a>
                    <form class="form-inline" method="post" action="{{route('cash_receipts.destroy', $cash_receipt)}}" 
                        onsubmit="return confirm('Are you sure?')">
                        
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $cash_receipts->render() !!}
    @else
    <div class="cash_receipt-empty">
        <p class="cash_receipt-empty-title">
            No Cash Receipts were created.
            <a href="{{route('invoices.create')}}">Create Now!</a>
        </p>
    </div>
    @endif
</div>
@endsection