@extends('layouts.main')

@section('content')

  <div class="col-md-12">

    <div class="card">
        <div class="card-header card-title">
          <div class="d-flex align-items-center">
            <h2 class="mb-0">Gestión de Firmas</h2>
            <div class="ml-auto">

  <a href="{{route('home')}}" class="btn btn-sm btn-circle btn-success" title="Inicio">  @include('iconos.home')</a>






            </div>
          </div>
        </div>

      <div class="card-body">
    <div class="bg-light p-5 rounded">
        <h1>Files</h1>
        <a href="{{ route('files.create') }}" class="btn btn-primary float-right mb-3">Add file</a>



        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">User Id</th>
              <th scope="col">Name</th>
              <th scope="col">Size</th>
              <th scope="col">Type</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($files as $file)
              <tr>
                <td width="3%">{{ $file->id }}</td>
                <td width="10%">

                  @foreach ($Users as $user )
                  @if(  $file->user_id == $user->id)
                     {{ $user->name}}
                 @endif
                      @endforeach





                </td>
                <td>{{ $file->name }}</td>
                <td width="10%">{{ $file->size }}</td>
                <td width="10%">{{ $file->type }}</td>

                <td width="5%">
                  <form action="{{ route('files.delete') }}" method="post" >
                    @csrf
                  <input name="id" id="id" type="text" value="{{ $file->id }}" class="form-control" hidden>

                  <button class="w-100 btn  btn-danger btn-sm" type="submit">Delete</button>
                </form>

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  </div>
</div>
    <!--------------------->
@endsection