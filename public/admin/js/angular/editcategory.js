function EditCategoryController ($scope, $http, $log, $q,category_services,alertify) {
    
        $scope.errors='';
        $scope.category='';
        $scope.category_list ='';
        $scope.category_id = document.getElementById('category_id').value;
    
        $scope.category.category_name='';
        console.log('category',category_services); 

        category_services.all_category_list($scope.category_id).then(function(res){
            console.log(res.data);
                    var d = res.data;
                    if(d.http_code == 404) {
                      alert('Data not found');
                      return;
                    }
                    //if(d.http_code == 200) {
                        $scope.main_category_list = res.data;
                        $scope.main_category_list.push({'id':0,'category_name':'Main Category'})
                        //	}
            
        });

        category_services.category_list($scope.category_id).then(function(res){
            console.log(res.data);
                    var d = res.data;
                    if(d.http_code == 404) {
                      alert('Data not found');
                      return;
                    }
                    let category_details = res.data; 
                    console.log('category_details');
                    console.log(category_details[0].id);
                    $scope.main_category = category_details[0].main_category;
                    $scope.category_name = category_details[0].category_name;
                    
        });
                
        
        let update= function (data) {
            let deferred = $q.defer();
            console.log(data);
            $http.put('/api/category/'+$scope.category_id, data).then(function (response) {
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
                category_name: $scope.category_name,
                main_category : $scope.main_category,
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