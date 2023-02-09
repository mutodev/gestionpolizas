@extends('layouts.main')
@section('content')
<main class="py-5">
    <div class="container">

    <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">Agregar Imagen PNG</h2>
                  <div class="ml-auto">

                    <a href="{{route('home')}}" class="btn btn-sm btn-circle btn-success" title="Inicio">  @include('iconos.home')</a>

                </div>

                </div>
              </div>
   <div class="card-body">
    <div class="bg-light p-5 rounded">
        <h1>Add file</h1>

        <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="form-group mt-4">
              <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">
            </div>

            <div class="form-group mt-4">


                @include('usuarios.filtros.usuarios')
              </div>




            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Save</button>
        </form>


    </div>
        </div>
         </div>
        </div>
    </div>
</main>
@endsection