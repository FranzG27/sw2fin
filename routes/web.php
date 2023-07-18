<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\BloodInventoryController;
use App\Http\Controllers\BloodTypeController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\LoanFileController;
use App\Http\Controllers\LoanStatusController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\ReturnFileController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::prefix('users')->group(function(){
    Route::get('/login',[UserController::class,'loginView'])->name('users.login.view')->middleware('guest:user');
    Route::post('/login',[UserController::class,'login'])->name('users.login')->middleware('guest:user');

    Route::middleware(['auth:user'])->group(function(){
        Route::get('/menu',[UserController::class,'menuView'])->name('users.menu.view');
        Route::post('/logout',[UserController::class,'logout'])->name('users.logout');

        //GESTIONAR USUARIOS
        Route::get('/usauriosIndex',[UserController::class,'indexUsuarioView'])->name('users.usuarios.index');
        Route::get('/usauriosCrear',[UserController::class,'crearUsuarioView'])->name('users.usuarios.crearView');
        Route::post('/usauriosCrear',[UserController::class,'crearUsuario'])->name('users.usuarios.crear');
        Route::get('/usauriosEditar/{usuario}',[UserController::class,'editarUsuarioView'])->name('users.usuarios.editarView');
        Route::post('/usauriosEditar/{usuario}',[UserController::class,'ediatarUsuario'])->name('users.usuarios.editar');
        Route::delete('/usauriosEliminar/{usuario}',[UserController::class,'eliminarUsuario'])->name('users.usuarios.eliminar');

        //GESTIONAR TIPO DE SANGRE
        Route::get('/typeIndex',[BloodTypeController::class,'indexTypeView'])->name('users.types.index');
        Route::get('/typeCrear',[BloodTypeController::class,'crearTypeView'])->name('users.type.crearView');
        Route::post('/typeCrear',[BloodTypeController::class,'crearType'])->name('users.type.crear');
        Route::get('/typeEditar/{type}',[BloodTypeController::class,'editarTypeView'])->name('users.type.editarView');
        Route::post('/typeEditar/{type}',[BloodTypeController::class,'ediatarType'])->name('users.type.editar');
        Route::delete('/typeEliminar/{type}',[BloodTypeController::class,'eliminarType'])->name('users.type.eliminar');

        //GESTRIONAR ESTADO DE PRESTAMO
        Route::get('/statuIndex',[LoanStatusController::class,'indexStatusView'])->name('users.status.index');
        Route::get('/statuCrear',[LoanStatusController::class,'crearStatusView'])->name('users.statu.crearView');
        Route::post('/statuCrear',[LoanStatusController::class,'crearStatus'])->name('users.statu.crear');
        Route::get('/statuEditar/{status}',[LoanStatusController::class,'editarStatusView'])->name('users.statu.editarView');
        Route::post('/statuEditar/{status}',[LoanStatusController::class,'ediatarStatus'])->name('users.statu.editar');
        Route::delete('/statuEliminar/{status}',[LoanStatusController::class,'eliminarStatus'])->name('users.statu.eliminar');

        //GESTIONAR SOLICITANTE(PACIENTE)
        Route::get('/applicantIndex',[ApplicantController::class,'indexApplicantView'])->name('users.applicants.index');
        Route::get('/applicantCrear',[ApplicantController::class,'crearApplicantView'])->name('users.applicant.crearView');
        Route::post('/applicantCrear',[ApplicantController::class,'crearApplicant'])->name('users.applicant.crear');
        Route::get('/applicantEditar/{applicant}',[ApplicantController::class,'editarApplicantView'])->name('users.applicant.editarView');
        Route::post('/applicantEditar/{applicant}',[ApplicantController::class,'ediatarApplicant'])->name('users.applicant.editar');
        Route::delete('/applicantEliminar/{applicant}',[ApplicantController::class,'eliminarApplicant'])->name('users.applicant.eliminar');

        //GESTIONAR FICHA DE PRESTAMO
        Route::get('/loanFileIndexAll',[LoanFileController::class,'indexLoanFileFullView'])->name('users.loanFiles.indexFull');
        Route::get('/loanFileIndex/{patient}',[LoanFileController::class,'indexLoanFileView'])->name('users.loanFiles.index');
        Route::get('/loanFileCrear/{patient}',[LoanFileController::class,'crearLoanFileView'])->name('users.loanFile.crearView');
        Route::post('/loanFileCrear/{patient}',[LoanFileController::class,'crearLoanFile'])->name('users.loanFile.crear');
        Route::get('/loanFileEditar/{file}',[LoanFileController::class,'editarLoanFileView'])->name('users.loanFile.editarView');
        Route::post('/loanFileEditar/{file}',[LoanFileController::class,'ediatarLoanFile'])->name('users.loanFile.editar');
        Route::delete('/loanFileEliminar/{file}',[LoanFileController::class,'eliminarLoanFile'])->name('users.loanFile.eliminar');

        //GESTIONAR FICHA DE DEVOLUCION
        Route::get('/returnFileIndexAll',[ReturnFileController::class,'indexReturnFileFullView'])->name('users.returnFiles.indexFull');
        Route::get('/returnFileIndex/{fileLoan}',[ReturnFileController::class,'indexReturnFileView'])->name('users.returnFiles.index');
        Route::get('/returnFileEditar/{fileReturn}',[ReturnFileController::class,'editarReturnFileView'])->name('users.returnFile.editarView');
        Route::post('/returnFileEditar/{fileReturn}',[ReturnFileController::class,'ediatarReturnFile'])->name('users.returnFile.editar');

        //GESTIONAR INVENTARIO DE SANGRE
        Route::get('/inventoryIndex',[BloodInventoryController::class,'indexInventoryView'])->name('users.inventories.index');
        Route::get('/inventoryCrear',[BloodInventoryController::class,'crearInventoryView'])->name('users.inventory.crearView');
        Route::post('/inventoryCrear',[BloodInventoryController::class,'crearInventory'])->name('users.inventory.crear');
        Route::get('/inventoryEditar/{inventory}',[BloodInventoryController::class,'editarInventoryView'])->name('users.inventorye.editarView');
        Route::post('/inventoryEditar/{inventory}',[BloodInventoryController::class,'ediatarInventory'])->name('users.inventory.editar');
        Route::delete('/inventoryEliminar/{inventory}',[BloodInventoryController::class,'eliminarInventory'])->name('users.inventory.eliminar');
       
         //GESTIONAR MUESTRAS DE SANGRE
         Route::get('/sampleIndexAll',[SampleController::class,'indexSampleFullView'])->name('users.samples.indexFull');
         Route::get('/sampleIndex/{donor}',[SampleController::class,'indexSampleView'])->name('users.samples.index');
         Route::get('/sampleCrear',[SampleController::class,'crearSampleView'])->name('users.sample.crearView');
         Route::post('/sampleCrear',[SampleController::class,'crearSample'])->name('users.sample.crear');
         Route::get('/returnFileIndex/{sample}',[SampleController::class,'indexReturnFileView'])->name('users.sample.returnFileView');
         Route::delete('/sampleEliminar/{sample}',[SampleController::class,'eliminarSample'])->name('users.sample.eliminar');
        
    });
});


