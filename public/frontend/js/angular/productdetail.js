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
       $scope.productFilter(filterData);
        
    })
    }
    console.log('filter',$scope.filterproducts);

    $scope.productDetail($scope.product_id);
    



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
