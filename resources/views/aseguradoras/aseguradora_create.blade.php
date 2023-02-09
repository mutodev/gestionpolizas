@extends('layouts.main')

@section('content')
<!-- content -->

<main class="py-5">





<div class="container">

<!-- Success message -->
@if(Session::has('success'))
<div class="alert alert-success">
  {{Session::get('success')}}
</div>
@endif
<!-- content -->



  <div class="row justify-content-md-center">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-title">
                <div class="d-flex align-items-center">
          <strong>Agregar Aseguradora</strong>

          <div class="ml-auto">
            <a href="{{route('home')}}" class="btn btn-sm btn-circle btn-success" title="Inicio">  @include('iconos.home')</a>

          <a href="{{route('gestionar_aseguradora')}}" class="btn btn-sm btn-circle btn-success" title="Gestionar Aseguradora">  @include('iconos.aseguradora')</a>
        </div>
        </div>
    </div>


        <div class="card-body">




          <form method="post" action="{{ route('set_aseguradora') }}">
            @csrf


            <div class="form-group">
          <label for="#">Nit</label>
          <input type="text" class="form-control {{ $errors->has('nit') ? 'error' : '' }}" name="nit" id="nit" required>
        </div>
        <div class=" form-group">
        <label >Tipo de Aseguradora</label>
          <input type="text" class="form-control {{ $errors->has('tipo_aseguradora') ? 'error' : '' }}" name="tipo_aseguradora" id="tipo_aseguradora" required>

            @if ($errors->has('tipo_aseguradora'))
            <div class="error">
                {{ $errors->first('tipo_aseguradora') }}
            </div>
            @endif
        </div>

        <div class="  form-group" >

                       <label>Nombre de la Compañia: </label>
                       <input type="text" class="form-control {{ $errors->has('company_name') ? 'error' : '' }}" name="company_name" id="company_name"  required>
                       <!-- Error -->
                       @if ($errors->has('company_name'))
                       <div class="error">
                           {{ $errors->first('company_name') }}
                       </div>
                       @endif



       </div>


       <div class="form-group">
        <label >Nombre de Representante Legal</label>
          <input type="text" class="form-control {{ $errors->has('representante') ? 'error' : '' }}" name="representante" id="representante" required>
            @if ($errors->has('representante'))
            <div class="error">
                {{ $errors->first('representante') }}
            </div>
            @endif
        </div>
        <div class="form-group">
        <label >Cedula de Representante Legal</label>
          <input type="text" class="form-control {{ $errors->has('ccrepresentante') ? 'error' : '' }}" name="ccrepresentante" id="ccrepresentante" required>
          @if ($errors->has('ccrepresentante'))
            <div class="error">
                {{ $errors->first('ccrepresentante') }}
            </div>
            @endif
        </div>

        <div class="form-group">
        <label >Dirección de la entidad</label>
          <input type="text" class="form-control {{ $errors->has('direccion_entidad') ? 'error' : '' }}" name="direccion_entidad" id="direccion_entidad" required>
          @if ($errors->has('direccion_entidad'))
            <div class="error">
                {{ $errors->first('direccion_entidad') }}
            </div>
            @endif
        </div>

<!------los de mas campos----->  <div class="row  form-group">
<div class="col contac1">

<label>Información de Contacto 1 </label>
<div class=" row form-group" >
    <div class="col-md-12">
    <label>Nombre  : </label>
    <input type="text" class="form-control {{ $errors->has('name1') ? 'error' : '' }}" name="name1" id="name1"   required>
    <!-- Error -->
    @if ($errors->has('name1'))
    <div class="error">
        {{ $errors->first('name1') }}
    </div>
    @endif
</div>
<div class="col-md-12">
    <label>Email : </label>
    <input type="text" class="form-control {{ $errors->has('email1') ? 'error' : '' }}" name="email1" id="email1"  required>
    <!-- Error -->
    @if ($errors->has('email1'))
    <div class="error">
        {{ $errors->first('email1') }}
    </div>
    @endif
