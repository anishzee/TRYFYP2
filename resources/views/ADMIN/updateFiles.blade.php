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
        });
    </script>

  </head>
  <body>


<div class="container-scroller">

  @include("ADMIN.navbar")
    <div class="">
        <div class="content-wrapper pb-0">
          
         <br></br>
          <div class="row">
              <div class="card">
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
                        <input type="text" class="form-control" maxlength="5" name="Location" value="{{$disp['Location']}}" required>
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



