
     
    
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" ><img src="../admin/assets/images/LOGOREPO.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="../admin/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>

        <br></br>
        <ul class="nav">
          
          <li class="nav-item">
            <a class="nav-link" title="View dashboard" href="{{url('/redirect')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" title="View all documents" href="{{url('/allfilesUser')}}">
              <i class="mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">All Files</span>
            </a>
    
          </li>
          <li class="nav-item">
            <a class="nav-link" title="View requested documents" href="{{url('/reqstatsUser')}}"> 
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Request Status</span>
            </a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link" title="Tutorial" href="{{url('/helpUser')}}">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Help</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" title="Visual of the store room" href="{{url('/floorplanUser')}}">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Floor Plan</span>
            </a>
          </li>
          
          
        </ul>
      </nav>
   
        
        
        <!-- main-panel ends -->
      
      <!-- page-body-wrapper ends -->
   
    <!-- container-scroller -->