function EditVariantsController ($scope, $http, $log, $q,category_services,commonServices,$window,alertify) {
    
        $scope.errors='';
        $scope.category='';
        $scope.category_list ='';
        $scope.variants_id = document.getElementById('variants_id').value;
    
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
                        $scope.main_category_list.push({'id':0,'category_name':'All Category'})
                        

                        //	}
            
        });
        $scope.variantList = $window.variantList;
        

        commonServices.selectOwnList('variants',$scope.variants_id).then(function(res){
            console.log(res.data);
                    var d = res.data;
                    if(d.http_code == 404) {
                      alert('Data not found');
                      return;
                    }

                    let variants_details = res.data

                    var var_val = commonServices.TagsConvertObjArray(variants_details[0].variant_value);
                    $scope.category = variants_details[0].category;
                    $scope.variant_name = variants_details[0].variant_name;
                    $scope.variant_type = variants_details[0].variant_type;                                      
                    $scope.variant_value = var_val;                                      
        });
                
        
        let update= function (data) {
            let deferred = $q.defer();
            console.log(data);
            $http.put('/api/variants/'+$scope.variants_id, data).then(function (response) {
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
    
        $scope.editvariants = function () {
    
            let attributes = {
                    };

            var var_val = commonServices.TagsConvertArrayObj($scope.variant_value);

    
            let product = { 
			variant_name: $scope.variant_name,
			variant_type:$scope.variant_type,
			product_category_id : $scope.category,
            variant_value:var_val,
			status:'A'
                //attributes: JSON.stringify(attributes)
            };
    
            update(product).then(function () {
                //return retrieveWorkers();
                alertify.alert("Variants updated successfully", function () {
                    // user clicked "ok"
                    window.location.href = '/variants/manage';
                });	
                
            }).then(function (data) {
                alertify.alert("Variants updated successfully", function () {
                    // user clicked "ok"
                    window.location.href = '/variants/manage';
                });
            }).catch(function (error) {
                console.log(error.data.errors);
                $scope.errors=error.data.errors;            
            });
    
        };
    
    
    }
    
    
    
    app.controller('EditVariantsController',EditVariantsController);
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