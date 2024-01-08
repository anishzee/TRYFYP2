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
                    <h4 class="card-title" style="text-align: center; font-size: 18px;">Favorite Document</h4>
                    <br></br>
                   
                    <div class="table-responsive">
                        <table class="table table-hover"  style="max-width: 100%; overflow-x: auto;">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Document name</th>
                              <th>Date</th>
                              <th>Uploaded by</th>
                              <th>Status</th>
                              <th>Location</th>
                              <th>Manage</th>
                              <th>Operation</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($userFavorites as $key => $x)
                            <tr>
                              <td>{{ $key + 1 }}</td> <!-- Display the numbering starting from 1 -->
                              <td>
                                  {{ $x->DocName }}
                              </td>
                              <td>
                                  {{ $x->DocDate }}
                              </td>
                              <td>
                                {{$x->LastUsed}}
                              </td>
                              <td style="font-size: 14px; color: {{ $x->status === 'Available' ? 'green' : ($x->status === 'In Used' ? 'red' : 'black') }};">
                                {{$x->status}}
                              </td>
                              <td>
                                <a title="View location" class="btn btn-success" href="{{ url('/floorplan', ['location' => urlencode($x->Location)]) }}">{{ $x->Location }}</a>
                              </td>
                              <td>
                                <a title="View document" class="btn btn-success" href={{"documentinfo/".$x['DocID']}}>View📑</a>
                              </td>
                              <td>
                                <a title="Delete document" class="btn btn-danger" href={{"removeFav/".$x['FavID']}}>Remove🗑️</a>
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
                      {{$userFavorites->links('vendor.pagination.bootstrap-4')}}
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