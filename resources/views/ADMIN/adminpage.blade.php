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
              <h3 class="mb-0"> Hi, welcome back Admin!
              </h3>
              
            </div>
            
            <div class="row">
                <div class="row">
                  <div class="column">
                    <div class="container">
                      <img src="admin/assets/images/dashboard/group 4.jpg" alt="image" style="width:100%;">
                        <div class="bottom-left">Bottom Left</div>
                        <div class="top-left">Top Left</div>
                        <div class="top-right">Top Right</div>
                        <div class="bottom-right">Bottom Right</div>
                        <div class="centered">Centered</div>
                    </div>
                  </div>
                  <div class="column">
                    <div class="container">
                      <img src="admin/assets/images/dashboard/group 4.jpg" alt="image" style="width:100%;">
                        <div class="bottom-left">Bottom Left</div>
                        <div class="top-left">Top Left</div>
                        <div class="top-right">Top Right</div>
                        <div class="bottom-right">Bottom Right</div>
                        <div class="centered">Centered</div>
                    </div>
                  </div>
                </div>
            </div>



            <div>
              <p></p>
                <ul>
                  <li></li>
                  <button type="button" class="btn btn-sm ms-3 btn-success" onclick="window.location.href='/uploadfiles'">+ NEW</button>
                 
                  <li></li>
                  <li></li>
                </ul>
            </div> 


            <div class="row">
              <div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recently Used</h4>
                    
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Document name</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Last used by</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Document 1</td>
                            <td>12/12/2022</td>
                            <td>RK 1A</td>
                            <td>Abu</td>
                          </tr>
                          <tr>
                            <td>Document 2</td>
                            <td>10/12/2022</td>
                            <td>RK 10A</td>
                            <td>Ahmad</td>
                          </tr>
                          <tr>
                            <td>Document 3</td>
                            <td>09/11/2022</td>
                            <td>RK 5A</td>
                            <td>Aminah</td>
                          </tr>
                          <tr>
                            <td>Document 4</td>
                            <td>12/10/2022</td>
                            <td>KB 1A</td>
                            <td>Rozana</td>
                          </tr>
                          <tr>
                            <td>Document 5</td>
                            <td>16/09/2022</td>
                            <td>KB 1A</td>
                            <td>Abu</td>
                          </tr>
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