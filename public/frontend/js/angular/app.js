var app = angular.module('easyapp', ['angularUtils.directives.dirPagination','ngAlertify','angular.filter','ngSanitize','checklist-model'])
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


app.service('commonServices', function ($http,$q,$filter) {

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
        return $http.get('/api/'+model+'/'+id).then(function (response) {
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
      this.categoryListing=function(data){
        let deferred = $q.defer();			
        return $http.get('/api/categorylist',data).then(function (response) {
            return response;
            deferred.resolve();
        }, function (response) {
            return response;
            deferred.reject(response);
        });
        },
        this.filterCategoryListing=function(data){
        let deferred = $q.defer();      
        return $http.get('/api/categorylist/?id='+data).then(function (response) {
            return response;
            deferred.resolve();
        }, function (response) {
            return response;
            deferred.reject(response);
        });
        },
        this.getDetail=function(data,type){
        let deferred = $q.defer();      
        return $http.get('/api/'+type+'detail/'+data).then(function (response) {
            return response;
            deferred.resolve();
        }, function (response) {
            return response;
            deferred.reject(response);
        });
        },
        this.productListing=function(type){
            let deferred = $q.defer();			
            return $http.get('/api/productslist/'+type).then(function (response) {
                return response;
                deferred.resolve();
            }, function (response) {
                return response;
                deferred.reject(response);
            });
        },
        this.productFilter=function(data){
            let deferred = $q.defer();			
            return $http.post('/api/homeproductsfilter',data).then(function (response) {
                return response;
                deferred.resolve();
            }, function (response) {
                return response;
                deferred.reject(response);
            });
        },
        this.updateCart=function(data){
            let deferred = $q.defer();      
            return $http.post('/api/updateCart',data).then(function (response) {
                return response;
                deferred.resolve();
            }, function (response) {
                return response;
                deferred.reject(response);
            });
        },
        this.updateWishList=function(data){
            let deferred = $q.defer();      
            return $http.post('/api/updateWishList',data).then(function (response) {
                return response;
                deferred.resolve();
            }, function (response) {
                return response;
                deferred.reject(response);
            });
        },
        this.Wishlist=function(data){
            let deferred = $q.defer();      
            return $http.get('/api/Wishlist',data).then(function (response) {
                return response;
                deferred.resolve();
            }, function (response) {
                return response;
                deferred.reject(response);
            });
        },
        this.Cartlist=function(data){
            let deferred = $q.defer();      
            return $http.post('/api/cartlist',data).then(function (response) {
                return response;
                deferred.resolve();
            }, function (response) {
                return response;
                deferred.reject(response);
            });
        },
        this.deleteCart=function(data){
            let deferred = $q.defer();      
            return $http.delete('/api/cart/'+data).then(function (response) {
                return response;
                deferred.resolve();
            }, function (response) {
                return response;
                deferred.reject(response);
            });
        },
        this.parseJsonVariants = function(listarray)
        {
            angular.forEach(listarray, function(v, k) {
            console.log('variants',JSON.parse(v.variants));
            listarray[k].variants = JSON.parse(v.variants);
            listarray[k].variants[0].variant = JSON.parse(v.variants[0].variant);
            });
            return listarray;
        },
        this.sumArray = function(listarray)
        {
            var sum = 0;
            console.log('listarray',listarray);
            angular.forEach(listarray, function(v, k) {
            //if(!isNaN(parseFloat(v)) && isFinite(v))
            //{
                sum += v
            //}
            });

          console.log('sum',sum);

            return sum;
        }
});

app.filter('capitalize', function() {
    return function(input) {
      return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
    }
});

window.currency ="$";
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

  app.directive("owlCarousel", function() {
	return {
		restrict: 'E',
		transclude: false,
		link: function (scope) {
			scope.initCarousel = function(element) {
			  // provide any default options you want
				var defaultOptions = {
				};
				var customOptions = scope.$eval($(element).attr('data-options'));
				// combine the two options objects
				for(var key in customOptions) {
					defaultOptions[key] = customOptions[key];
				}
				// init carousel
				$(element).owlCarousel(defaultOptions);
			};
		}
	};
})
app.directive('owlCarouselItem', [function() {
	return {
		restrict: 'A',
		transclude: false,
		link: function(scope, element) {
		  // wait for the last item in the ng-repeat then call init
			if(scope.$last) {
				scope.initCarousel(element.parent());
			}
		}
	};
}]);
app.directive('zoom', function($window) {
    
        function link(scope, element, attrs) {
    
            //SETUP
    
            var frame, image, zoomlvl, fWidth, fHeight, rect, rootDoc, offsetL, offsetT, xPosition, yPosition, pan;
            //Template has loaded, grab elements.
            scope.$watch('$viewContentLoaded', function()
            {
               frame = angular.element(document.querySelector("#"+scope.frame))[0];
               image = angular.element(document.querySelector("#"+scope.img))[0];
               
               zoomlvl = (scope.zoomlvl === undefined) ? "2.5" : scope.zoomlvl
            });
    
    
    
            //MOUSE TRACKER OVER IMG
            scope.trackMouse = function($event) {
                        
                fWidth = frame.clientWidth;
                fHeight = frame.clientHeight;
                
                rect = frame.getBoundingClientRect();
                rootDoc = frame.ownerDocument.documentElement;
                
                //calculate the offset of the frame from the top and left of the document
                offsetT = rect.top + $window.pageYOffset - rootDoc.clientTop
                offsetL = rect.left + $window.pageXOffset - rootDoc.clientLeft
    
                //calculate current cursor position inside the frame, as a percentage
                xPosition = (($event.pageX - offsetL) / fWidth) * 100
                yPosition = (($event.pageY - offsetT) / fHeight) * 100
    
                pan = xPosition + "% " + yPosition + "% 0";
                image.style.transformOrigin = pan;
    
            }
            
            //MOUSE OVER | ZOOM-IN
            element.on('mouseover', function(event) {
                image.style.transform = 'scale('+zoomlvl+')'
            })
    
            //MOUSE OUT | ZOOM-OUT
            element.on('mouseout', function(event) {
                image.style.transform = 'scale(1)'
            })
    
    
        }
    
        return {
            restrict: 'EA',
            scope: {
                src: '@src',
                frame: '@frame',
                img: '@img',
                zoomlvl: '@zoomlvl'
            },
            template: [
                '<div id="{{ frame }}" class="zoomPanFrame" >',
                '<img id="{{ img }}" class="zoomPanImage" ng-src= "{{ src }}" ng-mousemove="trackMouse($event)"></img>',
                '</div>'
            ].join(''),
            link: link
        };
    });
    
    app.directive('elevatezoom', function($compile) {
  return {
    restrict: 'A',
    link: function(scope, element, attrs) {
      console.log("Linking")

      //Will watch for changes on the attribute
      attrs.$observe('zoomImage',function(){
        linkElevateZoom();
      });

      // attrs.$watch('ng-elevate-zoom',function(){
      //   linkElevateZoom();
      // });
      // scope.$watch(attrs.ng-elevate-zoom, function(element) {
      //   console.log('element',element);
      // });

      //console.log('element',element[0].attributes[0])

      function linkElevateZoom(){

        console.log('zoom attrs',attrs);
        //Check if its not empty
        if (!attrs.zoomImage) return;
        element.attr('data-zoom-image',attrs.zoomImage);
        $(element).elevateZoom();
      }
      
      linkElevateZoom();

    }
  };


});