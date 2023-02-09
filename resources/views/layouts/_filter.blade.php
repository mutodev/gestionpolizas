<div class="row">
     <div class="col-md-6">
        <div class="row">
        <div class="col-1">
            <form>
           
          
                <input type="text" class="form-control" name="up_val" value="up" id="up_val" hidden>
                <button class="btn btn-outline-secondary" type="submit"  >
                @include('iconos.up')
            </button>
        </form>
        
            </div>
            <div class="col">
            <form>
                <input type="text" class="form-control" name="dwn_val" value="dwn" id="dwn_val" hidden>
            <button class="btn btn-outline-secondary" type="submit"  >
                @include('iconos.dwn')
            </button>
        </form>
        </div>
    </div>
    </div>

    <div class="col-md-6">

   

      <form>
        <div class="row">
          <div class="col">
            @includeUnless(empty($companies), 'contacts._company-selection')
          </div>
          <div class="col">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" value="{{ request()->query('search') }}" id="search-input" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
              <div class="input-group-append">
                @if(request()->filled('search'))
                  <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('search-input').value = '', document.getElementById('search-select').selectedIndex = 0, this.form.submit()">
                      <i class="fa fa-refresh"></i>
                  </button>
                @endif
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>