<!--This page for floorplan button on navbar-->

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

          <br></br>
          <br></br>

        <div class="centerBox">
          <div class="box-container">
              <div class="column">
                <div style="color: #660066; font-size: 30px; font-weight: bold;">RK-D</div>
                <div class="box">RK1D</div>
                <div class="box">RK2D</div>
                <div class="box">RK3D</div> 
                <div class="box">RK4D</div> 
                <div class="box">RK5D</div> 
                <div class="box">RK6D</div> 
                <div class="box">RK7D</div> 
                <div class="box">RK8D</div> 
                <div class="box">RK9D</div> 
                <div class="box">RK10D</div> 
                <div class="box">RK11D</div> 
                <div class="box">RK12D</div> 
              </div>
        
              <div class="column">
                <div style="color: #660066; font-size: 30px; font-weight: bold;">RK-C</div>
                <div class="box">RK1C</div>
                <div class="box">RK2C</div>
                <div class="box">RK3C</div> 
                <div class="box">RK4C</div> 
                <div class="box">RK5C</div> 
                <div class="box">RK6C</div> 
                <div class="box">RK7C</div> 
                <div class="box">RK8C</div> 
                <div class="box">RK9C</div> 
                <div class="box">RK10C</div> 
                <div class="box">RK11C</div> 
                <div class="box">RK12C</div>
              </div>
        
              <div class="column">
                <div style="color: #660066; font-size: 30px; font-weight: bold;">RK-B</div>
                <div class="box">RK1B</div>
                <div class="box">RK2B</div>
                <div class="box">RK3B</div> 
                <div class="box">RK4B</div> 
                <div class="box">RK5B</div> 
                <div class="box">RK6B</div> 
                <div class="box">RK7B</div> 
                <div class="box">RK8B</div> 
                <div class="box">RK9B</div> 
                <div class="box">RK10B</div> 
                <div class="box">RK11B</div> 
                <div class="box">RK12B</div>
                <div class="box">RK13B</div>
                <div class="box">RK14B</div>
                <div class="box">RK15B</div>
                <div class="box">RK16B</div>
                <div class="box">RK17B</div>
                <div class="box">RK18B</div>
              </div>
        
              <div class="column">
                <div style="color: #660066; font-size: 30px; font-weight: bold;">RK-A</div>
                <div class="box">RK1A</div>
                <div class="box">RK2A</div>
                <div class="box">RK3A</div> 
                <div class="box">RK4A</div> 
                <div class="box">RK5A</div> 
                <div class="box">RK6A</div> 
                <div class="box">RK7A</div> 
                <div class="box">RK8A</div> 
                <div class="box">RK9A</div> 
                <div class="box">RK10A</div> 
                <div class="box">RK11A</div> 
                <div class="box">RK12A</div>
                <div class="box">RK13A</div>
                <div class="box">RK14A</div>
                <div class="box">RK15A</div>
                <div class="box">RK16A</div>
                <div class="box">RK17A</div>
                <div class="box">RK18A</div>
              </div>

               
          </div>

          <div style="position: absolute; top: 400px;  left: 275px;">
            <div class="door">DOOR</div>
          </div> 

          <div style="position: absolute; top: 450px;  left: 1227px;">
            <div class="horizontal">KB1F</div>
          </div> 

          <div style="position: absolute; top: 327px;  left: 1000px;">
            <div class="box">KB1E</div>
          </div> 

          <div style="position: absolute; top: 327px;  left: 900px;">
            <div class="box">KB1D</div>
          </div> 

          <div style="position: absolute; top: 327px;  left: 800px;">
            <div class="box">KB1C</div>
          </div> 

          <div style="position: absolute; top: 327px;  left: 600px;">
            <div class="box">KB1B</div>
          </div> 

          <div style="position: absolute; top: 327px;  left: 400px;">
            <div class="box">KB1A</div>
          </div> 

          <div style="position: absolute; top: 600px;  left: 275px;">
            <div class="horizontal">KB1G</div>
          </div> 

          <div style="position: absolute; top: 800px;  left: 275px;">
            <div class="horizontal">KB1H</div>
          </div> 

          <div style="position: absolute; top: 1000px;  left: 275px;">
            <div class="horizontal">KB1J</div>
          </div> 



        </div>



          
          <br></br>
          <br></br>
          <br></br>
          <br></br>

            
    </div>
</div>



@include("ADMIN.adminscript")
</body>
</html>