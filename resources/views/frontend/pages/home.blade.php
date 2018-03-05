@extends('frontend.layouts.default')
@section('content')
<script type="text/javascript" src="{!! asset('frontend/js/angular/home.js'); !!}"></script>


<!-- ============================================== HEADER : END ============================================== -->
  <div class="container outer-top-xs" ng-controller="HomepageController">
  <div class="row">
        <div>
        <data-owl-carousel id="main-banner" class="owl-carousel home-slider"  data-options="{
      slideSpeed : 300,
      paginationSpeed : 400,
      itemsTablet:[768,2],
      itemsDesktop : [1199,2],
      singleItem:true,
      autoPlay:true,
      responsive:true,
      transitionStyle:'fadeUp'

  }">
                <div owl-carousel-item="" ng-repeat="i in fullwidthslider" class="item"> <a href="#"><img src="@{{ i }}" alt="main-banner1" class="img-responsive" /></a> </div>
        </data-owl-carousel>
        </div>

        
        
    </div>
    <!--
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

              <!--<div class="hidden-md col-sm-4 col-lg-4">
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

             <!-- <div class="col-md-6 col-sm-4 col-lg-4">
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
           <!-- </div>
            <!-- /.row -->
          <!--</div>
          <!-- /.info-boxes-inner -->

        <!--</div>
    </div>-->

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
                          <div class="product-price"> 
                            <span class="price">@{{ ap.price | currency }} </span>
                            <span ng-if="ap.product_offer != 0" class="price-before-discount">@{{ ap.offer | currency }}</span> 
                            <span  ng-if="ap.product_offer != 0" class="offer">@{{ ap.product_offer | offer}} </span> 
                           </div>
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
        <!-- ============================================== WIDE PRODUCTS-->

        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Brands products</h3>
          <div ng-if="brandAdsList.length == 0"><p><center>No brands found</center></p></div>
          <data-owl-carousel class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs" data-options="{
        items : 2,
        navigation : true,
        pagination : false,
        navigationText: ['', '']
    }">
            <div owl-carousel-item="" class="item item-carousel" ng-repeat="fp in brandAdsList">
              <figure class="snip1581"><img src="@{{ fp.imageurl }}" alt="profile-sample2"/>
            <figcaption>
              <h3 class="title1">@{{fp.caption}}</h3>
              <h3 class="title2"></h3>
              <h3 class="title3"></h3>
            </figcaption><a href="#"></a>
          </figure>
            </div>
            <!-- /.item -->
          </data-owl-carousel>
          <!-- /.home-owl-carousel -->
        </section>

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
                    <div class="product-price"> <span class="price">@{{ fp.price | currency }}  </span> <span ng-if="fp.product_offer != 0" class="price-before-discount">@{{ fp.offer | currency }}</span> 
                            <span  ng-if="fp.product_offer != 0" class="offer">@{{ fp.product_offer | offer}} </span> </div>
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
      
      
        <!-- ============================================== BEST SELLER : END ============================================== -->

        <!-- ============================================== BLOG SLIDER ============================================== -->
      
        <!-- ============================================== BLOG SLIDER : END ============================================== -->

        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">Best Products</h3>
          <!--<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">-->
            <div ng-if="bestproductlisting.length == 0"><p><center>No Products found</center></p></div>
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
                    <div class="product-price"> <span class="price"> @{{ na.price | currency }} </span><span ng-if="na.product_offer != 0" class="price-before-discount">@{{ na.offer | currency }}</span> 
                            <span  ng-if="na.product_offer != 0" class="offer">@{{ na.product_offer | offer}} </span> </div>
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
                    <div class="product-price"> <span class="price"> @{{ na.price | currency }} </span> <span ng-if="na.product_offer != 0" class="price-before-discount">@{{ na.offer | currency }}</span> 
                            <span  ng-if="na.product_offer != 0" class="offer">@{{ na.product_offer | offer}} </span> </div>
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
