window.image='';
window.image1='';
window.image2='';
window.image3='';
window.image4='';

function EditProductController ($scope, $http, $log, $q,product_services,alertify) {

	$scope.errors='';
	$scope.product='';
	$scope.image=window.image;

	$scope.product.product_name='';
	$scope.product.price='';
	$scope.product.offer='';
	$scope.product.description='';
	$scope.product.category_id='';	
    $scope.product.product_photo='';
    $scope.product.stock='';
	$scope.product.sale_available='';
	$scope.product.weight='';
	$scope.product.shipping_status='';
	$scope.product.free_shipping='';
	$scope.product.shipping_charge='';
	$scope.product.meta_keywords='';
	$scope.product.meta_description='';
	$scope.product.detail_description='';
    $scope.product_id = document.getElementById('product_id').value;


	product_services.category_list().then(function(res){
				var d = res.data;
				if(d.http_code == 404) {
				  alert('Data not found');
				  return;
				}
				//if(d.http_code == 200) {
					$scope.main_category_list = res.data;
					
                    //	}
                    return ;
                    
		
            });
        product_services.product_details($scope.product_id).then(function(res){
                        var d = res.data;
                        if(d.http_code == 404) {
                          alert('Data not found');
                          return;
                        }
				let product_details = res.data;
				console.log('product_details',product_details);
				
                $scope.product =[];
                $scope.product.product_name = product_details[0].product_name;
                $scope.product.price = product_details[0].price;
                $scope.product.offer = product_details[0].offer;
                $scope.product.category_id=product_details[0].category_id;
                $scope.product.description=product_details[0].description;
				$scope.product.product_photo=product_details[0].product_image;
				$scope.product.stock=product_details[0].stock;
				$scope.product.stock_status=product_details[0].stock_status;
				$scope.product.sale_available=product_details[0].sale_available;
				$scope.product.weight=product_details[0].weight;
				$scope.product.shipping_status=product_details[0].shipping_status;
				$scope.product.free_shipping=product_details[0].free_shipping;
				$scope.product.shipping_charge=product_details[0].shipping_charge;
				$scope.product.meta_keywords=product_details[0].meta_keywords;
				$scope.product.meta_description=product_details[0].meta_description;
				$scope.product.detail_description=product_details[0].detail_description;
				window.image1=product_details[0].product_image;
				window.image2=product_details[0].product_image_2;
				window.image3=product_details[0].product_image_3;
				window.image4=product_details[0].product_image_4;

				console.log('image',window.image1);
				
				console.log('product',$scope.product);


                return ;
     
            });

    
	


	let update = function (worker) {
		let deferred = $q.defer();

		$http.put('/api/products/'+$scope.product_id, worker).then(function (response) {
			deferred.resolve();
		}, function (response) {
			deferred.reject(response);
		});

		return deferred.promise;

	};

    $scope.updateproduct = function () {

		let attributes = {
				};

		let product = {
            product_name: $scope.product.product_name,
            price : $scope.product.price,
			offer: $scope.product.offer,
			category_id:$scope.product.category_id,
			description:$scope.product.description,
			stock:$scope.product.stock,
			sale_available:$scope.product.sale_available,
			weight:$scope.product.weight,
			shipping_status:$scope.product.shipping_status,
			free_shipping:$scope.product.free_shipping,
			shipping_charge:$scope.product.shipping_charge,
			meta_keywords:$scope.product.meta_keywords,
			meta_description:$scope.product.meta_description,
			detail_description:$scope.product.detail_description,
			product_photo:window.image1,
			product_photo_2:window.image2,
			product_photo_3:window.image3,
			product_photo_4:window.image4
			//attributes: JSON.stringify(attributes)
		};

		update(product).then(function () {
            //return retrieveWorkers();
			alertify.alert("Product updated successfully", function () {
				// user clicked "ok"
				window.location.href = '/products/manage';
			});
			//
			
		}).then(function (data) {
            alertify.alert("Product updated successfully");
			//window.location.href = '/products/manage';			
			$log.log('worker successfully created');
		}).catch(function (error) {
			console.log(error.data.errors);
			$scope.errors=error.data.errors;            
		});

	}


}

app.controller('EditProductController',EditProductController);

app.service('product_services', function ($http,$q) {
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
    this.product_details=function(data){
        let deferred = $q.defer();			
        return $http.get('/api/products?id='+data).then(function (response) {
            return response;
            deferred.resolve();
        }, function (response) {
            return response;
            deferred.reject(response);
        });
        }

});


app.directive('file', function () {
    return {
        scope: {
            file: '='
        },
        link: function (scope, el, attrs) {
            el.bind('change', function (event) {
				var file = event.target.files[0];
				var reader = new FileReader();
				file = reader.readAsDataURL(file);
				reader.onload = function () {
					file= reader.result;
					console.log(file);
					window.image = file ? file : undefined;
					scope.$apply();
				};
				
            });
        }
    };
});