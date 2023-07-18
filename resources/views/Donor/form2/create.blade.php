@extends('templates.dashboard')
@section('contenido')
@if ($errors->any())
<div class="alert alert-primary">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<h1>Create Form2</h1>
<div class="bg-secondary rounded h-100 p-4">
    <form method="POST" action="{{route('donors.form2crear')}}">
        @csrf
        @method('POST')

        <div class="row mb-3">
            <label for="inputAlergia" class="col-sm-2 col-form-label">Alergia</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputAlergia" name="alergia" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputBloodDisease" class="col-sm-2 col-form-label">Blood Disease</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputBloodDisease" name="bloodDisease" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputCambioPareja" class="col-sm-2 col-form-label">Cambio Pareja</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputCambioPareja" name="cambioPareja" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputCarcel" class="col-sm-2 col-form-label">Carcel</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputCarcel" name="carcel" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputChagas" class="col-sm-2 col-form-label">Chagas</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputChagas" name="chagas" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputChagasFamiliar" class="col-sm-2 col-form-label">Chagas Familiar</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputChagasFamiliar" name="chagasFamiliar" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputCold" class="col-sm-2 col-form-label">Cold</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputCold" name="cold" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputContagioEnfermedad" class="col-sm-2 col-form-label">Contagio Enfermedad</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputContagioEnfermedad" name="contagioEnfermedad" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputConvulsiones" class="col-sm-2 col-form-label">Convulsiones</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputConvulsiones" name="convulsiones" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputDental" class="col-sm-2 col-form-label">Dental</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputDental" name="dental" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputDrogas" class="col-sm-2 col-form-label">Drogas</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputDrogas" name="drogas" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmbarazo" class="col-sm-2 col-form-label">Embarazo</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputEmbarazo" name="embarazo" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEstadoAnimo" class="col-sm-2 col-form-label">Estado Animo</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputEstadoAnimo" name="estadoAnimo" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEts" class="col-sm-2 col-form-label">ETS</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputEts" name="ets" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEtsDisease" class="col-sm-2 col-form-label">ETS Disease</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputEtsDisease" name="etsdisease" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputFiebre" class="col-sm-2 col-form-label">Fiebre</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputFiebre" name="fiebre" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputHeartDisease" class="col-sm-2 col-form-label">Heart Disease</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputHeartDisease" name="heartDisease" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputHepatitis" class="col-sm-2 col-form-label">Hepatitis</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputHepatitis" name="hepatitis" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputLongTreatment" class="col-sm-2 col-form-label">Long Treatment</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputLongTreatment" name="longTreatment" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputMalaria" class="col-sm-2 col-form-label">Malaria</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputMalaria" name="malaria" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputMedicacion" class="col-sm-2 col-form-label">Medicacion</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputMedicacion" name="medicacion" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputMotivo" class="col-sm-2 col-form-label">Motivo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputMotivo" name="motivo">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputMotivoPrueba" class="col-sm-2 col-form-label">Motivo Prueba</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputMotivoPrueba" name="motivoPrueba" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputNuevo" class="col-sm-2 col-form-label">Nuevo</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputNuevo" name="nuevo" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPulmon" class="col-sm-2 col-form-label">Pulmon</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputPulmon" name="pulmon" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputRechazadoS" class="col-sm-2 col-form-label">RechazadoS</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputRechazadoS" name="rechazadoS" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputRecentMedication" class="col-sm-2 col-form-label">Recent Medication</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputRecentMedication" name="recentMedication" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputSida" class="col-sm-2 col-form-label">Sida</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputSida" name="sida" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputSidaContagio" class="col-sm-2 col-form-label">Sida Contagio</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputSidaContagio" name="sidaContagio" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputSidaPrueba" class="col-sm-2 col-form-label">Sida Prueba</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputSidaPrueba" name="sidaPrueba" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputSifilis" class="col-sm-2 col-form-label">Sifilis</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputSifilis" name="sifilis" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputTatuaje" class="col-sm-2 col-form-label">Tatuaje</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputTatuaje" name="tatuaje" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputTos" class="col-sm-2 col-form-label">Tos</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputTos" name="tos" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputTransfusion" class="col-sm-2 col-form-label">Transfusion</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputTransfusion" name="transfusion" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputVacuna" class="col-sm-2 col-form-label">Vacuna</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputVacuna" name="vacuna" value="1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputVinchuca" class="col-sm-2 col-form-label">Vinchuca</label>
            <div class="col-sm-10">
                <input type="checkbox" id="inputVinchuca" name="vinchuca" value="1">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create Form2</button>
    </form>
</div>
@endsection