Route::prefix('donors')->group(function(){
    Route::get('/index', [DonorController::class, 'index'])->name('donors.index');
    Route::get('/login',[DonorController::class,'loginView'])->name('donors.login.view')->middleware('guest:donor');
    Route::post('/login',[DonorController::class,'login'])->name('donors.login')->middleware('guest:donor');
    Route::get('/register',[DonorController::class,'registerView'])->name('donors.register.view');
    Route::post('/register',[DonorController::class,'register'])->name('donors.register');

    Route::middleware(['auth:donor'])->group(function(){
        Route::get('/menu',[DonorController::class,'menuView'])->name('donors.menu.view');
        Route::post('/logout',[DonorController::class,'logout'])->name('donors.logout');

        Route::get('/edit/{donor}', [DonorController::class, 'edit'])->name('donors.edit');
        Route::put('/update/{donor}', [DonorController::class, 'update'])->name('donors.update');
        Route::delete('/destroy/{donor}', [DonorController::class, 'destroy'])->name('donors.destroy');
        //gestionar las fichas medicas
        Route::get('/fichaIndex',[MedicalRecordController::class,'indexFichaView'])->name('donors.fichas.index');
        Route::get('/fichaCrear',[MedicalRecordController::class,'crearFichaView'])->name('donors.fichaCrear.view');
        Route::post('/fichaCrear',[MedicalRecordController::class,'crearFicha'])->name('donors.fichaCrear');

        //gestionar form2
        Route::get('/form2/create', [Form2Controller::class, 'crearForm2View'])->name('donors.form2crear.view');
        Route::post('/form2', [Form2Controller::class, 'crearForm2'])->name('donors.form2crear');

    });
});