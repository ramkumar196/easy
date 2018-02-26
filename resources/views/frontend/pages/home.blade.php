@extends('frontend.layouts.default')
@section('content')
<script type="text/javascript" src="{!! asset('frontend/js/angular/home.js'); !!}"></script>


<!-- ============================================== HEADER : END ============================================== -->
  <div class="container outer-top-xs" ng-controller="HomepageController">
  <div class="row">
        <div class="col-xs-12 col-sm-12">
        <data-owl-carousel id="main-banner" class="owl-carousel home-slider"  data-options="{
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
      autoPlay:true,
      responsive:true,
      transitionStyle:'backSlide'

  }">
                <div owl-carousel-item="" ng-repeat="i in fullwidthslider" class="item"> <a href="#"><img src="@{{ i }}" alt="main-banner1" class="img-responsive" /></a> </div>
        </data-owl-carousel>
        </div>

        
        
    </div>
    <div class="row top-buffer">
    <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->

              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over $99</h6>
                </div>
              </div>
              <!-- .col -->

              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra $5 off on all items </h6>
                </div>
              </div>
              <!-- .col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.info-boxes-inner -->

        </div>
    </div>

    <div class="row top-buffer">
        <div id="product-tabs-slider" class="scroll-tabs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>
            
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <select ng-model="category_id" class="form-control">
              <option >All</option>
              <option ng-repeat="cc in allcategorylisting" value="@{{ cc.category_id }}">@{{ cc.category_name }}</option>
            </select>
             <!--  <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
              <li ng-repeat="cc in allcategorylisting" ><a data-transition-type="backSlide" href="#cat-@{{ cc.id }}" data-toggle="tab">@{{ cc.category_name }}</a></li> -->
            </ul>
            <!-- /.nav-tabs -->
          </div>
          <div class="tab-content outer-top-xs">
            <div ng-if="allproductlisting.length == 0"><p><center>No products found</center></p></div>
           <!--  <div  ng-class="getproductclass(@{{key}})" id="cat-@{{key}}" ng-repeat="(key, value) in allproductlisting | groupBy: 'category_id'"> -->
            <div class="tab-pane in active">
              <div class="product-slider">
                <!--<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">-->
                <data-owl-carousel class="owl-carousel upsell-product home-owl-carousel custom-carousel owl-theme outer-top-xs" data-options="{
        items : 5,
        itemsTablet:[768,2],
        itemsDesktop : [1199,2],
        navigation : true,
        pagination : false,
        navigationText: ['', '']
    }">
                  <div owl-carousel-item="" class="item item-carousel" ng-repeat="ap in allproductlisting">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="productdetail/@{{ap.product_id}}"><img  src="@{{ ap.product_image }}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="productdetail/@{{ap.product_id}}">@{{ ap.product_name | capitalize }}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price">@{{ ap.price | currency }} </span> <span class="price-before-discount">@{{ ap.offer | currency }}</span> </div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                      </div>
                      <!-- /.product -->

                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.item -->
                </data-owl-carousel>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->
            <!-- /.tab-pane -->

          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.scroll-tabs -->
        <!-- ============================================== SCROLL TABS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{!! asset('frontend/images/banners/home-banner1.jpg') !!}"alt=""> </div>
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{!! asset('frontend/images/banners/home-banner2.jpg') !!}"alt=""> </div>
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->

        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Featured products</h3>
          <div ng-if="featureproductlisting.length == 0"><p><center>No products found</center></p></div>
          <data-owl-carousel class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs" data-options="{
        items : 5,
        itemsTablet:[768,2],
        itemsDesktop : [1199,2],
        navigation : true,
        pagination : false,
        navigationText: ['', '']
    }">
            <div owl-carousel-item="" class="item item-carousel" ng-repeat="fp in featureproductlisting">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="productdetail/@{{fp.product_id}}"><img  src="@{{ fp.product_image }}"alt=""></a> </div>
                    <!-- /.image -->

                    <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="productdetail/@{{fp.product_id}}">@{{ fp.product_name | capitalize}}</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price">@{{ fp.price | currency }}  </span> <span class="price-before-discount">@{{  fp.offer | currency }}</span> </div>
                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->

              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->
          </data-owl-carousel>
          <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{!! asset('frontend/images/banners/home-banner.jpg') !!}"alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">New Mens Fashion<br>
                      <span class="shopping-needs">Save up to 40% off</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label -->
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== BEST SELLER ============================================== -->
      
        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Best seller</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div ng-if="bestproductlisting.length == 0"><p><center>No Products found</center></p></div>
            <!--<div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">-->
            <data-owl-carousel class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs" data-options="{
    items : 4,
    navigation : true,
    itemsDesktopSmall :[979,2],
    itemsDesktop : [1199,2],
    slideSpeed : 300,
    pagination: false,
    paginationSpeed : 400,
    navigationText: ['', '']
}">

              <div owl-carousel-item="item" class="item" ng-repeat="bp in bestproductlisting">
                <div class="products best-product">
                  <div class="product" >
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="productdetail/@{{bp.product_id}}"> <img src="@{{ bp.product_image }}"alt=""> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="productdetail/@{{bp.product_id}}">@{{ bp.product_name | capitalize }}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">@{{ bp.price | currency }} </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                </div>
              </div>
              </data-owl-carousel>          
              </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== BEST SELLER : END ============================================== -->

        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">latest form blog</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{!! asset('frontend/images/blog-post/post1.jpg') !!}"alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                    <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->

              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{!! asset('frontend/images/blog-post/post2.jpg') !!}"alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->

              <!-- /.item -->

              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{!! asset('frontend/images/blog-post/post1.jpg') !!}"alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->

              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{!! asset('frontend/images/blog-post/post2.jpg') !!}"alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->

              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{!! asset('frontend/images/blog-post/post1.jpg') !!}"alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->

            </div>
            <!-- /.owl-carousel -->
          </div>
          <!-- /.blog-slider-container -->
        </section>
        <!-- /.section -->
        <!-- ============================================== BLOG SLIDER : END ============================================== -->

        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">New Arrivals</h3>
          <!--<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">-->
            <div ng-if="newproductlisting.length == 0"><p><center>No Products found</center></p></div>
          <data-owl-carousel class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs" data-options="{
        items : 5,
        itemsTablet:[768,2],
        itemsDesktop : [1199,2],        navigation : true,
        pagination : false,
        navigationText: ['', '']
    }">
            <div owl-carousel-item="" class="item item-carousel" ng-repeat="na in newproductlisting">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="productdetail/@{{na.product_id}}"><img  src="@{{ na.product_image }}"alt=""></a> </div>
                    <!-- /.image -->

                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="productdetail/@{{na.product_id}}">@{{ na.product_name | capitalize }}</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> @{{ na.price | currency }} </span> <span class="price-before-discount">@{{ na.price | currency }}</span> </div>
                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->

              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->

            </data-owl-carousel> 
                     <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

      </div>
      <!-- /.homebanner-holder -->
      <!-- ============================================== CONTENT : END ============================================== -->
    </div>
    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png') !!}"src="{!! asset('frontend/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png') !!}"src="{!! asset('frontend/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png') !!}"src="{!! asset('frontend/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png') !!}"src="{!! asset('frontend/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png') !!}"src="{!! asset('frontend/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png') !!}"src="{!! asset('frontend/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png') !!}"src="{!! asset('frontend/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png') !!}"src="{!! asset('frontend/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png') !!}"src="{!! asset('frontend/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png') !!}"src="{!! asset('frontend/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
        </div>
        <!-- /.owl-carousel #logo-slider -->
      </div>
      <!-- /.logo-slider-inner -->

    </div>
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div>
  <!-- /.container -->
<!-- /#top-banner-and-menu -->
<!-- //collections-bottom -->@endsection
