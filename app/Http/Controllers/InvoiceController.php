<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Invoice;
use App\InvoiceProduct;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = Invoice::client($request->get('cliente'))->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $count = \DB::table('invoices')->select('invoice_number')->limit(1)->orderBy('invoice_number', 'desc')->value('invoice_number');
        return view('invoices.create', compact('count'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'invoice_number'     => 'required|alpha_dash|unique:invoices',
            'client'             => 'required',
            'date'               => 'required',
            'expiration_date'    => 'required',
            'document_type'      => 'required',
            'document_number'    => 'required',
            'cellphone'          => 'required',
            'address'            => 'required',
            'state'              => 'required',
            'notes'              => 'required',
            'discount'           => 'required',
            'products.*.name'    => 'required',
            'products.*.price'   => 'required',
            'products.*.qty'     => 'required'
        ]);

        $products = collect($request->products)->transform(function($product) {
            $product['total'] = $product['qty'] * $product['price'];
            return new InvoiceProduct($product);
        });

        if($products->isEmpty()) {
            return response()
            ->json([
                'products_empty' => ['One or more Product is required.']
            ], 422);
        }

        $data = $request->except('products');
        $data['sub_total'] = $products->sum('total');
        $data['grand_total'] = $data['sub_total'] - $data['discount'];

        $invoice = Invoice::create($data);

        $invoice->products()->saveMany($products);

        return response()
            ->json([
                'created' => true,
                'id' => $invoice->id
            ]);

        return redirect()->route('invoices.index')
                         ->with('success', 'Tu factura fue creada satisfactoriamente');
    }

    public function show($id)
    {
        $invoice = Invoice::with('products')->findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

    public function edit($id)
    {
        $invoice = Invoice::with('products')->findOrFail($id);
        return view('invoices.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'invoice_number' => 'required|alpha_dash|unique:invoices,invoice_number,'.$id.',id',
            'client'             => 'required',
            'date'               => 'required',
            'expiration_date'    => 'required',
            'document_type'      => 'required',
            'document_number'    => 'required',
            'cellphone'          => 'required',
            'address'            => 'required',
            'state'              => 'required',
            'notes'              => 'required',
            'discount'           => 'required',
            'products.*.name'    => 'required',
            'products.*.price'   => 'required',
            'products.*.qty'     => 'required'
        ]);

        $invoice = Invoice::findOrFail($id);

        $products = collect($request->products)->transform(function($product) {
            $product['total'] = $product['qty'] * $product['price'];
            return new InvoiceProduct($product);
        });

        $data = $request->except('products');
        $data['sub_total'] = $products->sum('total');
        $data['grand_total'] = $data['sub_total'] - $data['discount'];

        $invoice->update($data);

        InvoiceProduct::where('invoice_id', $invoice->id)->delete();

        return redirect()->route('invoices.index')
                        ->with('success', 'La factura fue actualizada');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);

        InvoiceProduct::where('invoice_id', $invoice->id)
            ->delete();

        $invoice->delete();

        return back()->with('success', 'La factura fue eliminada.');
   }
}
