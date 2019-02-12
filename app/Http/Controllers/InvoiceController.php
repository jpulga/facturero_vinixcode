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
            'document_type' => 'required|max:255',
            'document_number' => 'required|numeric|min:0',
            'cellphone' => 'required|numeric|min:0',
            'address' => 'required|max:255',
            'state' => 'required|max:255',
            'notes' => 'required|max:1000',
            'discount' => 'required|numeric|min:0',
            'products.*.name' => 'required|max:255',
            'products.*.price' => 'required|numeric|min:1',
            'products.*.qty' => 'required|integer|min:1'
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
            'company_origin' => 'required|max:255',
            'client' => 'required|max:255',
            'date' => 'required|date_format:Y-m-d',
            'expiration_date' => 'required|date_format:Y-m-d',
            'document_type' => 'required|max:255',
            'document_number' => 'required|numeric|min:0',
            'cellphone' => 'required|numeric|min:0',
            'address' => 'required|max:255',
            'state' => 'required|max:255',
            'notes' => 'required|max:1000',
            'discount' => 'required|numeric|min:0',
            'products.*.name' => 'required|max:255',
            'products.*.price' => 'required|numeric|min:1',
            'products.*.qty' => 'required|integer|min:1'
        ]);

        $invoice = Invoice::findOrFail($id);

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

        $invoice->update($data);

        InvoiceProduct::where('invoice_id', $invoice->id)->delete();

        $invoice->products()->saveMany($products);

        return response()
            ->json([
                'updated' => true,
                'id' => $invoice->id
            ]);
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);

        InvoiceProduct::where('invoice_id', $invoice->id)
            ->delete();

        $invoice->delete();

        return back()->with('info', 'La factura fue eliminada.');
   }
}
