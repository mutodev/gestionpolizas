
 <form method="post"  action="{{ route('actualizar_role') }}/{{$user->id}}">


    @csrf
    <div class="row">
      <div class="col">
          <select class="custom-select" name="role_type" id="role_type" >


              @foreach ($user['roles'] as $role )
            <option value="{{ $role->name}}" selected>


                        <p>{{ $role->name}}</p>



            </option>
  @endforeach
            @foreach ($roles as $role_type )
    @foreach ($user['roles'] as $role )
            @if($role_type->name !=   $role->name)
            <option value="{{$role_type->name}}">{{$role_type->name}}</option>
@endif

       @endforeach
            @endforeach


          </select>
    </div>
    <div class="col">
          <input type="submit" name="send" value="Actualizar" class="btn btn-outline-secondary">
    </div>

    </div>
 </form>
