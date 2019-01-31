<?php

namespace App\Http\Controllers;

use App\CashReceipt;
use Illuminate\Http\Request;

class CashReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cash_receipts = CashReceipt::orderBy('created_at', 'asc')
            ->paginate(15);

        return view('cash_receipts.index', compact('cash_receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cash_receipts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'box_number' => 'required|alpha_dash|unique:invoices',
            'we_received' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'document_type' => 'required|max:255',
            'document_number' => 'required|numeric|min:0',
            'date' => 'required|date_format:Y-m-d',
            'value' => 'required|numeric|min:0',
            'value_in_letters' => 'required|numeric|min:0',
            'description' => 'required|max:1000',
        ]);

        CashReceipt::create($request->all());
        return redirect()->route('cash_receipts.index')
                         ->with('success','new biodata created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CashReceipt  $cashReceipt
     * @return \Illuminate\Http\Response
     */
    public function show(CashReceipt $cashReceipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CashReceipt  $cashReceipt
     * @return \Illuminate\Http\Response
     */
    public function edit(CashReceipt $cashReceipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CashReceipt  $cashReceipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashReceipt $cashReceipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CashReceipt  $cashReceipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashReceipt $cashReceipt)
    {
        //
    }
}
