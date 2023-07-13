<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
       $this->middleware('guest:user');
    }


    public function loginView(){
        return view('Users.auth.login');
    }


    public function login(Request $request){
        $validate=$request->validate([
            'email'=>['required'],
            'password'=>['required'],
        ]);

        $organizador=User::where('email',$request->email)->first();

        if(is_null($organizador)){
            return back()->withErrors(['error'=>'El Usuario no existe!']);
        }

        if(Auth::guard('user')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('users.menu.view');
        }

        return back()->withErrors(['error'=>'El password es incorrecto']);
    }

    
    public function menuView(){

        return view('Users.index');
    }

    //============ CRUD Gestionar Usuario===============

    public function indexUsuarioView(){
         $users=User::all();
        return view('Users.gestionar_usuarios.index',compact('users'));
    }


    public function crearUsuarioView(){

        $usuario=User::findOrFail(Auth::user()->id);

        if($usuario->isAdmin==true){
            return view('Users.gestionar_usuarios.create');
        }
        return view('Users.error');
    }


    public function crearUsuario(Request $request){

        $data=$request->validate([
            'name' => ['required'],
            'email'=>['required'],
            'password'=>['required'],
            'isAdmin'=>['required'],
        ]);
        $data['password']=Hash::make($request->password); 

        $isAdmin=$request->input('isAdmin');
        //dd($isAdmin);
        if($isAdmin == "1"){
            $data['isAdmin']=true;
        }else{
            $data['isAdmin']=false;
        }

        User::create($data);
        return redirect()->route('users.usuarios.index');
    }


    public function editarUsuarioView(User $usuario){

        $usuarioIsAdmin=User::findOrFail(Auth::user()->id);

        if($usuarioIsAdmin->isAdmin==true){
            return view('Users.gestionar_usuarios.edit',compact('usuario'));
        }

        return view('Users.error');
    }


    public function ediatarUsuario(User $usuario,Request $request){

        $data=$request->validate([
            'name' => ['required'],
            'email'=>['required'],
            'isAdmin'=>['required'],
        ]);

        $isAdmin=$request->input('isAdmin');
        
        if($isAdmin == "1"){
            $data['isAdmin']=true;
        }else{
            $data['isAdmin']=false;
        }

        $usuario->update($data);
        return redirect()->route('users.usuarios.index');

    }



    public function eliminarUsuario(User $usuario){
        //dd($usuario->id);
        $usuarioIsAdmin=User::findOrFail(Auth::user()->id);
        if($usuarioIsAdmin->isAdmin==true){
            $usuario->delete();
            return redirect()->route('users.usuarios.index');
        }
      return view('Users.error');
        
    }

    //============ Fin CRUD Gestionar Usuario============


    public function logout(){
        Auth::guard('user')->logout();
        return redirect()->route('index');
    }
}
