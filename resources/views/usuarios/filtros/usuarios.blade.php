
          <select class="custom-select" name="user_id" id="user_id" >



          @foreach ($users as $user )
            <option value="{{ $user->id}}" >
            <p>{{ $user->name}}</p>
          </option>
            @endforeach


   
                    
            
          

    
           

          </select>


