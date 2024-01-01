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

.columnPic {
  float: left;
  width: 300px; 
  padding: 5px; /* jarak antara images */
  
}

/* Clearfix (clear floats) */
.rowPic::after {
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

.rowPic {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%; /* Ensure the container takes the full height of the viewport */
    width: 100%;
    margin: 0; /* Remove default body margin */
}

.centerBox {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;        
}

.box-container {
  display: flex;
  flex-direction: row; /* Make it horizontal */
}

.column {
  display: flex;
  flex-direction: column; /* Each column is vertical */
  align-items: center;
  margin-right: 50px; /* Adjust spacing between columns */
}

.box {
  width: 100px; /* Adjust width */
  height: 50px; /* Adjust height */
  background-color: #3498db;
  margin: 0; /* No space between boxes */
  display: flex;
  justify-content: center;
  align-items: center;
  color: #fff; /* Text color */
  border: 2px solid #2980b9; /* Border styling */
  box-sizing: border-box; /* Include border in box dimensions */
}

.box.selected {
    background-color: #660066; /* Highlight color */
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
          
          <div class="rowPic" >
              <div class="rowPic">
                <div class="columnPic">
                  <div class="container">
                    <img src="../admin/assets/images/dashboard/locationfloorplan.jpg" alt="image" style="width:100%;">
                      
                  </div>
                </div>
                
              </div>
          </div>

        <div class="centerBox">
          <div class="box-container">
              <div class="column">
                <div class="box @if($selectedLocation === 'RK2A') selected @endif">RK2A</div>
                <div class="box">Box 2</div> 
                <div class="box">Box 3</div>
                <div class="box">Box 4</div>
                <div class="box">Box 5</div>
              </div>
        
              <div class="column">
                <div class="box @if($selectedLocation === 'RK9A') selected @endif">RK9A</div>
                <div class="box">Box 6</div>
                <div class="box">Box 7</div>
                <div class="box">Box 8</div>
                <div class="box">Box 9</div>
                <div class="box">Box 10</div>
              </div>
        
              <div class="column">
                <div class="box @if($selectedLocation === 'KB1A') selected @endif">KB1A</div>
                <div class="box">Box 6</div>
                <div class="box">Box 6</div>
                <div class="box">Box 7</div>
                <div class="box">Box 8</div>
                <div class="box">Box 9</div>
                <div class="box">Box 10</div>
              </div>
        
              <div class="column">
                <div class="box">Box 6</div>
                <div class="box">Box 7</div>
                <div class="box">Box 8</div>
                <div class="box">Box 9</div>
                <div class="box">Box 10</div>
              </div>
          </div>

        </div>



          
          <br></br>

            
    </div>
</div>



@include("ADMIN.adminscript")
</body>
</html>