function HomepageController ($scope, $http, $log, $q,$filter,$window,commonServices,alertify) {
    $scope.fullwidthslider = ["frontend/images/sliders/Main-Banner1.jpg", "frontend/images/sliders/Main-Banner2.jpg","frontend/images/sliders/Main-Banner3.jpg","frontend/images/sliders/Main-Banner4.jpg","frontend/images/sliders/Main-Banner5.jpg"];
    $scope.brandAdsList = [

    {
        imageurl:"frontend/images/ads/ad-1.jpeg",
        caption:"Winter Collections"
    },
    {
        imageurl:"frontend/images/ads/ad-2.jpeg",
        caption:"Cool Dresses"
    },
    {
        imageurl:"frontend/images/ads/ad-3.jpeg",
        caption:"Kids Collections"
    },
    {
        imageurl:"frontend/images/ads/ad-4.jpeg",
        caption:"Womens Trends"
    },
    {
        imageurl:"frontend/images/ads/ad-5.jpeg",
        caption:"Winter Collections"
    },
    {
        imageurl:"frontend/images/ads/ad-6.jpeg",
        caption:"Watch Collections"
    }
    ];
    $scope.productClassCounter = 0;
    $scope.getproductclass = function(key)
    {
        console.log('here',$scope.productClassCounter);
        console.log('here2222',key);
        if(key == 2)
        {
            console.log("hereeee");
            $scope.productClassCounter++;
            var productclass =  "tab-pane in active";
        }
        else
        {
            $scope.productClassCounter++;
            var productclass = "tab-pane";
        }

        return productclass;

        //console.log('productClassCounter',$scope.productClassCounter);
    }

    $scope.headerCategoryListing =function()
    {
    commonServices.categoryListing().then(function(res){
		console.log(res.data);
				var d = res.data;
				if(d.http_code == 404) {
				  alert('Data not found');
				  return;
				}
				//if(d.http_code == 200) {
				$scope.allcategorylisting = res.data;
					//	}
		
            });
    }

    $scope.productListing =function(type)
    {
    commonServices.productListing(type).then(function(res){
		console.log(res.data);
				var d = res.data;
				if(d.http_code == 404) {
				  alert('Data not found');
				  return;
				}
                switch(type)
                {
                    case 'new':
                    $scope.newproductlisting = res.data; 
                    break;

                    case 'best':
                    $scope.bestproductlisting = res.data; 
                    break;

                    case 'feature':
                    $scope.featureproductlisting = res.data; 
                    break;
                    default:

                    $scope.allproductlisting = res.data; 
                    break;

                }       
                
					//	}
		
            });
    }

    $scope.headerCategoryListing();
    //$scope.productList();    
    $scope.productListing('new');
    $scope.productListing('best');
    $scope.productListing('feature');
    $scope.productListing('');
    
    $scope.currency = $window.currency;
    
    

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


    $scope.updateCart=function(product_id)
    {
        let dataArray = {'product_id':product_id,'user_id':USERID};

        alertify.confirm("Are you sure ?", function () {
            commonServices.updateCart(dataArray).then(function(res)
            {
                var d = res.data;
                if(d.http_code == 404) {
                return;
                }
                $scope.productList();
                alertify.alert("Product added to cart");
                
            });
        }, function() {
            // user clicked "cancel"
        });
       
    }


    $scope.updateWishList=function(data)
    {
        let dataArray = {'product_id':data.product_id,'user_id':data.user_id};

        alertify.confirm("Are you sure ?", function () {
            commonServices.updateWishList(dataArray).then(function(res)
            {
                var d = res.data;
                if(d.http_code == 404) {
                return;
                }
                $scope.productList();
                alertify.alert("Product added to wishlist");
                
            });
        }, function() {
            // user clicked "cancel"
        });
       
    }
       console.log( $scope.statusList);

            
}
    
    
    app.controller('HomepageController',HomepageController);
