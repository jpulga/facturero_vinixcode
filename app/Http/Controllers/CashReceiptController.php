<?php

namespace App\Http\Controllers;

use App\CashReceipt;
use Illuminate\Http\Request;

class CashReceiptController extends Controller
{
   public function index()
   {
       $cash_receipts = CashReceipt::OrderBy('id', 'ASC')->paginate();
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
}
