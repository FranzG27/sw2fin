<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\LoanFile;
use App\Models\BloodType;
use App\Models\ReturnFile;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Form1Controller;
use App\Http\Controllers\Form2Controller;
use App\Http\Requests\StoreMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;

class MedicalRecordController extends Controller
{
    //==================GESTIONAR FICHA MEDICA================

    public function indexFichaView(){
        $donador=Donor::findOrFail(Auth::user()->id);

        $files=DB::table('medical_records')
                    ->where('id_donor', '=', $donador->id)
                    ->get();

        return view('Donor.gestionarFichaMedica.index',compact('files'));
    }


    public function crearFichaView(){

        return view('Donor.gestionarFichaMedica.create');
    }


    public function crearFicha(Request $request){

        $data=$request->validate([
            'date' => ['required'],
            'isAccepted'=>['required'],
        ]);

        $isAccepted=$request->input('isAccepted');
        $donador=Donor::findOrFail(Auth::user()->id);

        if($isAccepted=='1'){
            $data['isAccepted']=True;

            
        }else{
            $data['isAccepted']=false;
        }
        $data['id_donor']=$donador->id;


        
         
        MedicalRecord::create($data);
        return redirect()->route('donors.fichas.index');
    }

    public function editFichaView($id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);
        $form1 = $medicalRecord->form1 ?? null;
        $form2 = $medicalRecord->form2 ?? null;

        return view('Donor.gestionarFichaMedica.edit', compact('medicalRecord', 'form1', 'form2'));
    }

    public function updateFicha(Request $request, $id)
{
    // $data = $request->validate([
    //     // Validate the fields that are required for MedicalRecord
    //     'date' => ['required'],
    //     'isAccepted' => ['required'],

    //     // Validate the fields that are required for Form1
    //     'ci' => ['required'],
    //     'departamento' => ['required'],
    //     'domicilio' => ['required'],
    //     'edad' => ['required'],
    //     'email' => ['required'],
    //     'estadoCivil' => ['required'],
    //     'fecha' => ['required'],
    //     'gradoInstruccion' => ['required'],
    //     'hora' => ['required'],
    //     'lugarTrabajo' => ['required'],
    //     'fechaNacimiento' => ['required'],
    //     'nombreCompleto' => ['required'],
    //     'ocupacion' => ['required'],
    //     'procendencia' => ['required'],
    //     'profesion' => ['required'],
    //     'sexo' => ['required'],
    //     'telefono' => ['required'],
    //     'telefonoEmergencia' => ['required'],
    //     'tipoDonacion' => ['required'],
    //     'zona' => ['required'],

    //     // Validate the fields that are required for Form2
    //     'alergia' => ['required'],
    //     'bloodDisease' => ['required'],
    //     'cambioPareja' => ['required'],
    //     'carcel' => ['required'],
    //     'chagas' => ['required'],
    //     'chagasFamiliar' => ['required'],
    //     'cold' => ['required'],
    //     'contagioEnfermedad' => ['required'],
    //     'convulsiones' => ['required'],
    //     'dental' => ['required'],
    //     'drogas' => ['required'],
    //     'embarazo' => ['required'],
    //     'estadoAnimo' => ['required'],
    //     'ets' => ['required'],
    //     'etsdisease' => ['nullable'], // Make etsdisease nullable (not required)
    //     'fiebre' => ['required'],
    //     'heartDisease' => ['required'],
    //     'hepatitis' => ['required'],
    //     'longTreatment' => ['required'],
    //     'malaria' => ['required'],
    //     'medicacion' => ['required'],
    //     'motivo' => ['required'],
    //     'motivoPrueba' => ['required'],
    //     'nuevo' => ['required'],
    //     'pulmon' => ['required'],
    //     'rechazadoS' => ['required'],
    //     'recentMedication' => ['required'],
    //     'sida' => ['required'],
    //     'sidaContagio' => ['required'],
    //     'sidaPrueba' => ['required'],
    //     'sifilis' => ['required'],
    //     'tatuaje' => ['required'],
    //     'tos' => ['required'],
    //     'transfusion' => ['required'],
    //     'vacuna' => ['required'],
    //     'vinchuca' => ['required'],
    // ]);

    $data = $request->validate([
        // Validate the fields that are required for MedicalRecord
        'date' => ['nullable'],
        'isAccepted' => ['nullable'],
        
    
        // Validate the fields that are required for Form1
        'ci' => ['nullable'],
        'departamento' => ['nullable'],
        'domicilio' => ['nullable'],
        'edad' => ['nullable'],
        'email' => ['nullable'],
        'estadoCivil' => ['nullable'],
        'fecha' => ['nullable'],
        'gradoInstruccion' => ['nullable'],
        //'hora' => ['nullable'],
        'lugarTrabajo' => ['nullable'],
        'fechaNacimiento' => ['nullable'],
        'nombreCompleto' => ['nullable'],
        'ocupacion' => ['nullable'],
        'procendencia' => ['nullable'],
        'profesion' => ['nullable'],
        'sexo' => ['nullable'],
        'telefono' => ['nullable'],
        'telefonoEmergencia' => ['nullable'],
        'tipoDonacion' => ['nullable'],
        'zona' => ['nullable'],
    
        // Validate the fields that are required for Form2
        'alergia' => ['nullable'],
        'bloodDisease' => ['nullable'],
        'cambioPareja' => ['nullable'],
        'carcel' => ['nullable'],
        'chagas' => ['nullable'],
        'chagasFamiliar' => ['nullable'],
        'cold' => ['nullable'],
        'contagioEnfermedad' => ['nullable'],
        'convulsiones' => ['nullable'],
        'dental' => ['nullable'],
        'drogas' => ['nullable'],
        'embarazo' => ['nullable'],
        'estadoAnimo' => ['nullable'],
        'ets' => ['nullable'],
        'etsdisease' => ['nullable'], // Make etsdisease nullable (not required)
        'fiebre' => ['nullable'],
        'heartDisease' => ['nullable'],
        'hepatitis' => ['nullable'],
        'longTreatment' => ['nullable'],
        'malaria' => ['nullable'],
        'medicacion' => ['nullable'],
        'motivo' => ['nullable'],
        'motivoPrueba' => ['nullable'],
        'nuevo' => ['nullable'],
        'pulmon' => ['nullable'],
        'rechazadoS' => ['nullable'],
        'recentMedication' => ['nullable'],
        'sida' => ['nullable'],
        'sidaContagio' => ['nullable'],
        'sidaPrueba' => ['nullable'],
        'sifilis' => ['nullable'],
        'tatuaje' => ['nullable'],
        'tos' => ['nullable'],
        'transfusion' => ['nullable'],
        'vacuna' => ['nullable'],
        'vinchuca' => ['nullable'],
    ]);

    $medicalRecord = MedicalRecord::findOrFail($id);
    $medicalRecord->update($data);

    // Get the existing medical record
    $medicalRecord = MedicalRecord::findOrFail($id);

    // Set the 'id_donor' value from the authenticated user
    $data['id_donor'] = Auth::user()->id;

    // Update the medical record
    $medicalRecord->update($data);

    // Create or update Form1 and Form2 records
    $medicalRecord->form1()->updateOrCreate(['id' => $medicalRecord->id], $data);
    $medicalRecord->form2()->updateOrCreate(['id' => $medicalRecord->id], $data);


    

    return redirect()->route('donors.fichas.index')->with('success', 'Ficha médica actualizada exitosamente.');
}

    //=========================================================
}