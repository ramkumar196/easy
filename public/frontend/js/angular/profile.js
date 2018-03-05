function UserProfileController ($scope, $http, $log, $q,category_services,alertify) {
    
        $scope.errors='';
        $scope.category='';
        $scope.user_id = document.getElementById('userid').value;
    
        category_services.userDetails($scope.user_id).then(function(res){
            console.log(res.data);
                    var d = res.data;
                    if(d.http_code == 404) {
                      alert('Data not found');
                      return;
                    }
                    let user_details = res.data;
                    
        });
                
        
        let update= function (data) {
            let deferred = $q.defer();
            console.log(data);
            $http.put('/api/updateprofile/'+$scope.userid, data).then(function (response) {
                deferred.resolve();
            }, function (response) {
                deferred.reject(response);168
            });
    
            return deferred.promise;
    
        };
        /*
        $scope.change_category=function()
        {
            let final_cat_id = $scope.main_category[$scope.main_category.length - 1];
            console.log('final_cat_id',final_cat_id);
            console.log('final_cat_id',$scope.main_category.length);
            let data = {'category_id':final_cat_id};
            category_services.category_list(data).then(function(res){
                        var d = res.data;
                        if(d.http_code == 404) {
                          alert('Data not found');
                          return;
                        }
                        //if(d.http_code == 200) {
                            $scope.main_category_list.push(res.data)
                    //	}
                
            });
        }*/
    
        $scope.editcategory = function () {
    
            let attributes = {
                    };
    
            let product = {
                category_name: $scope.useremail,
                main_category : $scope.userphone,
                product_category_id : $scope.userpassword,
                product_category_id : $scope.userrepassword,
                product_category_id : $scope.userfirstname,
                status:'A'
                //attributes: JSON.stringify(attributes)
            };
    
            update(product).then(function () {
                //return retrieveWorkers();
                alertify.alert("Category updated successfully", function () {
                    // user clicked "ok"
                    window.location.href = '/category/manage';
                });
                
            }).then(function (data) {
                alertify.alert("Category updated successfully", function () {
				// user clicked "ok"
				window.location.href = '/category/manage';
			});
            }).catch(function (error) {
                console.log(error.data.errors);
                $scope.errors=error.data.errors;            
            });
    
        };
    
    
    }
    
    
    
    app.controller('EditCategoryController',EditCategoryController);
    app.service('category_services', function ($http,$q) {
        this.category_list=function(data){
        let deferred = $q.defer();			
        return $http.get('/api/category?id='+data).then(function (response) {
            return response;
            deferred.resolve();
        }, function (response) {
            return response;
            deferred.reject(response);
        });
        },
        this.all_category_list=function(data){
            let deferred = $q.defer();			
            return $http.get('/api/category?exp_id='+data).then(function (response) {
                return response;
                deferred.resolve();
            }, function (response) {
                return response;
                deferred.reject(response);
            });
            }


    
    });