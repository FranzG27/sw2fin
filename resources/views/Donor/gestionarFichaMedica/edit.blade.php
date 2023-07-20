@extends('Donor.dashboard')
@section('contenido')
@if ($errors->any())
<div class="alert alert-primary">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h1>Editar Ficha Médica</h1>
<div class="bg-secondary rounded h-100 p-4">
    <form method="POST" action="{{ route('donors.fichaUpdate', $medicalRecord->id) }}">
        @csrf
        @method('PATCH')

        <!-- MedicalRecord fields -->
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputEmail3" name="date" value="{{ old('date', $medicalRecord->date) }}">
            </div>
        </div>

        <!-- Form1 fields -->
        <div class="row mb-3">
            <h3>Formulario 1</h3>
            <label for="ci" class="col-sm-2 col-form-label">CI</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ci" name="ci" value="{{ old('ci', $form1->ci ?? '') }}">
            </div>
            <label for="departamento" class="col-sm-2 col-form-label">Departamento</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="departamento" name="departamento" value="{{ old('departamento', $form1->departamento ?? '') }}">
            </div>
            <label for="domicilio" class="col-sm-2 col-form-label">Domicilio</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="domicilio" name="domicilio" value="{{ old('domicilio', $form1->domicilio ?? '') }}">
            </div>
            <!-- Add more fields for Form1 here -->
            <label for="edad" class="col-sm-2 col-form-label">Edad</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="edad" name="edad" value="{{ old('edad', $form1->edad ?? '') }}">
            </div>
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $form1->email ?? '') }}">
            </div>
            <!-- Add more fields for Form1 here -->
            <!-- Add more fields for Form1 here -->
            <label for="estadoCivil" class="col-sm-2 col-form-label">Estado Civil</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="estadoCivil" name="estadoCivil" value="{{ old('estadoCivil', $form1->estadoCivil ?? '') }}">
            </div>
            <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $form1->fecha ?? '') }}">
            </div>
            <!-- Add more fields for Form1 here -->
            <!-- Add more fields for Form1 here -->
            <label for="gradoInstruccion" class="col-sm-2 col-form-label">Grado de Instrucción</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="gradoInstruccion" name="gradoInstruccion" value="{{ old('gradoInstruccion', $form1->gradoInstruccion ?? '') }}">
            </div>
            {{-- <label for="hora" class="col-sm-2 col-form-label">Hora</label>
            <div class="col-sm-10">
                <input type="time" class="form-control" id="hora" name="hora" value="{{ old('hora', $form1->hora ?? '') }}">
            </div> --}}
            <!-- Add more fields for Form1 here -->
            <!-- Add more fields for Form1 here -->
            <!-- Add more fields for Form1 here -->
            <!-- Add more fields for Form1 here -->
            <label for="lugarTrabajo" class="col-sm-2 col-form-label">Lugar de Trabajo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lugarTrabajo" name="lugarTrabajo" value="{{ old('lugarTrabajo', $form1->lugarTrabajo ?? '') }}">
            </div>
            <label for="fechaNacimiento" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="{{ old('fechaNacimiento', $form1->fechaNacimiento ?? '') }}">
            </div>
            <!-- Add more fields for Form1 here -->
            <!-- Add more fields for Form1 here -->
            <!-- Add more fields for Form1 here -->
        </div>

        <!-- Form2 fields -->
        <div class="row mb-3">
            <h3>Formulario 2</h3>
            <label for="alergia" class="col-sm-2 col-form-label">Alergia</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="alergia" name="alergia" value="1" {{ old('alergia', $form2->alergia ?? '') ? 'checked' : '' }}>
            </div>
            <label for="bloodDisease" class="col-sm-2 col-form-label">Enfermedad de la Sangre</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="bloodDisease" name="bloodDisease" value="1" {{ old('bloodDisease', $form2->bloodDisease ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <label for="cambioPareja" class="col-sm-2 col-form-label">Cambio de Pareja</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="cambioPareja" name="cambioPareja" value="1" {{ old('cambioPareja', $form2->cambioPareja ?? '') ? 'checked' : '' }}>
            </div>
            <label for="carcel" class="col-sm-2 col-form-label">Carcel</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="carcel" name="carcel" value="1" {{ old('carcel', $form2->carcel ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="chagas" class="col-sm-2 col-form-label">Chagas</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="chagas" name="chagas" value="1" {{ old('chagas', $form2->chagas ?? '') ? 'checked' : '' }}>
            </div>
            <label for="chagasFamiliar" class="col-sm-2 col-form-label">Chagas Familiar</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="chagasFamiliar" name="chagasFamiliar" value="1" {{ old('chagasFamiliar', $form2->chagasFamiliar ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="cold" class="col-sm-2 col-form-label">Resfriado</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="cold" name="cold" value="1" {{ old('cold', $form2->cold ?? '') ? 'checked' : '' }}>
            </div>
            <label for="contagioEnfermedad" class="col-sm-2 col-form-label">Contagio de Enfermedad</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="contagioEnfermedad" name="contagioEnfermedad" value="1" {{ old('contagioEnfermedad', $form2->contagioEnfermedad ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="convulsiones" class="col-sm-2 col-form-label">Convulsiones</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="convulsiones" name="convulsiones" value="1" {{ old('convulsiones', $form2->convulsiones ?? '') ? 'checked' : '' }}>
            </div>
            <label for="dental" class="col-sm-2 col-form-label">Dental</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="dental" name="dental" value="1" {{ old('dental', $form2->dental ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="drogas" class="col-sm-2 col-form-label">Drogas</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="drogas" name="drogas" value="1" {{ old('drogas', $form2->drogas ?? '') ? 'checked' : '' }}>
            </div>
            <label for="embarazo" class="col-sm-2 col-form-label">Embarazo</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="embarazo" name="embarazo" value="1" {{ old('embarazo', $form2->embarazo ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="estadoAnimo" class="col-sm-2 col-form-label">Estado de Ánimo</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="estadoAnimo" name="estadoAnimo" value="1" {{ old('estadoAnimo', $form2->estadoAnimo ?? '') ? 'checked' : '' }}>
            </div>
            <label for="ets" class="col-sm-2 col-form-label">ETS</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="ets" name="ets" value="1" {{ old('ets', $form2->ets ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="etsdisease" class="col-sm-2 col-form-label">ETS Disease</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="etsdisease" name="etsdisease" value="{{ old('etsdisease', $form2->etsdisease ?? '') }}">
            </div>
            <label for="fiebre" class="col-sm-2 col-form-label">Fiebre</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="fiebre" name="fiebre" value="1" {{ old('fiebre', $form2->fiebre ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="heartDisease" class="col-sm-2 col-form-label">Enfermedad Cardiaca</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="heartDisease" name="heartDisease" value="1" {{ old('heartDisease', $form2->heartDisease ?? '') ? 'checked' : '' }}>
            </div>
            <label for="hepatitis" class="col-sm-2 col-form-label">Hepatitis</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="hepatitis" name="hepatitis" value="1" {{ old('hepatitis', $form2->hepatitis ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="longTreatment" class="col-sm-2 col-form-label">Tratamiento Prolongado</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="longTreatment" name="longTreatment" value="1" {{ old('longTreatment', $form2->longTreatment ?? '') ? 'checked' : '' }}>
            </div>
            <label for="malaria" class="col-sm-2 col-form-label">Malaria</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="malaria" name="malaria" value="1" {{ old('malaria', $form2->malaria ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="medicacion" class="col-sm-2 col-form-label">Medicación</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="medicacion" name="medicacion" value="1" {{ old('medicacion', $form2->medicacion ?? '') ? 'checked' : '' }}>
            </div>
            <label for="motivo" class="col-sm-2 col-form-label">Motivo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="motivo" name="motivo" value="{{ old('motivo', $form2->motivo ?? '') }}">
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="motivoPrueba" class="col-sm-2 col-form-label">Motivo de la Prueba</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="motivoPrueba" name="motivoPrueba" value="1" {{ old('motivoPrueba', $form2->motivoPrueba ?? '') ? 'checked' : '' }}>
            </div>
            <label for="nuevo" class="col-sm-2 col-form-label">Nuevo</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="nuevo" name="nuevo" value="1" {{ old('nuevo', $form2->nuevo ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="pulmon" class="col-sm-2 col-form-label">Problema Pulmonar</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="pulmon" name="pulmon" value="1" {{ old('pulmon', $form2->pulmon ?? '') ? 'checked' : '' }}>
            </div>
            <label for="rechazadoS" class="col-sm-2 col-form-label">Rechazado en Sangre</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="rechazadoS" name="rechazadoS" value="1" {{ old('rechazadoS', $form2->rechazadoS ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="recentMedication" class="col-sm-2 col-form-label">Medicación Reciente</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="recentMedication" name="recentMedication" value="1" {{ old('recentMedication', $form2->recentMedication ?? '') ? 'checked' : '' }}>
            </div>
            <label for="sida" class="col-sm-2 col-form-label">SIDA</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="sida" name="sida" value="1" {{ old('sida', $form2->sida ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="sidaContagio" class="col-sm-2 col-form-label">Contagio de SIDA</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="sidaContagio" name="sidaContagio" value="1" {{ old('sidaContagio', $form2->sidaContagio ?? '') ? 'checked' : '' }}>
            </div>
            <label for="sidaPrueba" class="col-sm-2 col-form-label">Prueba de SIDA</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="sidaPrueba" name="sidaPrueba" value="1" {{ old('sidaPrueba', $form2->sidaPrueba ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="sifilis" class="col-sm-2 col-form-label">Sífilis</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="sifilis" name="sifilis" value="1" {{ old('sifilis', $form2->sifilis ?? '') ? 'checked' : '' }}>
            </div>
            <label for="tatuaje" class="col-sm-2 col-form-label">Tatuaje</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="tatuaje" name="tatuaje" value="1" {{ old('tatuaje', $form2->tatuaje ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="tos" class="col-sm-2 col-form-label">Tos</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="tos" name="tos" value="1" {{ old('tos', $form2->tos ?? '') ? 'checked' : '' }}>
            </div>
            <label for="transfusion" class="col-sm-2 col-form-label">Transfusión</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="transfusion" name="transfusion" value="1" {{ old('transfusion', $form2->transfusion ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <!-- Add more fields for Form2 here -->
            <label for="vacuna" class="col-sm-2 col-form-label">Vacuna</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="vacuna" name="vacuna" value="1" {{ old('vacuna', $form2->vacuna ?? '') ? 'checked' : '' }}>
            </div>
            <label for="vinchuca" class="col-sm-2 col-form-label">Vinchuca</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-check-input" id="vinchuca" name="vinchuca" value="1" {{ old('vinchuca', $form2->vinchuca ?? '') ? 'checked' : '' }}>
            </div>
            <!-- Add more fields for Form2 here -->

            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>
@endsection
