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

    //=========================================================
}