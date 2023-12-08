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




    </style>
  </head>
 <body>


  <div class="container-scroller">

    @include("ADMIN.navbar")
        <div class="">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hi, welcome back Admin!
              </h3>
              
            </div>
            
            <div class="row">
                

              <div class="col-xl-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-7">
                        <h5>Live Updates</h5>
                        <p id="currentDate" class="text-muted">Show overview of</p>
                        <script>
                          // Get the current date
                          var currentDate = new Date();

                          // Format the date as MM/DD/YYYY
                          var formattedDate =
                            currentDate.getDate().toString().padStart(2, '0') +
                            '/' +
                            (currentDate.getMonth() + 1).toString().padStart(2, '0') +
                            '/' +
                            currentDate.getFullYear();

                          // Update the content of the element with id "currentDate"
                          document.getElementById('currentDate').innerText = 'Show overview ' + formattedDate;
                        </script>

                      </div>
                      
                      
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="card mb-3 mb-sm-0">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">In Used Documents</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">Total: {{ \App\Models\documentinfo::where('status', 'In Used')->count() }}</h3>
                                <p class="text-success m-0">as of today</p>
                              </div>
                              <div id="earningChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card mb-3 mb-sm-0">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Available Documents</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">Total: {{ \App\Models\documentinfo::where('status', 'Available')->count() }}</h3>
                                <p class="text-danger m-0">as of today</p>
                              </div>
                              <div id="productChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Total All Documents</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">Total: {{ \App\Models\DocumentInfo::count() }}</h3>
                                <p style="color: #ffc34d; margin: 0;">as of today</p>
                              </div>
                              <div id="orderChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row my-3">
                      <div class="col-sm-12" style="display: flex; justify-content: center;">
                        <div class="flot-chart-wrapper" >
                          <canvas id="documentStatusChart" class="flot-base" style="height: 300px;"></canvas>
                          <p class="text-muted mb-0">
                            The bar chart visually represents the status of documents, offering a clear depiction of the distribution across various categories. Each bar corresponds to a specific document status, and the height of the bars illustrates the quantity or count associated with each status. 
                          </p>
                        </div>
                      </div>
                    </div>
                    
                  <script src="https://cdn.jsdelivr.net/npm/chart.js"> 
                  //to load Chart.js from a CDN 
                  </script> 

                  <script>
                    // Assuming you have defined these variables in your Blade template
                      var inUsedCount = {{ \App\Models\DocumentInfo::where('status', 'In Used')->count() }};
                      var availableCount = {{ \App\Models\DocumentInfo::where('status', 'Available')->count() }};
                      var totalCount = {{ \App\Models\DocumentInfo::count() }};

                    // Get the canvas element
                      var ctx = document.getElementById('documentStatusChart').getContext('2d');

                    // Create the chart
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['In Used', 'Available', 'Total'],
                            datasets: [{
                                label: 'Document Status Updates',
                                data: [inUsedCount, availableCount, totalCount],
                                backgroundColor: [
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                ],
                                borderColor: [
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 206, 86, 1)',
                                ],
                                borderWidth: 0
                            }]
                        },
                        options: {
                          scales: {
                              y: {
                                  beginAtZero: true
                                }
                            },
                            plugins: {
                              title: {
                                display: true,
                                text: 'Document Status Overview'
                              },
                              legend: {
                                display: false // Set display to false to hide the legend
                              }
                            } 
                          }
                      });
                  </script>

                    
                  </div>
                </div>
              </div>  
            </div>



            <div>
              <p></p>
                <ul>
                  <li></li>
                  <button type="button" class="btn btn-primary mr-2" onclick="window.location.href='/uploadfiles'">+ NEW</button>
                 
                  <li></li>
                  <li></li>
                </ul>
            </div> 


            <div class="row">
              <div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Favorites Documents</h4>
                    
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover"  style="max-width: 100%; overflow-x: auto;">
                          <thead>
                            <tr>
                              <th>Document name</th>
                              <th>Date</th>
                              <th>Location</th>
                              <th>Last used by</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>


<br></br>



            
          </div>
 
              
        </div>
  </div>



  @include("ADMIN.adminscript")
 </body>
</html>