function ProductDetailController ($scope, $http, $log, $q,$window,commonServices,alertify) {
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

    $scope.activeAttribute='ng-elevate-zoom';
    var myEl = angular.element( document.querySelector( '#productslider a img' ) );
        console.log(myEl);
        myEl.removeAttr('ng-elevate-zoom');
        

    $scope.checkActiveClass =function(k)
    {
       var myEl = angular.element( document.querySelector( '#productslider .item' ) );
       var checkactiveclass = myEl.hasClass('active');
       if(checkactiveclass)
        return true
        else
        return false;
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
    $scope.product_id = document.getElementById('product_id').value;

    $scope.productFilter =function(data)
    {
    commonServices.productFilter(data).then(function(res){

		console.log(res.data);
				var d = res.data;
				if(d.http_code == 404) {
				  alert('Data not found');
				  return;
                }
                $scope.filterproducts= res.data;
    })
    };
     $scope.product_qty=1;
     $scope.product_price=0;

    $scope.updateCart=function(data)
    {
        $scope.product_price += (parseInt(data.product_price) - parseInt(data.product_offer))*$scope.product_qty;
         let dataArray= {
           'product_id':data.product_id,
            'user_id':USERID,
            'quantity':$scope.product_qty,
            'total':$scope.product_price,
            'subtotal':$scope.product_price,
            'variants':JSON.stringify($scope.variantprice)
        };

        alertify.confirm("Are you sure ?", function () {
            commonServices.updateCart(dataArray).then(function(res)
            {
                var d = res.data;
                if(d.http_code == 404) {
                return;
                }
                alertify.alert("Product added to cart",function(){
                window.location.href = '/cart';
                });
                
            });
        }, function() {
            // user clicked "cancel"
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
    $scope.variantprice = {};

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
        $scope.product_price = $scope.pd.price;
        $scope.pd.variants=JSON.parse(res.data.variants);
        let filterData={
            'category_id':$scope.pd.category_id
        }
       $scope.productFilter(filterData);
        
    })
    }
    console.log('filter',$scope.filterproducts);

    $scope.productDetail($scope.product_id);

    $scope.changePrice = function()
    {
        //console.log($scope.variantprice);
        angular.forEach($scope.variantprice, function (v, k) {
           var price = JSON.parse(v.variant);
        $scope.product_price += parseInt(price.addprice);
        });
    }
    



   // $scope.headerCategoryListing();
    //$scope.productList();    
   // $scope.productListing('new');
    $scope.productListing('best');
   // $scope.productListing('feature');
    //$scope.productListing('');
    
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
    app.controller('ProductDetailController',ProductDetailController);
