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




    </style>
  </head>
 <body>


  <div class="container-scroller">

    @include("ADMIN.navbar")
        <div class="">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Favorite Document 
              </h3>
              
            </div>
            
          

            <div class="row">
              <div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Favorites Documents</h4>
                    @if(isset($userFavorites))
                        {{ dd($userFavorites) }}
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover"  style="max-width: 100%; overflow-x: auto;">
                          <thead>
                            <tr>
                              <th>Document name</th>
                              <th>Date</th>
                              <th>Location</th>
                              <th>Last used by</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($userFavorites as $favorite)
                            <tr>
                              <td>
                                @if(isset($favorite->document))
                                    {{ $favorite->document->DocName }}
                                @else
                                    N/A
                                @endif
                              </td>
                              <td>
                                @if(isset($favorite->document))
                                    {{ $favorite->document->DocDate }}
                                @else
                                    N/A
                                @endif
                              </td>
                              <td>
                                @if(isset($favorite->document))
                                    <a class="btn btn-success" href="{{ url('/floorplan') }}">
                                        {{ $favorite->document->Location }}
                                    </a>
                                @else
                                    N/A
                                @endif
                              </td>
                              <td>
                                @if(isset($favorite->document))
                                    {{ $favorite->document->LastUsed }}
                                @else
                                    N/A
                                @endif
                              </td>
                              <td>
                                @if(isset($favorite->document))
                                    {{ $favorite->document->status }}
                                @else
                                    N/A
                                @endif
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



            
          </div>
 
              
        </div>
  </div>



  @include("ADMIN.adminscript")
 </body>
</html>