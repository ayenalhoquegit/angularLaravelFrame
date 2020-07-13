var app  = angular.module('myModule', ['ngRoute']);

app.controller('myController', function($scope){
    $scope.message   = "Welcome to dashboard...";
    console.log($scope.message);


    $scope.programmerList   = [
	        {  name : 'Sakib', age : 23},
	        {  name : 'Ayenal hoque', age : 23},
	        {  name : 'Mitun', age : 23}
	    ];  


});

app.config(function($routeProvider, $locationProvider){
	 $locationProvider.hashPrefix('');
     $routeProviderReference = $routeProvider;
});




app.run(['$rootScope','$route','$http','$document', function($rootScope, $route, $http, $document) {
    // ajax request to inialize application
    $http.get('menuInfo').then(function(response) {
        // append master data to rootScope
        angular.extend($rootScope, response.data);
        // generate dynamic routes
        angular.forEach($rootScope.menuInfo, function(v, k) {

            
                $routeProviderReference.when('/'+v.route, {
                    controller: 'MainController',
                    templateUrl: v.templateUrl,
                    dataUrl: v.dataUrl
                    
                });
            
        });

        $route.reload();
        
    });

    


    console.log('test');
}]);


app.controller('MainController', ['$scope','$http','$route', 'httpApi','fileUpload', function($scope, $http, $route, httpApi, fileUpload){

    $scope.states = {};
    $scope.states.activeItem = '1';

    $scope.range       = [];
    $scope.currentPage = 1;
    $scope.totalPages  = 0;
    $scope.dummay = {masterCheck: false};
   
     // generate list
    $scope.getData = function(dataUrl, where) {
        
        console.log();

        if(!angular.isDefined(dataUrl) || dataUrl == '') {
            dataUrl = $route.current.$$route.dataUrl;
        }

        console.log(where);

        $http.get(dataUrl, {params: where})
            .then(function(response){
                angular.extend($scope, response.data); 
                console.log(response);
            });           
    };





    // angular pagination 

    $scope.getItem = function(pageNumber){

    if(pageNumber===undefined){
      pageNumber = '1';
    }
        $http.get('itemList?page='+pageNumber).then(function(response) {

          angular.extend($scope, response.data); 
          $scope.totalPages   = response.data.itemList.last_page;
          $scope.currentPage  = response.data.itemList.current_page;

            // Pagination Range
            var pages = [];

            for(var i=1;i<=response.data.itemList.last_page;i++) {          
                pages.push(i);
            }

            $scope.range = pages;   

            console.log($scope.range);  

        });

    };


     // submit form
    $scope.submitFormValidation = function(isValid, action, form, data, callback, errorContainer, doNotReset) {
        // params validator
        if( !angular.isDefined(action) ) throw new Error("1st Params @ action is not defined");
        if( !angular.isDefined(form) ) throw new Error("2nd Params @ form Name is not defined");
        if( angular.isDefined(callback) && !angular.isArray(callback) && !angular.isFunction(callback) ) throw new Error("4th Params @ callback is not a function or array");
       
        if(isValid){
            httpApi.request({
                url: action,
                method: "POST",
                data: data
            }).then(function(response) {
                if(response.status == 200) {
                    $scope.formData = {};
                    if(angular.isDefined(response.data.redirect)) {
                        $scope.redirect(response.data.redirect);
                    } else {

                        if(angular.isFunction(callback)) {
                            callback();
                        }

                    }
                }
            });
        }
       
    };



    $scope.submitForm = function(action, form, data, callback, errorContainer, doNotReset) {
        // params validator
        if( !angular.isDefined(action) ) throw new Error("1st Params @ action is not defined");
        if( !angular.isDefined(form) ) throw new Error("2nd Params @ form Name is not defined");
        if( angular.isDefined(callback) && !angular.isArray(callback) && !angular.isFunction(callback) ) throw new Error("4th Params @ callback is not a function or array");
        
        
            httpApi.request({
                url: action,
                method: "POST",
                data: data
            }).then(function(response) {
                if(response.status == 200) {
                    $scope.formData = {};
                    if(angular.isDefined(response.data.redirect)) {
                        $scope.redirect(response.data.redirect);
                    } else {

                        if(angular.isFunction(callback)) {
                            callback();
                        }

                       
                    }
                }
            });
        
        
    };





    

    $scope.save  = function(){

        $http.post('menuCreate',  $scope.formData)
            .then(function(response){

            
                $scope.alert    = response.data; 
                $scope.formData = {};
                
                $http.get('menuList')
                     .then(function(response){
                     angular.extend($scope, response.data);
                    
                });

            
        });

    };






   $scope.edit  = function(menu){
        $scope.formData = angular.copy(menu);
    };

    $scope.delete  = function(delUrl, callback){
        var con  = confirm('Do you want to delete ?');
        if(con == true){   

            console.log(delUrl);
                 
            $http.post(delUrl, {})
                .then(function(response){
                if(angular.isFunction(callback)) {
                    callback();
                }
            });
        }
    };


    $scope.menuClass  = function(menu){
         console.log(menu);
        
    };


    // check all element

    $scope.$watch('dummay.masterCheck', function (newValue, oldValue) {

        angular.forEach($scope.menuList, function (menu) {
            menu.child = newValue;
        });

    });







    //  file upload 

    $scope.uploadFile = function(){
       var file = $scope.myFile;
       
       console.log('file is ' );
       console.dir(file);
       
       var uploadUrl = "fileUpload";
       fileUpload.uploadFileToUrl(file, uploadUrl);
    };



}]);


// file upload service

 app.service('fileUpload', ['$http', function ($http) {
            this.uploadFileToUrl = function(file, uploadUrl){
               var fd = new FormData();
               fd.append('file', file);
                console.log(fd);
            
               $http.post(uploadUrl, fd, {
                  transformRequest: angular.identity,
                  headers: {'Content-Type': undefined}
               })
               .then(function(response){

                 console.log(response);
               })
            
            }
         }]);


  app.directive('fileModel', ['$parse', function ($parse) {
            return {
               restrict: 'A',
               link: function(scope, element, attrs) {
                  var model = $parse(attrs.fileModel);
                  var modelSetter = model.assign;
                  
                  element.bind('change', function(){
                     scope.$apply(function(){
                        modelSetter(scope, element[0].files[0]);
                     });
                  });
               }
            };
         }]);






// pagination directive

app.directive('postsPagination', function(){  
    return{
      restrict: 'E',
      template: '<ul class="pagination">'+
       '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getItem(1)">First</a></li>'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getItem(currentPage-1)">‹ Prev</a></li>'+
        '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
            '<a href="javascript:void(0)" ng-click="getItem(i)">{{i}}</a>'+
        '</li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getItem(currentPage+1)">Next ›</a></li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getItem(totalPages)">Last</a></li>'+
      '</ul>'
   };
});

    




/**!
 * Service      : httpApi
 * Description  : This helper is used to send and retrieve data from server.
 *                It holds one method called "request" which need one "config" parameter.  
 *                config parameter holds all the configuration for ajax request.
 *                There is some defautl configuration. The default configuration is replaced with parameter.
 *                It also generate some toastr notification based ajax response. 
 * @params      : {config}  Ajax Request Configuration
 * @return      : Ajax Resposne
 */
app.factory('httpApi', ['$rootScope', '$routeParams', '$http', '$location', function($rootScope, $routeParams, $http, $location) {
    return {
        request: function(config) {
            config = angular.extend({method: 'GET', responseType: 'json'}, config);

            return $http(config).then(function(response) {
                return response;
            });
        }
    }
}]);




