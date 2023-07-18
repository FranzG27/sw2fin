<?php

namespace App\Http\Controllers;

use App\Models\Form2;
use Illuminate\Http\Request;

class Form2Controller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form2s = Form2::all();
        return view('form2.index', compact('form2s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearForm2View()
    {
        return view('Donor.form2.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crearForm2(Request $request)
    {
        $form2 = new Form2;
        // Set the form field values from the request
        $form2->alergia = $request->alergia;
        $form2->bloodDisease = $request->bloodDisease;
        $form2->cambioPareja = $request->cambioPareja;
        $form2->carcel = $request->carcel;
        $form2->chagas = $request->chagas;
        $form2->chagasFamiliar = $request->chagasFamiliar;
        $form2->cold = $request->cold;
        $form2->contagioEnfermedad = $request->contagioEnfermedad;
        $form2->convulsiones = $request->convulsiones;
        $form2->dental = $request->dental;
        $form2->drogas = $request->drogas;
        $form2->embarazo = $request->embarazo;
        $form2->estadoAnimo = $request->estadoAnimo;
        $form2->ets = $request->ets;
        $form2->etsdisease = $request->etsdisease;
        $form2->fiebre = $request->fiebre;
        $form2->heartDisease = $request->heartDisease;
        $form2->hepatitis = $request->hepatitis;
        $form2->longTreatment = $request->longTreatment;
        $form2->malaria = $request->malaria;
        $form2->medicacion = $request->medicacion;
        $form2->motivo = $request->motivo;
        $form2->motivoPrueba = $request->motivoPrueba;
        $form2->nuevo = $request->nuevo;
        $form2->pulmon = $request->pulmon;
        $form2->rechazadoS = $request->rechazadoS;
        $form2->recentMedication = $request->recentMedication;
        $form2->sida = $request->sida;
        $form2->sidaContagio = $request->sidaContagio;
        $form2->sidaPrueba = $request->sidaPrueba;
        $form2->sifilis = $request->sifilis;
        $form2->tatuaje = $request->tatuaje;
        $form2->tos = $request->tos;
        $form2->transfusion = $request->transfusion;
        $form2->vacuna = $request->vacuna;
        $form2->vinchuca = $request->vinchuca;

        // Save the form2 object
        $form2->save();

        return redirect()->route('donors.index')->with('success', 'Form2 created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form2  $form2
     * @return \Illuminate\Http\Response
     */
    public function show(Form2 $form2)
    {
        return view('form2.show', compact('form2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form2  $form2
     * @return \Illuminate\Http\Response
     */
    public function edit(Form2 $form2)
    {
        return view('form2.edit', compact('form2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form2  $form2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form2 $form2)
    {
        // Update the form field values from the request
        $form2->alergia = $request->alergia;
        $form2->bloodDisease = $request->bloodDisease;
        $form2->cambioPareja = $request->cambioPareja;
        $form2->carcel = $request->carcel;
        $form2->chagas = $request->chagas;
        $form2->chagasFamiliar = $request->chagasFamiliar;
        $form2->cold = $request->cold;
        $form2->contagioEnfermedad = $request->contagioEnfermedad;
        $form2->convulsiones = $request->convulsiones;
        $form2->dental = $request->dental;
        $form2->drogas = $request->drogas;
        $form2->embarazo = $request->embarazo;
        $form2->estadoAnimo = $request->estadoAnimo;
        $form2->ets = $request->ets;
        $form2->etsdisease = $request->etsdisease;
        $form2->fiebre = $request->fiebre;
        $form2->heartDisease = $request->heartDisease;
        $form2->hepatitis = $request->hepatitis;
        $form2->longTreatment = $request->longTreatment;
        $form2->malaria = $request->malaria;
        $form2->medicacion = $request->medicacion;
        $form2->motivo = $request->motivo;
        $form2->motivoPrueba = $request->motivoPrueba;
        $form2->nuevo = $request->nuevo;
        $form2->pulmon = $request->pulmon;
        $form2->rechazadoS = $request->rechazadoS;
        $form2->recentMedication = $request->recentMedication;
        $form2->sida = $request->sida;
        $form2->sidaContagio = $request->sidaContagio;
        $form2->sidaPrueba = $request->sidaPrueba;
        $form2->sifilis = $request->sifilis;
        $form2->tatuaje = $request->tatuaje;
        $form2->tos = $request->tos;
        $form2->transfusion = $request->transfusion;
        $form2->vacuna = $request->vacuna;
        $form2->vinchuca = $request->vinchuca;

        // Save the updated form2 object
        $form2->save();

        return redirect()->route('form2.index')->with('success', 'Form2 updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form2  $form2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form2 $form2)
    {
        // Delete the form2 object
        $form2->delete();

        return redirect()->route('form2.index')->with('success', 'Form2 deleted successfully.');
    }
}
