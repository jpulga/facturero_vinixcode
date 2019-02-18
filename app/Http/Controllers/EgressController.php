<?php

namespace App\Http\Controllers;

use App\Egress;
use Illuminate\Http\Request;

class EgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $egresses = Egress::turned($request->get('Girado'))->orderBy('id', 'DESC')->paginate(20);
        return view('egresses.index', compact('egresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('egresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'exit_number'      => 'required',
            'turned'           => 'required',
            'document_type'    => 'required',
            'document_number'  => 'required',
            'date'             => 'required',
            'value'            => 'required',
            'value_in_letters' => 'required',
            'description'      => 'required'
        ]);

        $datos = $request->all();
        Egress::create($datos);

        return redirect()->route('egresses.index')
                        ->with('success', 'Se creo el egreso satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Egress  $egress
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $egress = Egress::find($id);
        return view('egresses.show', compact('egress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Egress  $egress
     * @return \Illuminate\Http\Response
     */
    public function edit(Egress $egress)
    {
        return view('egresses.edit', compact('egress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Egress  $egress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Egress $egress)
    {
        $request->validate([
            'exit_number'      => 'required',
            'turned'           => 'required',
            'document_type'    => 'required',
            'document_number'  => 'required',
            'date'             => 'required',
            'value'            => 'required',
            'value_in_letters' => 'required',
            'description'      => 'required'
        ]);

        $egress->update($request->all());
        return redirect()->route('egresses.index')
                        ->with('success', 'Se actualizo el egreso satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Egress  $egress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egress $egress)
    {
        //
    }
}
