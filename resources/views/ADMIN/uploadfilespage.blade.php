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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".file-upload-browse").click(function () {
                $("input[type='file']").click();
            });

            // Display the selected file name in the input field
            $("input[type='file']").change(function () {
                var filename = $(this).val().split("\\").pop();
                $(".file-upload-info").val(filename);
            });
        }); // this script will allow user to choose file from their PC folder
    </script> 
  </head>
  <body>


<div class="container-scroller">

  @include("ADMIN.navbar")
    <div class="centerALL" >
        <div class="content-wrapper pb-0">
          @if(Session::has('success'))
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb; padding: 10px;">
              {{ Session::get('success') }}
            </div>
          @endif
         <br></br>
          <div class="row" >
              <div class="card" style="width: 60%; margin: 0 auto;">
                <div class="card-body"  >
                  <h4 class="card-title">Upload New Document</h4>
                  <br></br>
                  
                  
                    <form class="forms-sample" method="post" action="/addDocument" enctype="multipart/form-data"> 
                      @csrf
                      <div class="form-group">
                        <label for="name">Document Name: </label>
                        <input type="text" class="form-control" name="DocName" placeholder="Document Name" required>
                      </div>
                      <div class="form-group">
                        <label for="docdate">Date:</label>
                        <input type="date" class="form-control" name="DocDate"  required>
                      </div>

                      <div class="form-group">
                        <label for="location">Location: </label>
                          <select class="city" style="width:100%" name="Location" required >
                            <option value="KB1A">KB1A</option>
                            <option value="KB1B">KB1B</option>
                            <option value="KB1C">KB1C</option>
                            <option value="KB1D">KB1D</option>
                            <option value="KB1E">KB1E</option>
                            <option value="KB1F">KB1F</option>
                            <option value="KB1G">KB1G</option>
                            <option value="KB1H">KB1H</option>
                            <option value="KB1J">KB1J</option>
                            <option value="RK1A">RK1A</option>
                            <option value="RK2A">RK2A</option>
                            <option value="RK3A">RK3A</option>
                            <option value="RK4A">RK4A</option>
                            <option value="RK5A">RK5A</option>
                            <option value="RK6A">RK6A</option>
                            <option value="RK7A">RK7A</option>
                            <option value="RK8A">RK8A</option>
                            <option value="RK9A">RK9A</option>
                            <option value="RK10A">RK10A</option>
                            <option value="RK11A">RK11A</option>
                            <option value="RK12A">RK12A</option>
                            <option value="RK13A">RK13A</option>
                            <option value="RK14A">RK14A</option>
                            <option value="RK15A">RK15A</option>
                            <option value="RK16A">RK16A</option>
                            <option value="RK17A">RK17A</option>
                            <option value="RK18A">RK18A</option>
                            <option value="RK1B">RK1B</option>
                            <option value="RK2B">RK2B</option>
                            <option value="RK3B">RK3B</option>
                            <option value="RK4B">RK4B</option>
                            <option value="RK5B">RK5B</option>
                            <option value="RK6B">RK6B</option>
                            <option value="RK7B">RK7B</option>
                            <option value="RK8B">RK8B</option>
                            <option value="RK9B">RK9B</option>
                            <option value="RK10B">RK10B</option>
                            <option value="RK11B">RK11B</option>
                            <option value="RK12B">RK12B</option>
                            <option value="RK13B">RK13B</option>
                            <option value="RK14B">RK14B</option>
                            <option value="RK15B">RK15B</option>
                            <option value="RK16B">RK16B</option>
                            <option value="RK16B">RK17B</option>
                            <option value="RK18B">RK18B</option>
                            <option value="RK1C">RK1C</option>
                            <option value="RK2C">RK2C</option>
                            <option value="RK3C">RK3C</option>
                            <option value="RK4C">RK4C</option>
                            <option value="RK5C">RK5C</option>
                            <option value="RK6C">RK6C</option>
                            <option value="RK7C">RK7C</option>
                            <option value="RK8C">RK8C</option>
                            <option value="RK9C">RK9C</option>
                            <option value="RK10C">RK10C</option>
                            <option value="RK11C">RK11C</option>
                            <option value="RK12C">RK12C</option>
                            <option value="RK1D">RK1D</option>
                            <option value="RK2D">RK2D</option>
                            <option value="RK3D">RK3D</option>
                            <option value="RK4D">RK4D</option>
                            <option value="RK5D">RK5D</option>
                            <option value="RK6D">RK6D</option>
                            <option value="RK7D">RK7D</option>
                            <option value="RK8D">RK8D</option>
                            <option value="RK9D">RK9D</option>
                            <option value="RK10D">RK10D</option>
                            <option value="RK11D">RK11D</option>
                            <option value="RK12D">RK12D</option>
                          </select>
                        </div>

                      <div class="form-group">
                        <label for="lastused">Last Used: </label>
                        <input type="text" class="form-control" name="LastUsed" placeholder="Last Used" value="{{ auth()->user()->name }}" readonly required>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="DocUpload" class="file-upload-default" />

                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Document" />
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button"> Upload </button>
                          </span>
                        </div>
                      </div>
                      
                      <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
              </div>
          </div>




          <br></br>
          <br></br>
          <br></br>

          
        </div>

            
    </div>
</div>



@include("ADMIN.adminscript")
</body>
</html>



