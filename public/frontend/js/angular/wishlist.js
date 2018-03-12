function WishListController ($scope, $http, $log, $q,$window,commonServices,alertify) {
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

    $scope.wishListing =function()
    {
    let data = {'user_id':USERID};
    commonServices.Wishlist(data).then(function(res){
        console.log(res.data);
                var d = res.data;
                if(d.http_code == 404) {
                  alert('Data not found');
                  return;
                }
                //if(d.http_code == 200) {
                $scope.allwishlisting = res.data;
                
                });
           
    }


    $scope.wishListing();

    $scope.deleteWish =function(order_id)
    {
        alertify.confirm("Do you want to remove ?", function () {
            commonServices.deleteWishlist(order_id).then(function(res){
        console.log(res.data);
                var d = res.data;
                // if(d.http_code == 404) {
                //   alert('Data not found');
                //   return;
                // }
                if(d == 204) {
                $scope.wishListing();
                alertify.alert("Product removed from wish list");                    
                }
            });

        }, function() {
            // user clicked "cancel"
        });
       
    
    }

    $scope.loginAlert =function()
    {
        alertify.alert("Plese login to access");
    }

    
    $scope.currency = $window.currency;
    
    

    $scope.redirect = function(data)
    {
        window.location.href = '/productdetail/'+data;			
    
    };
    $scope.statusList = $window.statusList;

            
}
    app.controller('WishListController',WishListController);
