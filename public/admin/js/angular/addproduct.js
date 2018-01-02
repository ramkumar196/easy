window.image=[];
window.image1='';
window.image2='';
window.image3='';
window.image4='';

function AddProductController ($scope, $http, $log, $q,product_services,alertify,textAngularManager) {

	$scope.errors='';
	$scope.product='';
	$scope.image=window.image;

	$scope.product.product_name='';
	$scope.product.price='';
	$scope.product.offer='';
	$scope.product.description='';
	$scope.product.category='';	
	$scope.product.product_photo='';
	$scope.product.stock='';
	$scope.product.sale_available=1;
	$scope.product.weight='';
	$scope.product.shipping_status=1;
	$scope.product.stock_status=1;
	$scope.product.free_shipping=0;
	$scope.product.shipping_charge='';
	$scope.product.meta_keywords='';
	$scope.product.meta_description='';
	$scope.product.detail_description='';
	$scope.outputBrowsers = [
 	{	icon: "",	name: "Opera",	maker: "Opera Software",	ticked: true	},
 	{	icon: "",	name: "Firefox",	maker: "Mozilla Foundation",	ticked: true	},
 	{	icon: "",	name: "Chrome",	maker: "Google",	ticked: true	}
];

	product_services.category_list().then(function(res){
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
	


	let createProduct = function (worker) {
		let deferred = $q.defer();

		$http.post('/api/products', worker).then(function (response) {
			deferred.resolve();
		}, function (response) {
			deferred.reject(response);
		});

		return deferred.promise;

	};

    $scope.addproduct = function () {

		let attributes = {
				};

		let product = {
            product_name: $scope.product.product_name,
            price : $scope.product.price,
			offer: $scope.product.offer,
			category_id:$scope.category_id,
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

		console.log("product data",product);

		createProduct(product).then(function () {
			//return retrieveWorkers();
			alertify.alert("Product added successfully", function () {
				window.location.href = '/products/manage';
			});			
		}).then(function (data) {
			alertify.alert("Product added successfully", function () {
				// user clicked "ok"
				window.location.href = '/products/manage';
			});
		}).catch(function (error) {
			console.log(error.data.errors);
			$scope.errors=error.data.errors;            
		});

	};


}

app.controller('AddProductController',AddProductController);

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
	}

});


app.directive('file', function () {
    return {
        scope: {
            file: '='
        },
        link: function (scope, el, attrs) {
            el.bind('change', function (event) {
				console.log(event.target);
				//for(i=0;i<=event.target.files.length;i++)
				//{
					var file = event.target.files[0];
					console.log('count....',i);
					console.log('files....',file);
					
					var reader = new FileReader();
					file = reader.readAsDataURL(file);
					reader.onload = function () {
						file= reader.result;
						console.log(file);
						
						window.image = file ? file : undefined;

						scope.$apply();
					};
				//}
				
            });
        }
    };
});