</div>
<div class="col-md-12">

    <label>Telefono </label>
    <input type="text" class="form-control {{ $errors->has('phone1') ? 'error' : '' }}" name="phone1" id="phone1" required >
    <!-- Error -->
    @if ($errors->has('phone1'))
    <div class="error">
        {{ $errors->first('phone1') }}
    </div>
    @endif
</div>
<div class="col-md-12">

    <label>Dirección</label>
    <input type="text" class="form-control {{ $errors->has('dir1') ? 'error' : '' }}" name="dir1" id="dir1" required>
    <!-- Error -->
    @if ($errors->has('dir1r'))
    <div class="error">
        {{ $errors->first('dir1') }}
    </div>
    @endif
</div>

<div class="col-md-12">

            <label>Cargo</label>
            <input type="text" class="form-control {{ $errors->has('cargo1') ? 'error' : '' }}" name="cargo1" id="cargo1" required >
            <!-- Error -->
            @if ($errors->has('cargo1'))
            <div class="error">
                {{ $errors->first('cargo1') }}
            </div>
            @endif
        </div>
        <div class="col-md-12">

            <label>Url</label>
            <input type="text" class="form-control {{ $errors->has('url1') ? 'error' : '' }}" name="url1" id="url1"  required>
            <!-- Error -->
            @if ($errors->has('url1'))
            <div class="error">
                {{ $errors->first('url1') }}
            </div>
            @endif
        </div>


</div>
</div>
<div class="col contac2 ">

<label>Información Contacto 2</label>
<div class="col-md-12">
    <label>Nombre  : </label>
    <input type="text" class="form-control {{ $errors->has('name2') ? 'error' : '' }}" name="name2" id="name2"  required >
    <!-- Error -->
    @if ($errors->has('name2'))
    <div class="error">
        {{ $errors->first('name2') }}
    </div>
    @endif
</div>
<div class="col-md-12">
    <label>Email : </label>
    <input type="text" class="form-control {{ $errors->has('email2') ? 'error' : '' }}" name="email2" id="email2"  required >
    <!-- Error -->
    @if ($errors->has('email2'))
    <div class="error">
        {{ $errors->first('email2') }}
    </div>
    @endif
</div>
<div class="col-md-12">

    <label>Telefono </label>
    <input type="text" class="form-control {{ $errors->has('phone2') ? 'error' : '' }}" name="phone2" id="phone2"  required>
    <!-- Error -->
    @if ($errors->has('phone2'))
    <div class="error">
        {{ $errors->first('phone2') }}
    </div>
    @endif
</div>
<div class="col-md-12">

    <label>Dirección</label>
    <input type="text" class="form-control {{ $errors->has('dir2') ? 'error' : '' }}" name="dir2" id="dir2" required >
    <!-- Error -->
    @if ($errors->has('dir2'))
    <div class="error">
        {{ $errors->first('dir2') }}
    </div>
    @endif
</div>
<div class="col-md-12">

    <label>Cargo</label>
    <input type="text" class="form-control {{ $errors->has('cargo2') ? 'error' : '' }}" name="cargo2" id="cargo2" required >
    <!-- Error -->
    @if ($errors->has('cargo2'))
    <div class="error">
        {{ $errors->first('cargo2') }}
    </div>
    @endif
</div>
<div class="col-md-12">

    <label>Url</label>
    <input type="text" class="form-control {{ $errors->has('url2') ? 'error' : '' }}" name="url2" id="url2" required >
    <!-- Error -->
    @if ($errors->has('url2'))
    <div class="error">
        {{ $errors->first('url2') }}
    </div>
    @endif
</div>

</div>
</div>
<div class="col-md-12">
    <input type="submit" name="send" value="Agregar Contacto" class="btn btn-outline-secondary" >

</div>

</div>


    </div>

        </form>



        </div>




              </tbody>
            </table>






              <hr>


            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
  @endsection

@section('title','Crear Aseguradora')