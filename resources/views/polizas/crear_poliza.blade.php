@extends('layouts.main')

@section('content')
<!-- content -->
<main class="py-5">
  <div class="container mt-5">
    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif



    <div class="card">
        <div class="card-header card-title">
          <div class="d-flex align-items-center">
            <h2 class="mb-0">Crear Poliza | Amparos | Coberturas</h2>
            <div class="ml-auto">

                <a href="{{route('home')}}" class="btn btn-sm btn-circle btn-success" title="Inicio">  @include('iconos.home')</a>

                <a  href="{{route('gestionar_coberturas')}}" class="btn btn-sm btn-circle btn-success" title="Gestionar Coberturas">  @include('iconos.gestionarcobertura_icon')</a>
            </div>
        </div>  </div>
        <div class="col-12 align-items-center">
    <form method="post" action="{{route('store_cobertura')}}">
        @csrf


        <div class="form-group">
            @include('formularios._tipo_poliza')
        </div>

        <div class="form-group">


            <label>Tipo de Riesgo</label>
            <input type="text" class="form-control {{ $errors->has('clase_de_riesgo') ? 'error' : '' }}" name="clase_de_riesgo" id="clase_de_riesgo">
            @if ($errors->has('clase_de_riesgo'))
            <div class="error">
                {{ $errors->first('clase_de_riesgo') }}
            </div>
            @endif

        </div>
        <div class="form-group">
            <label>Porcentaje Amparo</label>
            <input type="text" class="form-control {{ $errors->has('porcentaje_amparo') ? 'error' : '' }}" name="porcentaje_amparo" id="porcentaje_amparo">
            @if ($errors->has('porcentaje_amparo'))
            <div class="error">
                {{ $errors->first('porcentaje_amparo') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label>Valor Asegurado</label>
            <input type="text" class="form-control {{ $errors->has('valor_asegurado') ? 'error' : '' }}" name="valor_asegurado" id="valor_asegurado" required>
            @if ($errors->has('valor_asegurado'))
            <div class="error">
                {{ $errors->first('valor_asegurado') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label>Vigencia</label>

            <textarea  {{ $errors->has('vigencia') ? 'error' : '' }}"  rows="8", cols="54" class="form-control  id="vigencia" name="vigencia" style="resize:none, " required></textarea >




            @if ($errors->has('vigencia'))
            <div class="error">
                {{ $errors->first('vigencia') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select class="form-control {{ $errors->has('estado') ? 'error' : '' }}" name="estado">
                <option value="1">Activo</option>
                <option value="0" selected>Inactivo</option>

            </select>

            @if ($errors->has('estado'))
            <div class="error">
                {{ $errors->first('estado') }}
            </div>
            @endif
        </div>


        <div class="form-group">
            <label>Base del Cálculo</label>
            <select class="form-control {{ $errors->has('origen') ? 'error' : '' }}" name="origen">
                <option value="Valor del Contrato" selected>Valor Total del Contrato (Incluye IVA)</option>
                <option value="Anticipo">Anticipo</option>
                <option value="Valor Asegurado" >Valor Asegurado</option>

            </select>

            @if ($errors->has('origen'))
            <div class="error">
                {{ $errors->first('origen') }}
            </div>
            @endif
        </div>





        <div class="form-group">
        <input type="submit" name="send" value="Agregar Amparo" class="btn btn-dark btn-block">

    </div>

    </form>
</div>
</div>
</div>
  </main>
  @endsection

@section('title','Crear Poliza | Seguros')