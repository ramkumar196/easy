function AddCategoryController ($scope, $http, $log, $q,category_services,alertify) {

	$scope.errors='';
    $scope.category='';
	$scope.category_list ='';

	$scope.category.category_name='';
	console.log('category',category_services);  
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

			console.log('main category',$scope.main_category_list);
		
	
	let create= function (data) {
		let deferred = $q.defer();
		$http.post('/api/category', data).then(function (response) {
			deferred.resolve();
		}, function (response) {
			deferred.reject(response);
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

    $scope.addcategory = function () {

		let attributes = {
				};

		let product = {
            category_name: $scope.category_name,
			main_category : $scope.main_category,
			status:'A'
			//attributes: JSON.stringify(attributes)
        };

		create(product).then(function () {
			//return retrieveWorkers();
			alertify.alert("Category added successfully", function () {
				// user clicked "ok"
				window.location.href = '/category/manage';
			});
			
		}).then(function (data) {
			alertify.alert("Category added successfully", function () {
				// user clicked "ok"
				window.location.href = '/category/manage';
			});
		}).catch(function (error) {
			console.log(error.data.errors);
			$scope.errors=error.data.errors;            
		});

	};


}


app.controller('AddCategoryController',AddCategoryController);
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
	}

});