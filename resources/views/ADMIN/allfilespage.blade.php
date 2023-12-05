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

    @include("ADMIN.navbar")
      
          <div class="content-wrapper pb-0">
            
            


            <div>
              <p></p>
                <ul>
                  <li></li>
                    <button type="button" class="btn btn-primary mr-2" onclick="window.location.href='/uploadfiles'">+ NEW</button>
                  <li></li>
                </ul>
            </div> 


            


            <div class="row" style="max-width: 100%;overflow-x: auto;">
              <div >
                <div class="card" style="max-width: 100%;">
                  <div class="card-body" style="max-width: 100%;">
                    <h4 class="card-title">All Files</h4>
                    
                    <br></br>
                    <!-- Search Bar -->
                    <form action="{{ url('/allfiles/search') }}" method="get">
                       @csrf
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search...">
                        </div>

                        <div>
                          <button type="submit" class="btn btn-primary">Search</button>
                          <button type="button" class="btn btn-primary" onclick="window.location.href='/allfiles'">Reset</button>
                        </div> 
                    </form>
                    <!-- End Search Bar -->
                      
                   
                    <br></br>
                    <div class="table-container">
                      <div >
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
                              <th>Download</th>
                              <th>Operation</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($data as $x)
                            <tr>
                              <td>{{$x->DocName}}</td>
                              <td>{{$x->DocDate}}</td>
                              <td>
                                <a class="btn btn-success" href="{{url('/floorplan')}}">{{$x->Location}}</a>
                              </td>
                              <td>{{$x->LastUsed}}</td>
                              <td>
                                <a class="btn btn-success" href={{"documentinfo/".$x['DocID']}}>View📑</a>
                              </td>
                              <td>{{$x->status}}</td>
                              <td>
                                <a class="btn btn-success" href={{"updDoc/".$x['DocID']}}>Update✏️</a>
                              </td>
                              <td>
                                <a class="btn btn-success" href="{{url('/download',$x->DocUpload)}}">Download⏬</a>
                              </td>
                              <td>
                                <a class="btn btn-success" href={{"deleteDoc/".$x['DocID']}} >Delete🗑️</a>
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



            
          </div>
 
              
       
  </div>

  
  @include("ADMIN.adminscript")
 </body>
</html>