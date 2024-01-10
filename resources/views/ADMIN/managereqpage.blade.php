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

.container {
  position: relative;
  text-align: center;
  color: rgba(202, 201, 201, 0.982);
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
            
          @if(Session::has('success') || Session::has('fail'))
              <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
              <script>
                  $(document).ready(function(){
                    var alertElement = $('.alert');
                    alertElement.fadeIn();

                    // Hide the alert after a few seconds
                    setTimeout(function(){
                      alertElement.fadeOut();
                    }, 3000); // Adjust the delay time in milliseconds (e.g., 3000 for 3 seconds)
                  });
              </script>

              @if(Session::has('success'))
                  <div class="alert alert-success" style="display: none; background-color: #d4edda; color: #155724; border-color: #c3e6cb; padding: 10px;">
                    {{ Session::get('success') }}
                  </div>
              @elseif(Session::has('fail'))
                  <div class="alert alert-danger" style="display: none; background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; padding: 10px;">
                    {{ Session::get('fail') }}
                  </div>
              @endif
          @endif


            <br></br>
            <br></br>
            <div class="row">
              <div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center; font-size: 18px;">Requested Document</h4>
                    <br></br>
                   
                    <div class="table-responsive">
                        <table class="table table-hover"  style="max-width: 100%; overflow-x: auto;">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Document name</th>
                              <th>Requested by</th>
                              <th>Status</th>
                              <th>Location</th>
                              <th>Manage</th>
                              <!-- <th>Manage</th> -->
                              <th>Request status</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($userRequested as $key => $r)
                            <tr>
                              <td>{{ $key + 1 }}</td> <!-- Display the numbering starting from 1 -->
                              <td>
                                  {{ $r->DocName }}
                              </td>
                              <td>{{ $r->UserName }}</td>
                              <td style="font-size: 14px; color: {{ $r->status === 'Available' ? 'green' : ($r->status === 'In Used' ? 'red' : 'black') }};">
                                {{$r->status}}
                              </td>
                              <td>
                                <a title="View location" class="btn btn-success" href="{{url('/floorplan')}}">{{$r->Location}}</a>
                              </td>
                              <td>
                                <a title="View document" class="btn btn-success" href={{"documentinfo/".$r['DocID']}}>View📑</a>
                              </td>
                              <!-- <td>
                                <a title="Delete document" class="btn btn-danger" href={{"removeReqAdmin/".$r['ReqID']}}>Remove🗑️</a>
                              </td> -->
                              <td>
                                <form method="post" action="{{ route('updateStatus', ['id' => $r->ReqID]) }}">
                                  @csrf
                                  @method('patch') 
                                  <select name="status" class="form-control" onchange="handleChange(this, {{ $r->ReqID }})" style="background-color:
                                    {{ $r->ReqStatus === 'Pending' || $r->ReqStatus === 'pending' ? '#ffc107' :
                                      ($r->ReqStatus === 'Accepted' || $r->ReqStatus === 'accepted' ? '#28a745' :
                                      ($r->ReqStatus === 'Rejected' || $r->ReqStatus === 'rejected' ? '#dc3545' :
                                      ($r->ReqStatus === 'Done' || $r->ReqStatus === 'done' ? '#007bff' : ''))) }};
                                    color: #fff; border-color: #ced4da; border-radius: 5px; padding: 8px; font-weight: bold;">
                                    <option value="Pending" {{ $r->ReqStatus === 'Pending' || $r->ReqStatus === 'pending' ? 'selected' : '' }} style="background-color: grey; color: #212529;" disabled>Pending</option>
                                    <option value="Accepted" {{ $r->ReqStatus === 'Accepted' || $r->ReqStatus === 'accepted' ? 'selected' : '' }} style="background-color: #28a745; color: #fff;">Accepted</option>
                                    <option value="Rejected" {{ $r->ReqStatus === 'Rejected' || $r->ReqStatus === 'rejected' ? 'selected' : '' }} style="background-color: #dc3545; color: #fff;">Rejected</option>
                                    <option value="Done" {{ $r->ReqStatus === 'Done' || $r->ReqStatus === 'done' ? 'selected' : '' }} style="background-color: #007bff; color: #fff;">Done</option>
                                  </select>
                                </form>
                              </td>
                            </tr>
                          @endforeach

                          <!-- Modal for confirmation -->
                          <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  This option will delete the request, are you sure you want to delete this record?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <button type="button" class="btn btn-danger" onclick="deleteRecord()">Delete</button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <script>
                              function handleChange(select, reqID) {
                                  if (select.value === 'Done') {
                                      // Show the confirmation modal
                                      $('#confirmationModal').modal('show');
                                      // Set the data attributes for deletion
                                      $('#confirmationModal').attr('data-req-id', reqID);
                                      $('#confirmationModal').attr('data-previous-index', select.selectedIndex);
                                  } else {
                                      // Save the previous index when the value is not 'Done'
                                      select.setAttribute('data-previous-index', select.selectedIndex);
                                      select.form.submit();
                                  }
                              }

                              function deleteRecord() {
                                  // Get the selected option element
                                  var select = document.getElementsByName('status')[0];
                                  // Get the data attributes set in the modal
                                  var reqID = $('#confirmationModal').data('req-id');
                                  var previousIndex = $('#confirmationModal').data('previous-index');
                                  // Redirect to the delete route
                                  window.location.href = "{{ url('removeReqAdmin') }}/" + reqID;
                              }
                          </script>


                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <br></br>
                    <span class="centerALL">
                      {{$userRequested->links('vendor.pagination.bootstrap-4')}}
                    </span>


            <br></br>
            <br></br>
             
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



  @include("ADMIN.adminscript")
 </body>
</html>