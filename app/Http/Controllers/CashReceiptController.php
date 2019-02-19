<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\CashReceipt;

class CashReceiptController extends Controller
{
    public function index(Request $request)
    {
        $cash_receipts = CashReceipt::we_received($request->get('Recibimos'))->OrderBy('id', 'desc')->paginate(20);
        $title = 'Recibos de Caja';
        return view('cash_receipts.index', compact('cash_receipts', 'title'));
    }

   public function create()
    {
        $count = \DB::table('cash_receipts')->select('box_number')->limit(1)->orderBy('box_number', 'desc')->value('box_number');
        $title = 'Crear Recibo de Caja';
        return view('cash_receipts.create', compact('count', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'box_number'       => 'required|alpha_dash|unique:cash_receipts',
            'we_received'      => 'required|max:255',
            'address'          => 'required|max:255',
            'city'             => 'required|max:255',
            'document_type'    => 'required',
            'date'             => 'required|date_format:Y-m-d',
            'value'            => 'required|max:255',
            'value_in_letters' => 'required|max:255',
            'description'      => 'required'
        ]);

        $datos = $request->all();
        $cash_receipt = CashReceipt::create($datos);

        return redirect()->route('cash_receipts.index')->with('success', 'El recibo de caja #' . $cash_receipt->box_number . ' fue creado exitosamente.');
    }

    public function show($id)
    {
        $cash_receipt = CashReceipt::find($id);
        $title = 'Ver Recibo de Caja #' . $cash_receipt->box_number;
        return view('cash_receipts.show', compact('cash_receipt', 'title'));
    }

    public function edit(CashReceipt $cash_receipt)
    {
        $title = 'Editar Recibo de Caja #' . $cash_receipt->box_number;
        return view('cash_receipts.edit', compact('cash_receipt', 'title'));
    }

    public function update(Request $request, CashReceipt $cash_receipt)
    {
        $request->validate([
            'box_number'       => 'required|alpha_dash|unique:cash_receipts,box_number,'.$cash_receipt->id.',id',
            'we_received'      => 'required|max:255',
            'address'          => 'required|max:255',
            'city'             => 'required|max:255',
            'document_type'    => 'required',
            'date'             => 'required|date_format:Y-m-d',
            'value'            => 'required|max:255',
            'value_in_letters' => 'required|max:255',
            'description'      => 'required'
        ]);

        $cash_receipt->update($request->all());
        
        return redirect()->route('cash_receipts.index')->with('success', 'El recibo de caja #' . $cash_receipt->box_number . ' fue actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $cash_receipt = CashReceipt::find($id);
        $cash_receipt->delete();

        return redirect()->route('cash_receipts.index')->with('success', 'El recibo de caja #' . $cash_receipt->box_number . ' fue eliminado exitosamente.');
    }
}
