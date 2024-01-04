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
  height: 180vh;
  margin-left: 0;   
  border: 5px solid #660066;          
}

.box-container {
  display: flex;
  flex-direction: row; /* Make it horizontal */
}

.column {
  display: flex;
  flex-direction: column; /* Each column is vertical */
  align-items: center;
  margin-right: 80px; /* Adjust spacing between columns */
}

.box {
  width: 100px; /* Adjust width */
  height: 50px; /* Adjust height */
  background-color: #0099cc;
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

.horizontal {
  width: 50px; /* Adjust width */
  height: 100px; /* Adjust height */
  background-color: #0099cc;
  margin: 0; /* No space between boxes */
  display: flex;
  justify-content: center;
  align-items: center;
  color: #fff; /* Text color */
  border: 2px solid #2980b9; /* Border styling */
  box-sizing: border-box; /* Include border in box dimensions */
}

.door {
  width: 50px; /* Adjust width */
  height: 100px; /* Adjust height */
  background-color: #660066;
  margin: 0; /* No space between boxes */
  display: flex;
  justify-content: center;
  align-items: center;
  color: #fff; /* Text color */
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

          <br></br>
          <br></br>

        <div class="centerBox">
          <div class="box-container">
              <div class="column">
              <div style="color: #660066; font-size: 30px; font-weight: bold;">RK-D</div>
                <div class="box @if($selectedLocation === 'RK1D') selected @endif">RK1D</div>
                <div class="box @if($selectedLocation === 'RK2D') selected @endif">RK2D</div>
                <div class="box @if($selectedLocation === 'RK3D') selected @endif">RK3D</div> 
                <div class="box @if($selectedLocation === 'RK4D') selected @endif">RK4D</div> 
                <div class="box @if($selectedLocation === 'RK5D') selected @endif">RK5D</div> 
                <div class="box @if($selectedLocation === 'RK6D') selected @endif">RK6D</div> 
                <div class="box @if($selectedLocation === 'RK7D') selected @endif">RK7D</div> 
                <div class="box @if($selectedLocation === 'RK8D') selected @endif">RK8D</div> 
                <div class="box @if($selectedLocation === 'RK9D') selected @endif">RK9D</div> 
                <div class="box @if($selectedLocation === 'RK10D') selected @endif">RK10D</div> 
                <div class="box @if($selectedLocation === 'RK11D') selected @endif">RK11D</div> 
                <div class="box @if($selectedLocation === 'RK12D') selected @endif">RK12D</div>
              </div>
        
              <div class="column">
                <div style="color: #660066; font-size: 30px; font-weight: bold;">RK-C</div>
                <div class="box @if($selectedLocation === 'RK1C') selected @endif">RK1C</div>
                <div class="box @if($selectedLocation === 'RK2C') selected @endif">RK2C</div>
                <div class="box @if($selectedLocation === 'RK3C') selected @endif">RK3C</div> 
                <div class="box @if($selectedLocation === 'RK4C') selected @endif">RK4C</div> 
                <div class="box @if($selectedLocation === 'RK5C') selected @endif">RK5C</div> 
                <div class="box @if($selectedLocation === 'RK6C') selected @endif">RK6C</div> 
                <div class="box @if($selectedLocation === 'RK7C') selected @endif">RK7C</div> 
                <div class="box @if($selectedLocation === 'RK8C') selected @endif">RK8C</div> 
                <div class="box @if($selectedLocation === 'RK9C') selected @endif">RK9C</div> 
                <div class="box @if($selectedLocation === 'RK10C') selected @endif">RK10C</div> 
                <div class="box @if($selectedLocation === 'RK11C') selected @endif">RK11C</div> 
                <div class="box @if($selectedLocation === 'RK12C') selected @endif">RK12C</div>
              </div>
        
              <div class="column">
                <div style="color: #660066; font-size: 30px; font-weight: bold;">RK-B</div>
                <div class="box @if($selectedLocation === 'RK1B') selected @endif">RK1B</div>
                <div class="box @if($selectedLocation === 'RK2B') selected @endif">RK2B</div>
                <div class="box @if($selectedLocation === 'RK3B') selected @endif">RK3B</div> 
                <div class="box @if($selectedLocation === 'RK4B') selected @endif">RK4B</div> 
                <div class="box @if($selectedLocation === 'RK5B') selected @endif">RK5B</div> 
                <div class="box @if($selectedLocation === 'RK6B') selected @endif">RK6B</div> 
                <div class="box @if($selectedLocation === 'RK7B') selected @endif">RK7B</div> 
                <div class="box @if($selectedLocation === 'RK8B') selected @endif">RK8B</div> 
                <div class="box @if($selectedLocation === 'RK9B') selected @endif">RK9B</div> 
                <div class="box @if($selectedLocation === 'RK10B') selected @endif">RK10B</div> 
                <div class="box @if($selectedLocation === 'RK11B') selected @endif">RK11B</div> 
                <div class="box @if($selectedLocation === 'RK12B') selected @endif">RK12B</div>
                <div class="box @if($selectedLocation === 'RK13B') selected @endif">RK13B</div>
                <div class="box @if($selectedLocation === 'RK14B') selected @endif">RK14B</div>
                <div class="box @if($selectedLocation === 'RK15B') selected @endif">RK15B</div>
                <div class="box @if($selectedLocation === 'RK16B') selected @endif">RK16B</div>
                <div class="box @if($selectedLocation === 'RK17B') selected @endif">RK17B</div>
                <div class="box @if($selectedLocation === 'RK18B') selected @endif">RK18B</div>
              </div>
        
              <div class="column">
                <div style="color: #660066; font-size: 30px; font-weight: bold;">RK-A</div>
                <div class="box @if($selectedLocation === 'RK1A') selected @endif">RK1A</div>
                <div class="box @if($selectedLocation === 'RK2A') selected @endif">RK2A</div>
                <div class="box @if($selectedLocation === 'RK3A') selected @endif">RK3A</div> 
                <div class="box @if($selectedLocation === 'RK4A') selected @endif">RK4A</div> 
                <div class="box @if($selectedLocation === 'RK5A') selected @endif">RK5A</div> 
                <div class="box @if($selectedLocation === 'RK6A') selected @endif">RK6A</div> 
                <div class="box @if($selectedLocation === 'RK7A') selected @endif">RK7A</div> 
                <div class="box @if($selectedLocation === 'RK8A') selected @endif">RK8A</div>
                <div class="box @if($selectedLocation === 'RK9A') selected @endif">RK9A</div> 
                <div class="box @if($selectedLocation === 'RK10A') selected @endif">RK10A</div> 
                <div class="box @if($selectedLocation === 'RK11A') selected @endif">RK11A</div> 
                <div class="box @if($selectedLocation === 'RK12A') selected @endif">RK12A</div>
                <div class="box @if($selectedLocation === 'RK13A') selected @endif">RK13A</div>
                <div class="box @if($selectedLocation === 'RK14A') selected @endif">RK14A</div>
                <div class="box @if($selectedLocation === 'RK15A') selected @endif">RK15A</div>
                <div class="box @if($selectedLocation === 'RK16A') selected @endif">RK16A</div>
                <div class="box @if($selectedLocation === 'RK17A') selected @endif">RK17A</div>
                <div class="box @if($selectedLocation === 'RK18A') selected @endif">RK18A</div>
              </div>
          </div>

          <div style="position: absolute; top: 400px;  left: 275px;">
            <div class="door">DOOR</div>
          </div> 

          <div style="position: absolute; top: 450px;  left: 1227px;">
            <div class="horizontal @if($selectedLocation === 'KB1F') selected @endif">KB1F</div>
          </div> 

          <div style="position: absolute; top: 327px;  left: 1000px;">
            <div class="box @if($selectedLocation === 'KB1E') selected @endif">KB1E</div>
          </div> 

          <div style="position: absolute; top: 327px;  left: 900px;">
            <div class="box @if($selectedLocation === 'KB1D') selected @endif">KB1D</div>
          </div> 

          <div style="position: absolute; top: 327px;  left: 800px;">
            <div class="box @if($selectedLocation === 'KB1C') selected @endif">KB1C</div>
          </div> 

          <div style="position: absolute; top: 327px;  left: 600px;">
            <div class="box @if($selectedLocation === 'KB1B') selected @endif">KB1B</div>
          </div> 

          <div style="position: absolute; top: 327px;  left: 400px;">
            <div class="box @if($selectedLocation === 'KB1A') selected @endif">KB1A</div>
          </div> 

          <div style="position: absolute; top: 600px;  left: 275px;">
            <div class="horizontal @if($selectedLocation === 'KB1G') selected @endif">KB1G</div>
          </div> 

          <div style="position: absolute; top: 800px;  left: 275px;">
            <div class="horizontal @if($selectedLocation === 'KB1H') selected @endif">KB1H</div>
          </div> 

          <div style="position: absolute; top: 1000px;  left: 275px;">
            <div class="horizontal @if($selectedLocation === 'KB1J') selected @endif">KB1J</div>
          </div> 



        </div>



          
          <br></br>

            
    </div>
</div>



@include("ADMIN.adminscript")
</body>
</html>