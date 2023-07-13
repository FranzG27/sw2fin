<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Http\Requests\StoreBloodTypeRequest;
use App\Http\Requests\UpdateBloodTypeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloodTypeController extends Controller
{
     //============ CRUD Gestionar Tipo de Sangre===============

   public function indexTypeView(){
        $types=BloodType::all();
        return view('Users.gestionar_tipo_sangre.index',compact('types'));
   }


   public function crearTypeView(){

       $usuario=User::findOrFail(Auth::user()->id);

       if($usuario->isAdmin==true){
           return view('Users.gestionar_tipo_sangre.create');
       }
       return view('Users.error');
   }


   public function crearType(Request $request){

       $data=$request->validate([
           'name' => ['required'],
       ]);
    
       BloodType::create($data);
       return redirect()->route('users.types.index');
   }


   public function editarTypeView(BloodType $type){

       $usuario=User::findOrFail(Auth::user()->id);

       if($usuario->isAdmin==true){
           return view('Users.gestionar_tipo_sangre.edit',compact('type'));
       }

       return view('Users.error');
   }


   public function ediatarType(BloodType $type,Request $request){

       $data=$request->validate([
           'name' => ['required'],
       ]);

       $type->update($data);
       return redirect()->route('users.types.index');

   }



   public function eliminarType(BloodType $type){
       //dd($usuario->id);
       $usuario=User::findOrFail(Auth::user()->id);
       if($usuario->isAdmin==true){
           $type->delete();
           return redirect()->route('users.types.index');
       }
     return view('Users.error');
       
   }

   //============ Fin CRUD Gestionar Tipo de Sangre============
}
