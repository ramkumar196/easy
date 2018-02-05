function CatProductController ($scope, $http, $log, $q,$window,commonServices,alertify) {
    $scope.fullwidthslider = ["frontend/images/sliders/Main-Banner1.jpg", "frontend/images/sliders/Main-Banner2.jpg","frontend/images/sliders/Main-Banner3.jpg"];
    $scope.cat_id = document.getElementById('category_id').value;

    $scope.headerCategoryListing =function()
    {
    let data = $scope.cat_id;
    console.log('sub cat',data);
    commonServices.filterCategoryListing(data).then(function(res){
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

    $scope.category_details =function()
    {
    let data = $scope.cat_id;
    console.log('sub cat',data);
    commonServices.getDetail(data,'category').then(function(res){
        console.log(res.data);
                var d = res.data;
                if(d.http_code == 404) {
                  alert('Data not found');
                  return;
                }
                //if(d.http_code == 200) {
                $scope.currentCategoryDetails = res.data;
                $scope.variants = res.data.variants;
                    console.log('variants',$scope.variants);

                    //  }
        
            });
    }
    $scope.category_details();




    $scope.getAccordionClass= function(k)
    {
        if( k == 0 )
        {
            return 'accordion-toggle collapsed';
        }
        else
        {
            return 'accordion-toggle';
        }
    }
    $scope.filter={};

    $scope.productListing =function()
    {
    let data = $scope.filter;
    data.category_id = $scope.cat_id;
    commonServices.productFilter(data).then(function(res){
		console.log(res.data);
				var d = res.data;
				if(d.http_code == 404) {
				  alert('Data not found');
				  return;
				}

                $scope.allproductlisting = res.data; 
            });
    }

    $scope.headerCategoryListing();
    //$scope.productList();    
   // $scope.productListing('new');
    //$scope.productListing('best');
    //$scope.productListing('feature');
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

       console.log( $scope.statusList);

            
}
    
    
    app.controller('CatProductController',CatProductController);
