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

    </style>
  </head>
  <body>


<div class="container-scroller">

  @include("ADMIN.navbar")
      <div class="">
        <div class="content-wrapper pb-0">
          
        <br></br>
          <div class="row">
            <div class="">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Users</h4>
                  
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>User ID</th>
                          <th>Username</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Anishah</td>
                          <td>Anishah@gmail.com</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Niss</td>
                          <td>Anishah@gmail.com</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Hawa</td>
                          <td>Hawa@gmail.com</td>
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