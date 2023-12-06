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
          
         <br></br>
          <div class="row">
              <div class="card" style="width: 60%; margin: 0 auto;">
                <div class="card-body">
                  <h4 class="card-title">Update files</h4>
                  
                  
                    <form class="forms-sample" method="post" action="/edit" > 
                      @csrf

                      <div class="form-group">
                        <input type="hidden" class="form-control" name="DocID" value="{{$disp['DocID']}}" readonly>
                      </div>  
                      <div class="form-group">
                        <label for="DocName">Document Name: </label>
                        <input type="text" class="form-control" name="DocName" value="{{$disp['DocName']}}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="DocDate">Date:</label>
                        <input type="date" class="form-control" name="DocDate"  value="{{$disp['DocDate']}}" required>
                      </div>

                      <div class="form-group">
                        <label for="Location">Location: </label>
                          <select class="city" style="width:100%" name="Location" required >
                            <option value="KB1A"{{ ($disp->Location=="KB1A")? "selected" : "" }}>KB1A</option>
                            <option value="KB1B"{{ ($disp->Location=="KB1B")? "selected" : "" }}>KB1B</option>
                            <option value="KB1C"{{ ($disp->Location=="KB1C")? "selected" : "" }}>KB1C</option>
                            <option value="KB1D"{{ ($disp->Location=="KB1D")? "selected" : "" }}>KB1D</option>
                            <option value="KB1E"{{ ($disp->Location=="KB1E")? "selected" : "" }}>KB1E</option>
                            <option value="KB1F"{{ ($disp->Location=="KB1F")? "selected" : "" }}>KB1F</option>
                            <option value="KB1G"{{ ($disp->Location=="KB1G")? "selected" : "" }}>KB1G</option>
                            <option value="KB1H"{{ ($disp->Location=="KB1H")? "selected" : "" }}>KB1H</option>
                            <option value="KB1J"{{ ($disp->Location=="KB1J")? "selected" : "" }}>KB1J</option>
                            <option value="RK1A"{{ ($disp->Location=="RK1A")? "selected" : "" }}>RK1A</option>
                            <option value="RK2A"{{ ($disp->Location=="RK2A")? "selected" : "" }}>RK2A</option>
                            <option value="RK3A"{{ ($disp->Location=="RK3A")? "selected" : "" }}>RK3A</option>
                            <option value="RK4A"{{ ($disp->Location=="RK4A")? "selected" : "" }}>RK4A</option>
                            <option value="RK5A"{{ ($disp->Location=="RK5A")? "selected" : "" }}>RK5A</option>
                            <option value="RK6A"{{ ($disp->Location=="RK6A")? "selected" : "" }}>RK6A</option>
                            <option value="RK7A"{{ ($disp->Location=="RK7A")? "selected" : "" }}>RK7A</option>
                            <option value="RK8A"{{ ($disp->Location=="RK8A")? "selected" : "" }}>RK8A</option>
                            <option value="RK9A"{{ ($disp->Location=="RK9A")? "selected" : "" }}>RK9A</option>
                            <option value="RK10A"{{ ($disp->Location=="RK10A")? "selected" : "" }}>RK10A</option>
                            <option value="RK11A"{{ ($disp->Location=="RK11A")? "selected" : "" }}>RK11A</option>
                            <option value="RK12A"{{ ($disp->Location=="RK12A")? "selected" : "" }}>RK12A</option>
                            <option value="RK13A"{{ ($disp->Location=="RK13A")? "selected" : "" }}>RK13A</option>
                            <option value="RK14A"{{ ($disp->Location=="RK14A")? "selected" : "" }}>RK14A</option>
                            <option value="RK15A"{{ ($disp->Location=="RK15A")? "selected" : "" }}>RK15A</option>
                            <option value="RK16A"{{ ($disp->Location=="RK16A")? "selected" : "" }}>RK16A</option>
                            <option value="RK17A"{{ ($disp->Location=="RK17A")? "selected" : "" }}>RK17A</option>
                            <option value="RK18A"{{ ($disp->Location=="RK18A")? "selected" : "" }}>RK18A</option>
                            <option value="RK1B"{{ ($disp->Location=="RK1B")? "selected" : "" }}>RK1B</option>
                            <option value="RK2B"{{ ($disp->Location=="RK2B")? "selected" : "" }}>RK2B</option>
                            <option value="RK3B"{{ ($disp->Location=="RK3B")? "selected" : "" }}>RK3B</option>
                            <option value="RK4B"{{ ($disp->Location=="RK4B")? "selected" : "" }}>RK4B</option>
                            <option value="RK5B"{{ ($disp->Location=="RK5B")? "selected" : "" }}>RK5B</option>
                            <option value="RK6B"{{ ($disp->Location=="RK6B")? "selected" : "" }}>RK6B</option>
                            <option value="RK7B"{{ ($disp->Location=="RK7B")? "selected" : "" }}>RK7B</option>
                            <option value="RK8B"{{ ($disp->Location=="RK8B")? "selected" : "" }}>RK8B</option>
                            <option value="RK9B"{{ ($disp->Location=="RK9B")? "selected" : "" }}>RK9B</option>
                            <option value="RK10B"{{ ($disp->Location=="RK10B")? "selected" : "" }}>RK10B</option>
                            <option value="RK11B"{{ ($disp->Location=="RK11B")? "selected" : "" }}>RK11B</option>
                            <option value="RK12B"{{ ($disp->Location=="RK12B")? "selected" : "" }}>RK12B</option>
                            <option value="RK13B"{{ ($disp->Location=="RK13B")? "selected" : "" }}>RK13B</option>
                            <option value="RK14B"{{ ($disp->Location=="RK14B")? "selected" : "" }}>RK14B</option>
                            <option value="RK15B"{{ ($disp->Location=="RK15B")? "selected" : "" }}>RK15B</option>
                            <option value="RK16B"{{ ($disp->Location=="RK16B")? "selected" : "" }}>RK16B</option>
                            <option value="RK16B"{{ ($disp->Location=="RK17B")? "selected" : "" }}>RK17B</option>
                            <option value="RK18B"{{ ($disp->Location=="RK18B")? "selected" : "" }}>RK18B</option>
                            <option value="RK1C"{{ ($disp->Location=="RK1C")? "selected" : "" }}>RK1C</option>
                            <option value="RK2C"{{ ($disp->Location=="RK2C")? "selected" : "" }}>RK2C</option>
                            <option value="RK3C"{{ ($disp->Location=="RK3C")? "selected" : "" }}>RK3C</option>
                            <option value="RK4C"{{ ($disp->Location=="RK4C")? "selected" : "" }}>RK4C</option>
                            <option value="RK5C"{{ ($disp->Location=="RK5C")? "selected" : "" }}>RK5C</option>
                            <option value="RK6C"{{ ($disp->Location=="RK6C")? "selected" : "" }}>RK6C</option>
                            <option value="RK7C"{{ ($disp->Location=="RK7C")? "selected" : "" }}>RK7C</option>
                            <option value="RK8C"{{ ($disp->Location=="RK8C")? "selected" : "" }}>RK8C</option>
                            <option value="RK9C"{{ ($disp->Location=="RK9C")? "selected" : "" }}>RK9C</option>
                            <option value="RK10C"{{ ($disp->Location=="RK10C")? "selected" : "" }}>RK10C</option>
                            <option value="RK11C"{{ ($disp->Location=="RK11C")? "selected" : "" }}>RK11C</option>
                            <option value="RK12C"{{ ($disp->Location=="RK12C")? "selected" : "" }}>RK12C</option>
                            <option value="RK1D"{{ ($disp->Location=="RK1D")? "selected" : "" }}>RK1D</option>
                            <option value="RK2D"{{ ($disp->Location=="RK2D")? "selected" : "" }}>RK2D</option>
                            <option value="RK3D"{{ ($disp->Location=="RK3D")? "selected" : "" }}>RK3D</option>
                            <option value="RK4D"{{ ($disp->Location=="RK4D")? "selected" : "" }}>RK4D</option>
                            <option value="RK5D"{{ ($disp->Location=="RK5D")? "selected" : "" }}>RK5D</option>
                            <option value="RK6D"{{ ($disp->Location=="RK6D")? "selected" : "" }}>RK6D</option>
                            <option value="RK7D"{{ ($disp->Location=="RK7D")? "selected" : "" }}>RK7D</option>
                            <option value="RK8D"{{ ($disp->Location=="RK8D")? "selected" : "" }}>RK8D</option>
                            <option value="RK9D"{{ ($disp->Location=="RK9D")? "selected" : "" }}>RK9D</option>
                            <option value="RK10D"{{ ($disp->Location=="RK10D")? "selected" : "" }}>RK10D</option>
                            <option value="RK11D"{{ ($disp->Location=="RK11D")? "selected" : "" }}>RK11D</option>
                            <option value="RK12D"{{ ($disp->Location=="RK12D")? "selected" : "" }}>RK12D</option>
                          </select>
                      </div>

                      <div class="form-group">
                        <label for="LastUsed">Last Used: </label>
                        <input type="text" class="form-control" name="LastUsed" value="{{$disp['LastUsed']}}" required>
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                          <select style="width:100%" name="status" required >
                            <option value="In Used"{{ ($disp->status=="In Used")? "selected" : "" }}>In Used</option>
                            <option value="Available"{{ ($disp->status=="Available")? "selected" : "" }}>Available</option>
                          </select>
                    
                      </div>
                      
                      <button type="submit" class="btn btn-primary mr-2"> Update </button>
                      <button class="btn btn-light">Reset</button>
                    </form>
                </div>
              </div>
          </div>






          
        </div>

            
    </div>
</div>



@include("ADMIN.adminscript")
</body>
</html>



