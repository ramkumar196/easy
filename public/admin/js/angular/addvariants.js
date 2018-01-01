function AddVariantsController ($scope, $http, $log, $q,category_services,commonServices,$window,alertify) {

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
			$scope.variantList = $window.variantList;

			let create= function (data) {
				let deferred = $q.defer();
				$http.post('/api/variants', data).then(function (response) {
					deferred.resolve();
				}, function (response) {
					deferred.reject(response);
				});
		
				return deferred.promise;
		
			};
	
    $scope.addvariants = function () {

		let attributes = {
				};

		let data = {
			variant_name: $scope.variant_name,
			variant_type:$scope.variant_type,
			category : $scope.category,
			status:'A'
			//attributes: JSON.stringify(attributes)
        };			
		
			create(data).then(function () {
				//return retrieveWorkers();
				
			}).then(function (data) {
				alertify.alert('Variant Added Successfully');
				window.location.href = '/category/manage';
			}).catch(function (error) {
				console.log(error.data.errors);
				$scope.errors=error.data.errors;            
			});

	};


}


app.controller('AddVariantsController',AddVariantsController);
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