<!DOCTYPE html>
<html lang="en" ng-app="myModule">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="_token" content="{{ csrf_token() }}"/>
        <meta charset="utf-8" />
        <title>Angular Js</title>
        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="icon" href="{{ asset('resources/img/logo.png') }}" type="image/x-icon" />
        @include('common.cssLinkPage')
       
    </head>
      <body class="nav-md">


      	<!-- <div class="loader-wrapper main-loader" ng-show="appLoading">
		    <div class="loader-content">
		        <img src="<?php echo asset('public/assets/img/sizram-solutions.png') ?>"/>
		        <h5>Please wait, while we work our magic!</h5>
		        <div class="progress progress-striped active" style="width: 280px; margin: auto">
		            <div style="width: 110%" class="progress-bar pos-rel"></div>
		        </div>
		    </div>
		</div>
 -->


      	

        <div class="container body">
            <div class="main_container">

            <!-- <div class="loader-wrapper pre-loader" ng-show="loading">
			    <div class="loader-content">
			        <h5>Please wait, data is processing!</h5>
			        <div class="progress progress-striped active" style="width: 280px; margin: auto">
			            <div style="width: 110%" class="progress-bar pos-rel"></div>
			        </div>
			    </div>
			</div>
 -->
    

                <!--  left part start  -->
                     @include('common.leftSidebarPage')
                <!--  left part end -->

                <!-- top navigation -->
                     @include('common.headerPage')
                <!-- /top navigation -->

                <!-- page content -->
                    
                   

				    <div class="right_col" role="main" >
				    	<ng-view>
				           <div class="">
				            <div class="page-title">
				              <div class="title_left">
				                <h3>Dashboard</h3>
				              </div>
				            </div>

				            <div class="clearfix"></div>

				            <div class="row">
				              <div class="col-md-12 col-sm-12 col-xs-12">
				                <div class="x_panel">
				                  <div class="x_title">
				                    <h2>Dashboard</h2>
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
				                      

				                     

				                  </div>
				                </div>
				              </div>
				            </div>
				          </div>
				        </ng-view>
				    </div>
				    



                 @include('common.jsLinkPage')
                <!-- /page content -->

                <!-- footer content -->
                   @include('common.footerPage')
                <!-- /footer content -->

               

            </div>
        </div>

        



      


    </body>
            
    </html>      
        
         
        




