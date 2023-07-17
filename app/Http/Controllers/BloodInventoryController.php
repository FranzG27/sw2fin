<?php

namespace App\Http\Controllers;

use App\Models\BloodInventory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBloodInventoryRequest;
use App\Http\Requests\UpdateBloodInventoryRequest;
use App\Models\BloodType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BloodInventoryController extends Controller
{
   //============ CRUD Gestionar Tipo de Sangre===============

   public function indexInventoryView(){
        $inventories=BloodInventory::all();
        return view('Users.gestionar_Inventario.index',compact('inventories'));
   }


    public function crearInventoryView(){

        $usuario=User::findOrFail(Auth::user()->id);
        $types=BloodType::all();

        if($usuario->isAdmin==true){
            return view('Users.gestionar_Inventario.create',compact('types'));
        }
        return view('Users.error');
    }


    public function crearInventory(Request $request){

        $data=$request->validate([
            'id_bloodType' => ['required'],
            'quantity'=>['required'],
        ]);

        BloodInventory::create($data);
        return redirect()->route('users.inventories.index');
    }


    public function editarInventoryView(BloodInventory $inventory){

        $usuario=User::findOrFail(Auth::user()->id);
        $types=BloodType::all();

        if($usuario->isAdmin==true){
            return view('Users.gestionar_Inventario.edit',compact('inventory','types'));
        }

        return view('Users.error');
    }


    public function ediatarInventory(BloodInventory $inventory,Request $request){

        $data=$request->validate([
            'id_bloodType' => ['required'],
            'quantity'=>['required'],
        ]);

        $inventory->update($data);
        return redirect()->route('users.inventories.index');

    }



    public function eliminarInventory(BloodInventory $inventory){
        //dd($usuario->id);
        $usuario=User::findOrFail(Auth::user()->id);
        if($usuario->isAdmin==true){
            $inventory->delete();
            return redirect()->route('users.inventories.index');
        }
        return view('Users.error');
    
    }

    //============ Fin CRUD Gestionar Tipo de Sangre============
}
