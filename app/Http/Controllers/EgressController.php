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
        $count = \DB::table('egresses')->select('exit_number')->limit(1)->orderBy('exit_number', 'desc')->value('exit_number');
        return view('egresses.create', compact('count'));
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
            'exit_number'      => 'required|alpha_dash|unique:egresses',
            'turned'           => 'required|max:255',
            'document_type'    => 'required',
            'date'             => 'required|date_format:Y-m-d',
            'value'            => 'required|max:255',
            'value_in_letters' => 'required|max:255',
            'description'      => 'required'
        ]);

        $datos = $request->all();
        $egress = Egress::create($datos);

        return redirect()->route('egresses.index')->with('success', 'El egreso #' . $egress->exit_number . ' fue creado exitosamente.');
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
            'exit_number'      => 'required|alpha_dash|unique:egresses,exit_number,'.$egress->id.',id',
            'turned'           => 'required|max:255',
            'document_type'    => 'required',
            'date'             => 'required|date_format:Y-m-d',
            'value'            => 'required|max:255',
            'value_in_letters' => 'required|max:255',
            'description'      => 'required'
        ]);

        $egress->update($request->all());
        return redirect()->route('egresses.index')->with('success', 'El egreso #' . $egress->exit_number . ' fue actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Egress  $egress
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $egress = Egress::find($id);
        $egress->delete();

        return redirect()->route('egresses.index')->with('success', 'El egreso #' . $egress->exit_number . ' fue eliminado exitosamente.');
    }
}
