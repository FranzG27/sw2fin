<?php

namespace App\Http\Controllers;

use App\Models\Form1;
use Illuminate\Http\Request;

class Form1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form1s = Form1::all();

        return response()->json($form1s);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'ci' => 'required|string',
            'departamento' => 'required|string',
            'domicilio' => 'required|string',
            'edad' => 'required|integer',
            'email' => 'required|string',
            'estadoCivil' => 'required|string',
            'fecha' => 'required|date',
            'gradoInstruccion' => 'required|string',
            'hora' => 'required|time',
            'lugarTrabajo' => 'required|string',
            'fechaNacimiento' => 'required|date',
            'nombreCompleto' => 'required|string',
            'ocupacion' => 'required|string',
            'procendencia' => 'required|string',
            'profesion' => 'required|string',
            'sexo' => 'required|string',
            'telefono' => 'required|string',
            'telefonoEmergencia' => 'required|string',
            'tipoDonacion' => 'required|string',
            'zona' => 'required|string',
        ]);

        $form1 = Form1::create($data);

        return response()->json($form1, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form1 = Form1::findOrFail($id);

        return response()->json($form1);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form1 = Form1::findOrFail($id);

        $data = $request->validate([
            'ci' => 'required|string',
            'departamento' => 'required|string',
            'domicilio' => 'required|string',
            'edad' => 'required|integer',
            'email' => 'required|string',
            'estadoCivil' => 'required|string',
            'fecha' => 'required|date',
            'gradoInstruccion' => 'required|string',
            'hora' => 'required|time',
            'lugarTrabajo' => 'required|string',
            'fechaNacimiento' => 'required|date',
            'nombreCompleto' => 'required|string',
            'ocupacion' => 'required|string',
            'procendencia' => 'required|string',
            'profesion' => 'required|string',
            'sexo' => 'required|string',
            'telefono' => 'required|string',
            'telefonoEmergencia' => 'required|string',
            'tipoDonacion' => 'required|string',
            'zona' => 'required|string',
        ]);

        $form1->update($data);

        return response()->json($form1, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form1 = Form1::findOrFail($id);

        $form1->delete();

        return response()->json(null, 204);
    }
}
