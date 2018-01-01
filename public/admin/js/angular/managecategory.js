function ManageCategoryController ($scope, $http, $log, $q,category_services,commonServices,alertify,$window) {
        $scope.redirect = function(data)
        {
            window.location.href = '/category/'+data+'/edit';			
        
        };

        $scope.categoryList=function()
        {
        category_services.category_list().then(function(res){
		console.log(res.data);
				var d = res.data;
				if(d.http_code == 404) {
				  alert('Data not found');
				  return;
				}
				//if(d.http_code == 200) {
					$scope.main_category_list = res.data;
					//	}
		
            });
        }
        $scope.categoryList();
        $scope.statusList = $window.statusList;
            
        
            $scope.updateStatus=function(id,data)
            {
                let dataArray = {'status':data.status};
        
                console.log(data);
                console.log(id);
                alertify.confirm("Are you sure ?", function () {
                    commonServices.updateStatus('category',id,dataArray).then(function(res)
                    {
                        var d = res.data;
                        if(d.http_code == 404) {
                        return;
                        }
                        $scope.categoryList();
                        alertify.alert("Status updated successfully");
                        
                    });
                }, function() {
                    // user clicked "cancel"
                });
        
               
            }

    

}
    
    
    app.controller('ManageCategoryController',ManageCategoryController);
    app.service('category_services', function ($http,$q) {
        this.category_list=function(){
        let deferred = $q.defer();			
        return $http.get('/api/category').then(function (response) {
            return response;
            deferred.resolve();
        }, function (response) {
            return response;
            deferred.reject(response);
        });
        },
        this.delete_category=function(data){
            let deferred = $q.defer();			
            return $http.delete('/api/category/'+data).then(function (response) {
                return response;
                deferred.resolve();
            }, function (response) {
                return response;
                deferred.reject(response);
            });
        }
    
    });
