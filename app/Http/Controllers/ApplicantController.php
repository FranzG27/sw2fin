<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreApplicantRequest;
use App\Http\Requests\UpdateApplicantRequest;

class ApplicantController extends Controller
{
  //============ CRUD Gestionar Solicitante===============

   public function indexApplicantView(){
       $patients=Applicant::all();
       return view('Users.gestionar_solicitante.index',compact('patients'));
   }


   public function crearApplicantView(){

     return view('Users.gestionar_solicitante.create');
       
   }


   public function crearApplicant(Request $request){

       $data=$request->validate([
           'fullName' => ['required'],
           'ci'=>['required'],
           'birthdate'=>['required'],
           'cellphone'=>['required'],
       ]);

       Applicant::create($data);
       return redirect()->route('users.applicants.index');
   }


   public function editarApplicantView(Applicant $applicant){

        return view('Users.gestionar_solicitante.edit',compact('applicant'));
   }


   public function ediatarApplicant(Applicant $applicant,Request $request){

        $data=$request->validate([
            'fullName' => ['required'],
            'ci'=>['required'],
            'birthdate'=>['required'],
            'cellphone'=>['required'],
        ]);

       $applicant->update($data);
       return redirect()->route('users.applicants.index');

   }



   public function eliminarApplicant(Applicant $applicant){
       //dd($usuario->id);
        $applicant->delete();
        return redirect()->route('users.applicants.index'); 
   }

   //============ Fin CRUD Gestionar Solicitante============
}
