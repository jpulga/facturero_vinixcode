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
        $title = 'Egresos';
        return view('egresses.index', compact('egresses', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = \DB::table('egresses')->select('exit_number')->limit(1)->orderBy('exit_number', 'desc')->value('exit_number');
        $title = 'Crear Egreso';
        return view('egresses.create', compact('count', 'title'));
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
        $title = 'Ver Egreso #' . $egress->exit_number;
        return view('egresses.show', compact('egress', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Egress  $egress
     * @return \Illuminate\Http\Response
     */
    public function edit(Egress $egress)
    {
        $title = 'Editar Egreso #' . $egress->exit_number;
        return view('egresses.edit', compact('egress', 'title'));
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

    public function duplicate(Egress $egress) {
        $count = \DB::table('egresses')->select('exit_number')->limit(1)->orderBy('exit_number', 'desc')->value('exit_number');
        
        $data = $egress->toArray();
        $data['exit_number'] = $count + 1;
        $new_egress = Egress::create($data);

        return redirect()->route('egresses.index')->with('success', 'El egreso #' . $egress->exit_number . ' ha sido duplicado exitosamente.');
    }
}
