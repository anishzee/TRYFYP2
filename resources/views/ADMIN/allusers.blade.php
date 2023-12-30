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

.round2 {
  border: 2px solid lightblue;
  border-radius: 8px;
  padding: 5px;
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
          
          <br></br><br></br>
          <div class="row">
            <div class="">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="text-align: center; font-size: 18px;">All Users</h4>
                  <br></br>
                  <div >
                    <input type="text" id="searchInput" class="round2" onkeyup="searchTable()" placeholder="Search for names..">
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </div>
                  <br></br>
                  <div class="table-responsive">
                  
                    <table class="table table-hover" id="searchTable">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $key => $user)
                        <tr>
                          <td>{{ $key + 1 }}</td> <!-- Display the numbering starting from 1 -->
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>
                            <a class="btn btn-danger" href={{"del/".$user['id']}}>Delete🗑️</a> 
                          </td>
                        </tr>
                        @endforeach
          
                      </tbody>
                    </table>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <br></br>
                    <span class="centerALL">
                      {{$data->links('vendor.pagination.bootstrap-4')}}
                    </span>

                   


          
          <br></br>
          <br></br>
          <br></br>
         
          <br></br>
          
          <br></br>
          <br></br>
          <br></br>
          <br></br>
         
            
          
        </div>

            
      </div>
</div>

    <script>
          function searchTable() {
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("searchInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("searchTable");
              tr = table.getElementsByTagName("tr");

              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }
              }
          }
    </script>






 


@include("ADMIN.adminscript")
</body>
</html>