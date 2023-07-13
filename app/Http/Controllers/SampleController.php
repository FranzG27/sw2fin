<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSampleRequest;
use App\Http\Requests\UpdateSampleRequest;
use App\Models\BloodInventory;
use App\Models\BloodType;
use App\Models\Donor;
use App\Models\ReturnFile;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\TrueType;

class SampleController extends Controller
{
    //============ CRUD Gestionar Ficha de Prestamo===============

   public function indexSampleFullView(){
    $samples=Sample::all();
    return view('Users.gestionar_muestras.indexFull',compact('samples'));
    }


    public function indexSampleView(Donor $donor){

        $samples=DB::table('samples')
                    ->where('id_donor', '=', $donor->id)
                    ->orderBy('date','asc')
                    ->get();

        return view('Users.gestionar_muestras.index',compact('samples','donor'));
    }


    public function crearSampleView(){

        $types=BloodType::all();
        $donors=Donor::all();
        $files=ReturnFile::all();
        return view('Users.gestionar_muestras.create',compact('types','donors','files'));
    }


    public function crearSample(Request $request){

        $data=$request->validate([
            'date' => ['required'],
            'isAccepted'=>['required'],
            'id_donor'=>['required'],
            'id_type'=>['required'],
            'id_returnFile'=>['required'],
        ]);

        $isAccepted=$request->input('isAccepted');
        $valorPatien=$request->input('id_returnFile');

        if($isAccepted=='1'){
            $data['isAccepted']=True;
        }else{
            $data['isAccepted']=false;
        }

        if($valorPatien=='-1'){
            $data['id_returnFile']=null;
        }else{
            $data['id_returnFile']=$valorPatien;
        }
        $idSample=Sample::create($data);
        
        if($isAccepted=='1'){
            if($valorPatien == '-1'){
                //aumentar en el inventario gral
                $invetory=BloodInventory::where('id_bloodType',$idSample->id_type)
                                          ->first();

                $invetory->quantity=$invetory->quantity+1;
                $invetory->save();
            }else{
                //descontar la deuda del paciende(ficha de devolucion)
                $returnFile=ReturnFile::where('id',$idSample->id_returnFile)
                                         ->first();

                $returnFile->debt= $returnFile->debt-1;
                $returnFile->save();
            } 
        }        

        return redirect()->route('users.samples.indexFull');
    }


    public function indexReturnFileView(Sample $sample){
        $filesReturn=DB::table('return_files')
                        ->where('id', '=', $sample->id_returnFile)
                        ->get();

        return view('Users.gestionar_muestras.returnFileIndex',compact('filesReturn'));

    }



    public function eliminarSample(Sample $sample){
        //dd($usuario->id);

        $sample->delete();
        return redirect()->route('users.samples.indexFull');
    }

    //============ Fin CRUD Gestionar Ficha de Prestamo============
}
