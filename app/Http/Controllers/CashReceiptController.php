<?php

namespace App\Http\Controllers;

use App\CashReceipt;
use Illuminate\Http\Request;
use Session;

class CashReceiptController extends Controller
{
   public function index()
   {
       $cash_receipts = CashReceipt::OrderBy('id', 'DESC')->paginate();
       return view('cash_receipts.index', compact('cash_receipts'));
   }

   public function show($id)
   {
       $cash_receipt = CashReceipt::find($id);
       return view('cash_receipts.show', compact('cash_receipt'));
   }

   public function destroy($id)
   {
        $cash_receipt = CashReceipt::find($id);
        $cash_receipt->delete();

        return back()->with('info', 'El Recibo de caja fue eliminado');
   }

   public function edit($id)
   {
       $cash_receipt = CashReceipt::find($id);
       return view('cash_receipts.edit', compact('cash_receipt'));
   }

   public function create()
    {
        return view('cash_receipts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'box_number'       => 'required|unique:cash_receipts',
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

        Session::flash('message','Se creo correctamente su Recibo de Caja');
        return redirect()->route('cash_receipts.index');
    }
}
