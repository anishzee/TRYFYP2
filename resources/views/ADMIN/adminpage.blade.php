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
  padding: 8px; /* jarak antara images */
  
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
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
              <div class="col-xl-4 col-md-6 grid-margin stretch-card">
                
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
            
            </div>

            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2023 Anishah Hawa. All Rights Reserved.</span>
              </div>
            </footer>
          </div>



            
              
              
        </div>
  </div>



  @include("ADMIN.adminscript")
 </body>
</html>