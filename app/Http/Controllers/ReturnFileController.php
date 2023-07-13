<?php

namespace App\Http\Controllers;

use App\Models\ReturnFile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReturnFileRequest;
use App\Http\Requests\UpdateReturnFileRequest;
use App\Models\LoanFile;
use Illuminate\Support\Facades\DB;

class ReturnFileController extends Controller
{
    //============ CRUD Gestionar Ficha de Devolucion===============

   public function indexReturnFileFullView(){
    $filesReturn=ReturnFile::all();
    return view('Users.gestionar_FichaDevolucion.indexFull',compact('filesReturn'));
   }


    public function indexReturnFileView(LoanFile $fileLoan){

        $filesReturn=DB::table('return_files')
                    ->where('id_loanFile', '=', $fileLoan->id)
                    ->get();

        return view('Users.gestionar_FichaDevolucion.index',compact('filesReturn','fileLoan'));
    }   


    public function editarReturnFileView(ReturnFile $fileReturn){

        return view('Users.gestionar_FichaDevolucion.edit',compact('fileReturn'));
    }


    public function ediatarReturnFile(ReturnFile $fileReturn,Request $request){

        $data=$request->validate([
            'startDate' => ['required'],
            'endDate'=>['required'],
            'debt'=>['required'],
            'isCanceled'=>['required'],
        ]);

        $isCanceled=$request->input('isCanceled');

        if($isCanceled == "2"){
            $data['isCanceled']=true;
        }else{
            $data['isCanceled']=false;
        }

        $loanFileObject=DB::table('loan_files')
                    ->where('id', '=', $fileReturn->id_loanFile)
                    ->first();
        $fileLoan=$loanFileObject->id;

        $fileReturn->update($data);
        return redirect()->route('users.returnFiles.index',compact('fileLoan'));
    }

    //============ Fin CRUD Gestionar Ficha de Devolucion ============
}
