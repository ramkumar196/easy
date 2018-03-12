function HeaderController ($scope, $http, $log, $q,$sce,$window,commonServices,alertify) {
    
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

    $scope.headerCategoryListing();    
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

    $scope.search=function(data)
    {
        let dataArray = {'keyword':data};

        console.log(dataArray);

            commonServices.searchItem(dataArray).then(function(res)
            {
                var d = res.data;
                if(d.http_code == 404) {
                return;
                }
                $scope.searchResult = res.data;

            });
    }

 $scope.dirty = {};
$scope.searchResult = [];
  function suggest_state(term) {
    var q = term.toLowerCase().trim();
    var results = [];
    $scope.search(q);
    states = $scope.searchResult ;

    for (var i = 0; i < states.length && results.length < 10; i++) {
      var product_name = states[i].product_name;
      var product_image = states[i].product_image;
      var product_link = states[i].product_link;
      var product_id = states[i].product_name;

     var  label = $sce.trustAsHtml(
           '<div class="row">' +
           ' <div class="col-xs-12">' +
           '  <img width="50px" height="50px" src="'+product_image+'">' +
           '  <strong> ' + product_name + '</strong>'+
           ' </div>' +
           '</div>'
         )
      //if (product_name.toLowerCase().indexOf(q) === 0)
        results.push({ label: label, value: product_link });
    }

    return results;
  }

  $scope.autocomplete_options = {
    suggest: suggest_state
  };

            
}
    
    
    app.controller('HeaderController',HeaderController);
