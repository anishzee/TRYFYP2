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
          <div class="page-header flex-wrap">
            <h3 class="centerALL"> Location</h3>
          </div>
          
          <div class="row" >
              <div class="row">
                <div class="column">
                  <div class="container">
                    <img src="admin/assets/images/dashboard/locationfloorplan.jpg" alt="image" style="width:100%;" class="center">
                      
                  </div>
                </div>
                
              </div>
          </div>


<br></br>


          <div class="row">
            <img src="admin/assets/images/dashboard/floorplan.jpg" alt="image" style="width:50%;">
          </div>
          <br></br>

        </div>

            
      </div>
</div>



@include("ADMIN.adminscript")
</body>
</html>