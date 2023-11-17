
@extends('ADMIN.viewdocinfo')
@section('xxx')

  <div class="container-scroller">

  
       
          <div class="content-wrapper pb-0">
            
            


            <div>
              <p></p>
                <ul>
                  <li></li>
                    <button type="button" class="btn btn-primary mr-2" onclick="window.location.href='/uploadfiles'">+ NEW</button>
                  <li></li>
                </ul>
            </div> 


            


            <div class="row">
              <div class="">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Files</h4>
                    
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Document name</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Last used by</th>
                            <th>Manage</th>
                            <th>Status</th>
                            <th>Update</th>
                            <th>Download</th>
                            <th>Operation</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{$data->DocName}}</td>
                            <td>{{$data->DocDate}}</td>
                            <td>{{$data->Location}}</td>
                            <td>{{$data->LastUsed}}</td>
                            <td>
                            <a class="badge badge-danger" href={{"documentinfo/".$data['DocID']}}>View</a>
                            </td>
                            <td>{{$data->status}}</td>
                            <td>
                            <a class="badge badge-danger" href="">Update</a>
                            </td>
                            <td>
                            <a class="badge badge-danger" href="">Download</a>
                            </td>
                            <td>
                            <a class="badge badge-danger" href={{"deleteDoc/".$data['DocID']}} >Delete</a>
                            </td>
                            <td>
                            <iframe height="400"  width="400" src="/assets/AllDocuments/{{$data->DocUpload}}"></iframe>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <br></br>

                    

                  </div>
                </div>
              </div>
            </div>






            
          </div>
 
        
  </div>


  @stop