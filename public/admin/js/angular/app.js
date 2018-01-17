var app = angular.module('easyadminapp', ['angularUtils.directives.dirPagination','ngAlertify','textAngular','ngTagsInput'])
/*["ngAlertify"]*/
app.directive('loading', ['$http', function ($http) {
    return {
      restrict: 'A',
      link: function (scope, element, attrs) {
        scope.isLoading = function () {
          return $http.pendingRequests.length > 0;
        };
        scope.$watch(scope.isLoading, function (value) {
          if (value) {
            element.removeClass('ng-hide');
          } else {
            element.addClass('ng-hide');
          }
        });
      }
    };
}]);


app.service('commonServices', function ($http,$q) {

  this.selectAllList=function(model){
    let deferred = $q.defer();			
    return $http.get('/api/'+model).then(function (response) {
        return response;
        deferred.resolve();
    }, function (response) {
        return response;
        deferred.reject(response);
    });
    },
    this.selectFilterList=function(model,id){
      let deferred = $q.defer();			
      return $http.get('/api/'+model+'/'+'?exp_id='+id).then(function (response) {
          return response;
          deferred.resolve();
      }, function (response) {
          return response;
          deferred.reject(response);
      });
      },
      this.selectOwnList=function(model,id){
        let deferred = $q.defer();			
        return $http.get('/api/'+model+'/'+'?id='+id).then(function (response) {
            return response;
            deferred.resolve();
        }, function (response) {
            return response;
            deferred.reject(response);
        });
        },
      this.updateData=function(model,id,data){
        let deferred = $q.defer();			
        return $http.put('/api/'+model+'/'+id,data).then(function (response) {
            return response;
            deferred.resolve();
        }, function (response) {
            return response;
            deferred.reject(response);
        });
        },
        this.updateStatus=function(model,id,data){
            let deferred = $q.defer();			
            return $http.put('/api/'+model+'/status/'+id,data).then(function (response) {
                return response;
                deferred.resolve();
            }, function (response) {
                return response;
                deferred.reject(response);
            });
            },
      this.insertData=function(model,data){
        let deferred = $q.defer();			
        return $http.post('/api/'+model,data).then(function (response) {
            return response;
            deferred.resolve();
        }, function (response) {
            return response;
            deferred.reject(response);
        });
        },
      this.delete_category=function(id){
          let deferred = $q.defer();			
          return $http.delete('/api/category/'+id).then(function (response) {
              return response;
              deferred.resolve();
          }, function (response) {
              return response;
              deferred.reject(response);
          });
      },
      this.TagsConvertObjArray=function(data) {
              var var_val = data.split(',');
              variant_value=[];
              for (var i = 0; i < var_val.length; i++) {
                variant_value.push({'text':var_val[i]});
              }
              return variant_value;
            },
      this.TagsConvertArrayObj=function(data) {
              var var_val = $.map(data, function(value, index) {
              return [value.text];
              });
              return  var_val.join(',');
           }

});

app.directive('ngFileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            var model = $parse(attrs.ngFileModel);
            var isMultiple = attrs.multiple;
            var modelSetter = model.assign;
            element.bind('change', function () {
                var values = [];
                angular.forEach(element[0].files, function (item) {


console.log(element[0].files)

                    // var value = {
                    //    // File Name 
                    //     name: item.name,
                    //     //File Size 
                    //     size: item.size,
                    //     //File URL to view 
                    //     url: URL.createObjectURL(item),
                    //     // File Input Value 
                    //     _file: item
					// };
					//console.log('value',value);
					var reader = new FileReader();
					file = reader.readAsDataURL(item);
					reader.onload = function () {
						file= reader.result;

						if(item != undefined)	
            {
            var id=element[0].id;
            var last_char = id.substr(id.length - 1) ;

            console.log(last_char);
            
            switch(last_char) {
            case '1': 
            window.image1 = file;
            break;            
            case '2': 
            window.image2 = file;
            break;            
            case '3': 
            window.image3 = file;
            break;            
            default:
            window.image4 = file;
            break;

            
            }

            console.log([window.image1,window.image2,window.image3,window.image4]);


            }


						//console.log('file',file);		
					};


					scope.$apply();
                   // values.push(value);
                });
                scope.$apply(function () {
                    if (isMultiple) {
                        modelSetter(scope, values);
                    } else {
                        modelSetter(scope, values[0]);
                    }
                });
            });
        }
    };
}]);

window.statusList = [
  {
   'status':'A',
   'status_name':'Active'
  },      
  {
   'status':'B',
   'status_name':'Block'
  },
  {
 'status':'T',
 'status_name':'Trash'
  }
];
window.variantList = [
    {
     'variant_type':1,
     'variant_name':'Select Box'
    },      
    {
    'variant_type':2,
    'variant_name':'Radio Button'
    }
  ];
