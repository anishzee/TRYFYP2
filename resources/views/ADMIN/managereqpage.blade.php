<x-app-layout>
 
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include("ADMIN.admincss")

    <style>
      /* Container holding the image and the text */
.container {
  position: relative;
  text-align: center;
  color: white;
}

.container {
  position: relative;
  text-align: center;
  color: rgba(202, 201, 201, 0.982);
}

/* Bottom left text */
.bottom-left {
  position: absolute;
  bottom: 8px;
  left: 16px;
}

/* Top left text */
.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
}

/* Top right text */
.top-right {
  position: absolute;
  top: 8px;
  right: 16px;
}

/* Bottom right text */
.bottom-right {
  position: absolute;
  bottom: 8px;
  right: 16px;
}

/* Centered text */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 300px; 
  padding: 5px; /* jarak antara images */
  
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

.content-wrapper {
  background: white;
  
}

.centerALL {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%; /* Ensure the container takes the full height of the viewport */
    width: 100%;
    margin: 0; /* Remove default body margin */
}

.row {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%; /* Ensure the container takes the full height of the viewport */
    width: 100%;
    margin: 0; /* Remove default body margin */
}



    </style>
  </head>
 <body>


  <div class="container-scroller">

    @include("ADMIN.navbar")
        <div class="centerALL">
          <div class="content-wrapper pb-0">
            
          @if(Session::has('success') || Session::has('fail'))
              <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
              <script>
                  $(document).ready(function(){
                    var alertElement = $('.alert');
                    alertElement.fadeIn();

                    // Hide the alert after a few seconds
                    setTimeout(function(){
                      alertElement.fadeOut();
                    }, 3000); // Adjust the delay time in milliseconds (e.g., 3000 for 3 seconds)
                  });
              </script>

              @if(Session::has('success'))
                  <div class="alert alert-success" style="display: none; background-color: #d4edda; color: #155724; border-color: #c3e6cb; padding: 10px;">
                    {{ Session::get('success') }}
                  </div>
              @elseif(Session::has('fail'))
                  <div class="alert alert-danger" style="display: none; background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; padding: 10px;">
                    {{ Session::get('fail') }}
                  </div>
              @endif
          @endif


            <br></br>
            <br></br>
            <div class="row">
              <div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center; font-size: 18px;">Requested Document</h4>
                    <br></br>
                   
                    <div class="table-responsive">
                        <table class="table table-hover"  style="max-width: 100%; overflow-x: auto;">
                          <thead>
                            <tr>
                              <th>Document name</th>
                              <th>Last used by</th>
                              <th>Location</th>
                              <th>Requested by</th>
                              <th>Manage</th>
                              <th>Request Status</th>
                              <th>Operation</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($userRequested as $r)
                            <tr>
                              <td>
                                  {{ $r->DocName }}
                              </td>
                              <td>
                                {{$r->LastUsed}}
                              </td>
                              <td>
                                <a class="btn btn-success" href="{{url('/floorplan')}}">{{$r->Location}}</a>
                              </td>
                              <td>{{ $r->UserName }}</td>
                              <td>
                                <a class="btn btn-success" href={{"documentinfo/".$r['DocID']}}>View📑</a>
                              </td>
                              <td>
                                <a class="btn btn-danger" href={{"removeReqAdmin/".$r['DocID']}}>Remove🗑️</a>
                              </td>
                              <td style="font-size: 14px; color: {{ $r->reqstatus === 'Pending' ? 'orange' : ($r->reqstatus === 'Accepted' ? 'green' : ($r->reqstatus === 'Rejected' ? 'red' : 'black')) }};">
                                <form method="post" action="">
                                   @csrf
                                    @method('patch') {{-- or use @method('put') depending on your route definition --}}

                                  <select name="status" class="form-control" onchange="this.form.submit()">
                                      <option value="Pending" {{ $r->reqstatus === 'Pending' ? 'selected' : '' }}>Pending</option>
                                      <option value="Accepted" {{ $r->reqstatus === 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                      <option value="Rejected" {{ $r->reqstatus === 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                  </select>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <br></br>
                    <span class="centerALL">
                      {{$userRequested->links('vendor.pagination.bootstrap-4')}}
                    </span>


            <br></br>
            <br></br>
             
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
             
          </div>
                     
            
        </div>
      


  </div>



  @include("ADMIN.adminscript")
 </body>
</html>