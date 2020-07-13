
  <div class="" ng-init="getData();">
    <div class="page-title">
      <div class="title_left">
        <h3>Menu Manage</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Menu Manage </h2>
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

             <div class="col-md-3"> 
                       <input type="text" name="search" id="search" ng-model="where.name" class="form-control col-md-3"  placeholder="Search" ng-keyup="getData('menuList', where)">
                    </div>
                   <div class="col-md-9">
                         <button class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">Add New</button>
                    </div>


              
              
              <table class="table table-bordered">
                   <thead>
                       <tr>
                          <th>
                            <input type="checkbox" ng-model="dummay.masterCheck">
                          </th>
                          <th>#</th>
                          <th>Name</th>
                          <th>Route</th>
                          <th>Tepmlate</th>
                          <th>Data Url</th>
                          <th>Action</th>
                       </tr>
                   </thead>

                   <tbody>
                       <tr ng-repeat="x in menuList" ng-init="sl=1">
                           <td><input type="checkbox" ng-model="x.child"></td>
                           <td>{{ sl + $index }}</td>
                           <td>{{ x.name }}</td>
                           <td>{{ x.route }}</td>
                           <td>{{ x.templateUrl }}</td>
                           <td>{{ x.dataUrl }}</td>
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
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" ng-model="formData.name"  placeholder="name">
        </div>
          <div class="form-group">
            <label for="route">Route</label>
            <input type="text" class="form-control" name="route" id="route" placeholder="Route" ng-model ="formData.route">
        </div> 

        <div class="form-group">
            <label for="templateUrl">Template templateUrl</label>
            <input type="text" class="form-control" name="templateUrl" id="templateUrl" placeholder="Template Url" ng-model ="formData.templateUrl">
        </div>      

        <div class="form-group">
            <label for="dataUrl">Data Url</label>
            <input type="text" class="form-control" name="dataUrl" id="dataUrl" placeholder="Data url" ng-model ="formData.dataUrl">
        </div>      

        <div class="form-group">
            <label for="actionUrl">Action Url</label>
            <input type="text" class="form-control" name="actionUrl" id="actionUrl" placeholder="Action Url" ng-model ="formData.actionUrl">
        </div>      

        <div class="form-group">
            <label for="status">status</label>
            <select name="status" ng-model="formData.status" class="form-control">
                <option value="1" selected>Active</option>  
                <option value="0">In Active</option>  
            </select>
           
        </div>      


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" ng-click="submitForm('menuCreate', addForm, formData, getData)">Save</button>
        </div>
      </div>
    </div>
  </form>
</div>
				        