<?php

namespace App\Http\Controllers;

use App\Models\LoanFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLoanFileRequest;
use App\Http\Requests\UpdateLoanFileRequest;
use App\Models\Applicant;
use App\Models\LoanStatus;
use App\Models\ReturnFile;
use Illuminate\Support\Facades\DB;

class LoanFileController extends Controller
{
   //============ CRUD Gestionar Ficha de Prestamo===============

   public function indexLoanFileFullView(){
        $files=LoanFile::all();
        return view('Users.gestionar_FichaPrestamo.indexFull',compact('files'));
   }


   public function indexLoanFileView(Applicant $patient){

        $files=DB::table('loan_files')
                    ->where('id_applicant', '=', $patient->id)
                    ->orderBy('accidentDate','asc')
                    ->get();

        return view('Users.gestionar_FichaPrestamo.index',compact('files','patient'));
    }


    public function crearLoanFileView(Applicant $patient){

        $statuses=LoanStatus::all();
        return view('Users.gestionar_FichaPrestamo.create',compact('patient','statuses'));
    }


    public function crearLoanFile(Applicant $patient, Request $request){

        $data=$request->validate([
            'accidentDate' => ['required'],
            'nameHospital'=>['required'],
            'nameDoctor'=>['required'],
            'description'=>['required'],
            'quantity'=>['required'],
            'id_status'=>['required'],
        ]);

        $data['id_applicant']=$patient->id;

        $idLoanFile=LoanFile::create($data);

        $dataReturnFile=[
            'startDate' => $request->accidentDate,
            'endDate' => $request->accidentDate,
            'debt' => $request->quantity,
            'id_loanFile' => $idLoanFile->id,
        ];

        ReturnFile::create($dataReturnFile);

        return redirect()->route('users.loanFiles.index',compact('patient'));
    }


    public function editarLoanFileView(LoanFile $file){

        $statuses=LoanStatus::all();
        return view('Users.gestionar_FichaPrestamo.edit',compact('file','statuses'));
    }


    public function ediatarLoanFile(LoanFile $file,Request $request){

        $data=$request->validate([
            'accidentDate' => ['required'],
            'nameHospital'=>['required'],
            'nameDoctor'=>['required'],
            'description'=>['required'],
            'quantity'=>['required'],
            'id_status'=>['required'],
        ]);

        $patientObject=DB::table('applicants')
                    ->where('id', '=', $file->id_applicant)
                    ->first();
        $patient=$patientObject->id;

        $file->update($data);
        return redirect()->route('users.loanFiles.index',compact('patient'));

    }



    public function eliminarLoanFile(LoanFile $file){
        //dd($usuario->id);
        $patientObject=DB::table('applicants')
        ->where('id', '=', $file->id_applicant)
        ->first();
        $patient=$patientObject->id;

        $file->delete();
        return redirect()->route('users.loanFiles.index',compact('patient'));
    }

//============ Fin CRUD Gestionar Ficha de Prestamo============
}
