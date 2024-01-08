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

.center {
  margin-left: auto;
  margin-right: auto;
  width: 50%;
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
         
          
          
            <div class="row">
              <div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center; font-size: 18px;">View Document</h4>
                    
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Document Name</th>
                            <th>Date</th>
                            <th>Uploaded by</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Manage</th>
                            <th>Download</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{$data->DocName}}</td>
                            <td>{{$data->DocDate}}</td>
                            <td>{{$data->LastUsed}}</td>
                            <td style="font-size: 14px; color: {{ $data->status === 'Available' ? 'green' : ($data->status === 'In Used' ? 'red' : 'black') }};">
                              {{$data->status}}
                            </td>
                            <td>
                              <a title="View location" class="btn btn-success" href="{{ url('/floorplan', ['location' => urlencode($data->Location)]) }}">{{ $data->Location }}</a>
                            </td>
                            <td>
                              <a title="Update document" class="btn btn-success" href="{{url('updDoc/'.$data['DocID'])}}">Update✏️</a>
                            </td>
                            <td>
                              <a title="Download document" class="btn btn-success" href="{{url('/download',$data->DocUpload)}}">Download⏬</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <br></br>

                    <iframe class="center" style="width: 900px; height:900px" src="/assets/AllDocuments/{{$data->DocUpload}}"></iframe>
                    <br></br>
                  </div>
                </div>
              </div>
              <br></br><br></br>
            </div>
            <br></br><br></br>

        </div>
       
            
      </div>
</div>



@include("ADMIN.adminscript")
</body>
</html>