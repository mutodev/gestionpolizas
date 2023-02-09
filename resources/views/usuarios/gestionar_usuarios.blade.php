@extends('layouts.main')
@section('content')



<main class="py-5">

    <div class="container">

        <h1 class="h5 mb-3">
            Bienvenido
            <small class="text-muted">{{ auth()->user()->name }}</small>
        </h1>

        @if(Session::has('success'))
        <hr>
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">Usuarios Del Sistema</h2>
                  <div class="ml-auto">

                    <a href="{{route('home')}}" class="btn btn-sm btn-circle btn-success" title="Inicio">  @include('iconos.home')</a>

                </div>

                </div>
              </div>
            <div class="card-body">

<!---Filtros----->


              <table class="table table-striped table-hover">
                <thead>

                  <tr>
                    <th scope="col">Id de Usuario</th>

                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha Creación</th>
                    <th scope="col">Email</th>

                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>

                  </tr>
                </thead>
                <tbody>
  <?php foreach ($users as $user):?>



                  <tr>
                    <th scope="row"><p>{{$user->id}}</th>
                    <th scope="row"><p>{{$user->name}}</th>
                        <td>    <p>{{$user->created_at}}</p></td>
                    <td>    <p>{{$user->email}}</p></td>

                   <td>    @include('usuarios.filtros._filtro')</td>
            <td> @include('iconos.block_user') | @include('iconos.delete_user') </td>
                    </tr>

                    <?php endforeach ?>

                </tbody>
              </table>

              <nav class="mt-4">
                  <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
