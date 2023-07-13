<?php

namespace App\Http\Controllers;

use App\Models\LoanStatus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLoanStatusRequest;
use App\Http\Requests\UpdateLoanStatusRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoanStatusController extends Controller
{
     //============ CRUD Gestionar Tipo de Sangre===============

   public function indexStatusView(){
        $statuses=LoanStatus::all();
        return view('Users.gestionar_estados_prestamo.index',compact('statuses'));
   }


    public function crearStatusView(){

        $usuario=User::findOrFail(Auth::user()->id);

        if($usuario->isAdmin==true){
            return view('Users.gestionar_estados_prestamo.create');
        }
        return view('Users.error');
    }


    public function crearStatus(Request $request){

        $data=$request->validate([
            'name' => ['required'],
        ]);

        LoanStatus::create($data);
        return redirect()->route('users.status.index');
    }


    public function editarStatusView(LoanStatus $status){

        $usuario=User::findOrFail(Auth::user()->id);

        if($usuario->isAdmin==true){
            return view('Users.gestionar_estados_prestamo.edit',compact('status'));
        }

        return view('Users.error');
    }


    public function ediatarStatus(LoanStatus $status,Request $request){

        $data=$request->validate([
            'name' => ['required'],
        ]);

        $status->update($data);
        return redirect()->route('users.status.index');

    }



    public function eliminarStatus(LoanStatus $status){
        //dd($usuario->id);
        $usuario=User::findOrFail(Auth::user()->id);
        if($usuario->isAdmin==true){
            $status->delete();
            return redirect()->route('users.status.index');
        }
        return view('Users.error');
    
    }

//============ Fin CRUD Gestionar Tipo de Sangre============
}
