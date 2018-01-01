function ManageProductController ($scope, $http, $log, $q,product_services,$window,commonServices,alertify) {
    
    $scope.productList =function()
    {
    product_services.product_list().then(function(res){
		console.log(res.data);
				var d = res.data;
				if(d.http_code == 404) {
				  alert('Data not found');
				  return;
				}
				//if(d.http_code == 200) {
					$scope.main_product_list = res.data;
					//	}
		
            });
    }
    $scope.productList();    

    $scope.redirect = function(data)
    {
        window.location.href = '/products/'+data+'/edit';			
    
    };
    $scope.statusList = $window.statusList;


    $scope.updateStatus=function(id,data)
    {
        let dataArray = {'status':data.status};

        console.log(data);
        console.log(id);

        alertify.confirm("Are you sure ?", function () {
            commonServices.updateStatus('products',id,dataArray).then(function(res)
            {
                var d = res.data;
                if(d.http_code == 404) {
                return;
                }
                $scope.productList();
                alertify.alert("Status updated successfully");
                
            });
        }, function() {
            // user clicked "cancel"
        });

       
    }

       console.log( $scope.statusList);

            
}
    
    
    app.controller('ManageProductController',ManageProductController);
    app.service('product_services', function ($http,$q) {
        this.product_list=function(){
        let deferred = $q.defer();			
        return $http.get('/api/products').then(function (response) {
            return response;
            deferred.resolve();
        }, function (response) {
            return response;
            deferred.reject(response);
        });
        },
        this.delete_product=function(data){
            let deferred = $q.defer();			
            return $http.delete('/api/products/'+data).then(function (response) {
                return response;
                deferred.resolve();
            }, function (response) {
                return response;
                deferred.reject(response);
            });
        }
    
    });
