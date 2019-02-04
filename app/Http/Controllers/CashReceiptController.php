<?php

namespace App\Http\Controllers;

use App\CashReceipt;
use Illuminate\Http\Request;

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
}
