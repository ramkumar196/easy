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
    $scope.order_subtotal = [];
    $scope.order_total = []; 
    $scope.grand_subtotal = 0;
    $scope.grand_total = 0;
    $scope.order_qty = {};
    $scope.product_price={};

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

               $scope.allcartlisting = commonServices.parseJsonVariants($scope.allcartlisting);

               angular.forEach($scope.allcartlisting, function(v, k) {
                $scope.order_qty[v.order_id] = v.quantity;
                $scope.product_price[v.order_id] = v.subtotal;
                $scope.order_total[v.order_id] = v.subtotal;
                });
                    //  }
            });
    }

    $scope.changeTotal = function(key,decrement=0)
    {
        if(decrement == 0)
        {
            $scope.order_total[key] = $scope.product_price[key]*$scope.order_qty[key];
            console.log($scope.order_total);
            $scope.changeGrandTotal();
        }
        else
        {
            $scope.order_total[key] = $scope.order_total[key]-$scope.product_price[key];
            $scope.changeGrandTotal();
        }
        console.log($scope.order_total);
    }

    $scope.changeGrandTotal = function()
    {
        console.log('change',$scope.order_total);
        $scope.grand_subtotal = commonServices.sumArray($scope.order_total);
        $scope.grand_total = commonServices.sumArray($scope.order_total);

                console.log('change',$scope.grand_subtotal);
                console.log('change',$scope.grand_total);

    }

     $scope.changeGrandTotal();

    $scope.increment = function(key)
    {
        $scope.changeTotal(key,0);
        $scope.order_qty[key]++;
    }
    $scope.decrement = function(key)
    {
        $scope.changeTotal(key,1);
        $scope.order_qty[key]--;
        if($scope.order_qty[key] == 0)
        {
            $scope.order_qty[key]++;
            alertify.alert("Product Quantity must be atleast one");     
            return true;               
        }

    }

    $scope.cartListing();

    $scope.deleteCart =function(order_id)
    {
    let data = {'order_id':order_id};
    commonServices.deleteCart(order_id).then(function(res){
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

    //$scope.productDetail($scope.product_id);

    
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
