@extends('layouts.main')
@section('content')



<main class="py-5">

    <div class="container">
        <h1 class="h5 mb-3">
          <a  href="/Panel_de_Control" class="btn btn-sm btn-success" title="Panel de Control">

            Bienvenido </a>
            <small class="text-muted">{{ auth()->user()->name }}</small>
        </h1>
        @if(Session::has('error_exist'))
        <div class="alert alert-success">
            {{Session::get('error_exist')}}
        </div>
        @endif

<div class="card">

   <div class="card-header card-title">
          <div class="d-flex align-items-center">


        <strong><h5>   Actualizar Impuesto</strong></h5>
 <div class="ml-auto">

  <a href="{{route('home')}}" class="btn btn-sm btn-circle btn-success" title="Inicio">  @include('iconos.home')</a>
  </div>
</div>
</div>
  <div class="card-body">

<form method="post"
action="{{route('actualizar_impuestos')}}">

@csrf
<div class="row justify-content-md-center">
  <div class="col-md-8">




     <table class="table table-striped table-hover" border="1" >
      <thead>

        <th scope="col">Impuesto</th>
        <th scope="col">Porcentaje %</th>
      </thead>

   <tbody>
    @foreach( $Impuestos as  $dato)


        <tr>




          <th scope="row">

            <input name="impuseto_name"  id="impuseto_name"   type="text" value="{{$dato['impuseto_name']}}" >    </th>

          <th scope="row">

             <input name="porcentaje_valor"  id="porcentaje_valor"   type="text" value="{{$dato['porcentaje_valor']}}" required>    </th>

        </tr>
        @endforeach



      </tbody>
     </table>


     <input type="submit" name="Actualziar Impuesto" value="Actualziar" class="btn btn-outline-secondary">
  </div>
</div>
</form>

</div>
</div>

</div>
</main>
@endsection