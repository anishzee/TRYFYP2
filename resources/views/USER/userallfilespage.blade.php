<x-app-layout>
 
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include("USER.usercss")

    <style>
      /* Container holding the image and the text */
.container {
  position: relative;
  text-align: center;
  color: white;
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

.linkbutton {
  color: white;
  padding: 10px 10px;
  text-align: center;
}

.content-wrapper {
  background: white;
} 

.round2 {
  border: 2px solid lightblue;
  border-radius: 8px;
  padding: 5px;
}

.table-container {
  overflow-x: auto;
}

    </style>
  </head>
 <body>


  <div class="container-scroller">

    @include("USER.usernavbar")
      
          <div class="content-wrapper pb-0">
            
          @if(Session::has('success'))
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
            <div class="alert alert-success" style="display: none; background-color: #d4edda; color: #155724; border-color: #c3e6cb; padding: 10px;">
                {{ Session::get('success') }}
            </div>
          @endif


           


            


            <div class="row" style="max-width: 100%;overflow-x: auto;">
              <div >
                <div class="card" style="max-width: 100%;">
                  <div class="card-body" style="max-width: 100%;">
                    <h4 class="card-title">All Files</h4>
                    
                    <br></br>
                    <!-- Search Bar -->
                    <form action="{{ url('/allfilesUser/search') }}" method="get">
                       @csrf
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search...">
                        </div>

                        <div>
                          <button type="submit" class="btn btn-primary">Search</button>
                          <button type="button" class="btn btn-primary" onclick="window.location.href='/allfilesUser'">Reset</button>
                        </div> 
                    </form>
                    <!-- End Search Bar -->
                      
                   
                    <br></br>
                    <div class="table-container">
                      <div >
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-icon-text mb-3 mb-sm-0 btn-inverse-primary font-weight-normal" onclick="window.location.href='/uploadfiles'">
                                <i class="mdi mdi-email btn-icon-prepend"></i>+NEW</button>
                        </div> 
                        <table class="table table-hover"  style="max-width: 100%; overflow-x: auto;">
                          <thead>
                            <tr>
                              <th>Document name</th>
                              <th>Date</th>
                              <th>Location</th>
                              <th>Last used by</th>
                              <th>Manage</th>
                              <th>Status</th>
                              <th>Update</th>
                              <th>Add to Favorite</th>
                              <th>Operation</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($data as $x)
                            <tr>
                              <td>{{$x->DocName}}</td>
                              <td>{{$x->DocDate}}</td>
                              <td>
                                <a class="btn btn-success" href="{{url('/floorplanUser')}}">{{$x->Location}}</a>
                              </td>
                              <td>{{$x->LastUsed}}</td>
                              <td>
                                <a class="btn btn-success" href={{"documentinfoUser/".$x['DocID']}}>View📑</a>
                              </td>
                              <td style="font-size: 14px; color: {{ $x->status === 'Available' ? 'green' : ($x->status === 'In Used' ? 'red' : 'black') }};">
                                {{ $x->status }}
                              </td>
                              <td>
                                <a class="btn btn-success" href={{"updDocUser/".$x['DocID']}}>Update✏️</a>
                              </td>
                              <td>
                                <form action="{{ route('addfavUser', $x['DocID']) }}" method="POST">
                                @csrf
                                  <button type="submit" class="btn btn-success">Favorite💜</button>
                                </form>
                              </td>
                              <td>
                                @if($x->status === 'Available')
                                  <form action="{{ route('reqdoc', $x['DocID']) }}" method="POST">
                                  @csrf
                                    <button type="submit" class="btn btn-success">Request</button>
                                  </form>
                                @else
                                  <button class="btn btn-success" disabled>Request</button>
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
            </div>



            <br></br>
                    <span>
                      {{$data->links('vendor.pagination.bootstrap-4')}} 
                    </span>


                    <br></br><br></br><br></br><br></br>
            
          </div>
 
              
       
  </div>

  
  @include("USER.userscript")
 </body>
</html>