function CartListController ($scope, $http, $log, $q,$window,commonServices,alertify) {
    $scope.fullwidthslider = ["frontend/images/sliders/Main-Banner1.jpg", "frontend/images/sliders/Main-Banner2.jpg","frontend/images/sliders/Main-Banner3.jpg"];
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
    $scope.allcartlisting={};

    $scope.cartListing =function()
    {
    let data = {'user_id':USERID};
    commonServices.Cartlist(data).then(function(res){
        console.log(res.data);
                var d = res.data;
                if(d.http_code == 404) {
                  alert('Data not found');
                  return;
                }
                //if(d.http_code == 200) {
                $scope.allcartlisting = res.data;
                    //  }
            });
    }

    $scope.cartListing();

    $scope.deleteCart =function(order_id)
    {
    let data = {'order_id':order_id};
    commonServices.deleteCart(data).then(function(res){
        console.log(res.data);
                var d = res.data;
                if(d.http_code == 404) {
                  alert('Data not found');
                  return;
                }
                if(d.http_code == 200) {
                alertify.alert("Order removed from cart list");                    
                $scope.cartListing();
                }
            });
    }

    $scope.loginAlert =function()
    {
        alertify.alert("Plese login to access");
    }


    $scope.increment = function() {
        $scope.product_qty++;
    };
    $scope.decrement = function() {
        $scope.product_qty--;
    };





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

    $scope.productDetail =function(id)
    {
    commonServices.selectOwnList('homeproducts',id).then(function(res){


		console.log(res.data);
				var d = res.data;
				if(d.http_code == 404) {
				  alert('Data not found');
				  return;
                }
        $scope.pd=res.data;
        let filterData={
            'category_id':$scope.pd.category_id
        }
        
    })
    }
    console.log('filter',$scope.filterproducts);

    $scope.productDetail($scope.product_id);

    
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

       console.log( $scope.statusList);

            
}
    app.controller('CartListController',CartListController);
