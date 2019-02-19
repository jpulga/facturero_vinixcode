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
            'invoice_number' => 'required|alpha_dash|unique:invoices',
            'client' => 'required|max:255',
            'date' => 'required|date_format:Y-m-d',
            'expiration_date' => 'required|date_format:Y-m-d',
            'document_type' => 'required',
            'document_number' => 'max:255',
            'address' => 'required|max:255',
            'currency' => 'required|max:3',
            'state' => 'required|max:255',
            'notes' => 'required',
            'discount' => 'required|numeric|min:0',
            'products.0.name' => 'required|max:255',
            'products.0.price' => 'required|numeric|min:1',
            'products.0.qty' => 'required|numeric|min:1',
            'products.*.name' => 'required|max:255',
            'products.*.price' => 'required|numeric|min:1',
            'products.*.qty' => 'required|numeric|min:1'
        ]);

        $products = collect($request->products)->transform(function($product) {
            $product['total'] = $product['qty'] * $product['price'];
            return new InvoiceProduct($product);
        });

        $data = $request->except('products');
        $data['sub_total'] = $products->sum('total');
        $data['grand_total'] = $data['sub_total'] - $data['discount'];

        $invoice = Invoice::create($data);

        $invoice->products()->saveMany($products);

        return redirect()->route('invoices.index')->with('success', 'La factura #' . $invoice->invoice_number . ' fue creada exitosamente.');
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
            'client' => 'required|max:255',
            'date' => 'required|date_format:Y-m-d',
            'expiration_date' => 'required|date_format:Y-m-d',
            'document_type' => 'required',
            'document_number' => 'max:255',
            'address' => 'required|max:255',
            'currency' => 'required|max:3',
            'state' => 'required|max:255',
            'notes' => 'required',
            'discount' => 'required|numeric|min:0',
            'products.0.name' => 'required|max:255',
            'products.0.price' => 'required|numeric|min:1',
            'products.0.qty' => 'required|numeric|min:1',
            'products.*.name' => 'required|max:255',
            'products.*.price' => 'required|numeric|min:1',
            'products.*.qty' => 'required|numeric|min:1'
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

        $invoice->products()->saveMany($products);

        return redirect()->route('invoices.index')->with('success', 'La factura #' . $invoice->invoice_number . ' fue actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);

        InvoiceProduct::where('invoice_id', $invoice->id)
            ->delete();

        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'La factura #' . $invoice->invoice_number . ' fue eliminada exitosamente.');
   }
}
