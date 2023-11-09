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

    </style>
  </head>
 <body>


  <div class="container-scroller">

    @include("ADMIN.navbar")
        <div class="">
          <div class="content-wrapper pb-0">
            
            


            <div>
              <p></p>
                <ul>
                  <li></li>
                    <button type="button" class="btn btn-primary mr-2" onclick="window.location.href='/uploadfiles'">+ NEW</button>
                  <li></li>
                </ul>
            </div> 


            


            <div class="row">
              <div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Files</h4>
                    
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Document name</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Last used by</th>
                            <th>Manage</th>
                            <th>Status</th>
                            <th>Operation</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $data)
                          <tr>
                            <td>{{$data->DocName}}</td>
                            <td>{{$data->DocDate}}</td>
                            <td>{{$data->Location}}</td>
                            <td>{{$data->LastUsed}}</td>
                            <td>
                            <a class="badge badge-danger" href={{"documentinfo/".$data['DocID']}}>View</a>
                            </td>
                            <td>{{$data->Status}}</td>
                            <td>
                            <a class="badge badge-danger" href={{"deleteDoc/".$data['DocID']}} >Delete</a>
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
 
              
        </div>
  </div>



  @include("ADMIN.adminscript")
 </body>
</html>