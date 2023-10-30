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
                  <h4 class="card-title">Basic form elements</h4>
                  
                  
                    <form class="forms-sample" method="post" action="/addDocument"> 
                      @csrf
                      <div class="form-group">
                        <label for="name">Document Name: </label>
                        <input type="text" class="form-control" name="docname" placeholder="Document Name" required>
                      </div>
                      <div class="form-group">
                        <label for="docdate">Date:</label>
                        <input type="date" class="form-control" name="docdate"  required>
                      </div>
                      <div class="form-group">
                        <label for="location">Location: </label>
                        <input type="text" class="form-control" maxlength="5" name="location" placeholder="Location" required>
                      </div>
                      <div class="form-group">
                        <label for="lastused">Last Used: </label>
                        <input type="text" class="form-control" name="lastused" placeholder="Last Used" required>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="document" class="file-upload-default" />
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






          
        </div>

            
    </div>
</div>



@include("ADMIN.adminscript")
</body>
</html>



