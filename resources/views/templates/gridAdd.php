
  <div class="" ng-init="getData();">
    <div class="page-title">
      <div class="title_left">
        <h3>Add Grid</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Grid </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              
              <button class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">Add New</button>
              <table class="table table-bordered">
                   <thead>
                       <tr>
                          <th>#</th>
                          <th>Category </th>
                          <th>Action</th>
                       </tr>
                   </thead>

                   <tbody>
                       <tr ng-repeat="x in categoryList" ng-init="sl=1">
                           <td>{{ sl + $index }}</td>
                           <td>{{ x.cate_name }}</td>
                            <td>
                              <button data-toggle="modal" data-target="#myModal" class="btn btn-info" ng-click="edit(x)">Edit</button> | <button class="btn btn-info" ng-click="delete('delete/'+x.id, getData)">Delete</button>
                            </td>
                       </tr>
                   </tbody>




                 
              </table>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<form name="addForm">

   <input type="hidden" name="id" id="id" ng-modal="formData.id">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add New</h4>

          <div> {{ alert }}</div>
        </div>
        <div class="modal-body">

             
        <div class="form-group">
          <label for="myFile">Image</label>
           <input type = "file" file-model = "myFile"/>
        </div>
               

        


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" ng-click = "uploadFile()">Save</button>
        </div>
      </div>
    </div>
  </form>
</div>
				        