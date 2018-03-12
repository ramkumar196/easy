function UserProfileController ($scope, $http, $log, $q,user_services,alertify) {
    
        $scope.errors='';
        $scope.category='';
        $scope.user_id = USERID;
    
        user_services.userDetails($scope.user_id).then(function(res){
            console.log(res.data);
                    var d = res.data;
                    if(d.http_code == 404) {
                      alert('Data not found');
                      return;
                    }
                    let user_details = res.data;

                    $scope.useremail=user_details.email;
                    $scope.username=user_details.name;
                    $scope.userphone=user_details.phone;
                    
        });

                
        
        let update= function (data) {
            let deferred = $q.defer();
            console.log(data);
            $http.put('/api/updateprofile/'+$scope.user_id, data).then(function (response) {
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
    
        $scope.editprofile = function () {
    
            let attributes = {
                    };
    
            let product = {
                email: $scope.useremail,
                phone : $scope.userphone,
                name : $scope.username,
                password : $scope.password,
                password_confirmation : $scope.password_confirmation,
            };
    
            update(product).then(function () {
                //return retrieveWorkers();
                alertify.alert("Profile updated successfully", function () {
                    // user clicked "ok"
                    window.location.href = '/profile';
                });
                
            }).then(function (data) {
                alertify.alert("Profile updated successfully", function () {
				// user clicked "ok"
				window.location.href = '/profile';
			});
            }).catch(function (error) {
                console.log(error.data.errors);
                $scope.errors=error.data.errors;            
            });
    
        };
    
    
    }
    
    
    
    app.controller('UserProfileController',UserProfileController);
    app.service('user_services', function ($http,$q) {
        this.userDetails=function(data){
        let deferred = $q.defer();			
        return $http.get('/api/userprofile/'+data).then(function (response) {
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