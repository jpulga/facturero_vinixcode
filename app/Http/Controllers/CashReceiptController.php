<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\CashReceipt;

class CashReceiptController extends Controller
{
    public function index(Request $request)
    {
        $cash_receipts = CashReceipt::we_received($request->get('Recibimos'))->OrderBy('id', 'desc')->paginate();
        return view('cash_receipts.index', compact('cash_receipts'));
    }

   public function create()
    {
        $count = \DB::table('cash_receipts')->select('box_number')->limit(1)->orderBy('box_number', 'desc')->value('box_number');
        return view('cash_receipts.create', compact('count'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'box_number'       => 'required',
            'we_received'      => 'required',
            'address'          => 'required',
            'city'             => 'required',
            'document_type'    => 'required',
            'document_number'  => 'required',
            'date'             => 'required',
            'value'            => 'required',
            'value_in_letters' => 'required',
            'description'      => 'required'
        ]);

        $datos = $request->all();
        CashReceipt::create($datos);

        return redirect()->route('cash_receipts.index')
                         ->with('success', 'Tu recibo fue creado satisfactoriamente');
    }

    public function show($id)
    {
        $cash_receipt = CashReceipt::find($id);
        return view('cash_receipts.show', compact('cash_receipt'));
    }

    public function edit(CashReceipt $cash_receipt)
    {
        return view('cash_receipts.edit', compact('cash_receipt'));
    }

    public function update(Request $request, CashReceipt $cash_receipt)
    {
        $request->validate([
            'box_number'       => 'required',
            'we_received'      => 'required',
            'address'          => 'required',
            'city'             => 'required',
            'document_type'    => 'required',
            'document_number'  => 'required',
            'date'             => 'required',
            'value'            => 'required',
            'value_in_letters' => 'required',
            'description'      => 'required'
        ]);

        $cash_receipt->update($request->all());
        return redirect()->route('cash_receipts.index')
                        ->with('info', 'El Recibo de caja fue actualizado');
    }

    public function destroy($id)
    {
        $cash_receipt = CashReceipt::find($id);
        $cash_receipt->delete();

        return back()->with('info', 'El Recibo de caja fue eliminado');
    }
}
