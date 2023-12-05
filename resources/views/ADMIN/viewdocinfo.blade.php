<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include("ADMIN.admincss")

    <style>
      /* Your existing styles */

      .clickable-box {
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include("ADMIN.navbar")
      <div class="">
        <div class="content-wrapper pb-0">
          <div class="row">
            <div class="column">
              <div class="container">
                <img
                  src="admin/assets/images/dashboard/locationfloorplan.jpg"
                  alt="Location Floor Plan"
                  style="width: 100%;"
                  class="center clickable-box"
                  id="locationBox1"
                  onclick="changeColor('locationBox1')"
                />
              </div>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="">
              <div class="">
                <img
                  src="admin/assets/images/dashboard/floorplan.jpg"
                  alt="Regular Floor Plan"
                  style="width: 50%;"
                  class="clickable-box"
                  id="floorPlanBox1"
                  onclick="changeColor('floorPlanBox1')"
                />
              </div>
            </div>
          </div>
          <br />
        </div>
      </div>
    </div>
    @include("ADMIN.adminscript")
    <script>
      function changeColor(boxId) {
        var box = document.getElementById(boxId);
        // Example: Change the background color to red when clicked
        box.style.backgroundColor = 'red';
      }
    </script>
  </body>
</html>
