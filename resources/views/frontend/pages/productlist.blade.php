@extends('frontend.layouts.default')
@section('content')
<!-- /.breadcrumb -->
  <div class='container'  ng-controller="CatProductController">
    <div class='row'>
      <input type="hidden" name="category_id" id="category_id" value="{{ $category_id }}" />
      <div class='col-md-3 sidebar'>
        <!-- ================================== TOP NAVIGATION ================================== -->

        <div class="side-menu animate-dropdown outer-bottom-xs">
           <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
              <li ng-repeat="cc in allcategorylisting" class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>@{{ cc.category_name |capitalize }}</a>
                <ul class="dropdown-menu mega-menu" ng-if="cc.subCategory.length > 0">
                  <li class="yamm-content" ng-repeat="sc in cc.subCategory">
                    <div class="row">
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li  ng-repeat="scc in sc.subCategory"><a href="#">@{{ scc.category_name | capitalize}}</a></li>
                        </ul>
                      </div>
            </ul>
            <!-- /.nav -->
          </nav>
          <!-- /.megamenu-horizontal -->
        </div>
        </div>
        <!-- /.side-menu -->
        <!-- ================================== TOP NAVIGATION : END ================================== -->
        <div class="sidebar-module-container">
          <div class="sidebar-filter">
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <h3 class="section-title">shop by</h3>
              <div class="widget-header">
                <h4 class="widget-title">Category</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">
                  <div ng-if="allcategorylisting.length == 0"><p><center>No Subcategories found</center></p></div>

                  <div class="accordion-group" ng-repeat="(k,cc) in allcategorylisting">
                    <div class="accordion-heading"  > <a href="#collapse@{{ k+1 }}" data-toggle="collapse"  ng-class="getAccordionClass(k)"> @{{ cc.category_name |capitalize }} </a> </div>
                    <!-- /.accordion-heading -->
                    <div ng-if="cc.subCategory.length > 0" class="accordion-body collapse" id="collapse@{{ k+1 }}" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li ng-repeat="sc in cc.subCategory"><a href="#">@{{ sc.category_name |capitalize }}</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner -->
                    </div>
                    <!-- /.accordion-body -->
                  </div>
                  <!-- /.accordion-group -->

                </div>
                <!-- /.accordion -->
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

            <!-- ============================================== PRICE SILDER============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Price Slider</h4>
              </div>
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                  <input type="text" class="price-slider" value="" >
                </div>
                <!-- /.price-range-holder -->
                <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== PRICE SILDER : END ============================================== -->
            <!-- ============================================== MANUFACTURES============================================== -->
            <div ng-repeat="(k,v) in variants" class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">@{{ v.variant_name | capitalize }}

                </h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list"> 
                  <li ng-repeat="vv in v.variant_value">
                    <input ng-change="productListing()" type="checkbox" checklist-value="vv" checklist-model="filter.variants[v.variant_name]"/>&nbsp;<label>@{{ vv | capitalize }}</label></li>
                </ul>
                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== MANUFACTURES: END ============================================== -->
            <!-- ============================================== COLOR============================================== -->            <!-- /.sidebar-widget -->
            <!-- ============================================== COLOR: END ============================================== -->
            <!-- ============================================== COMPARE============================================== -->
            <div class="sidebar-widget wow fadeInUp outer-top-vs">
              <h3 class="section-title">Compare products</h3>
              <div class="sidebar-widget-body">
                <div class="compare-report">
                  <p>You have no <span>item(s)</span> to compare</p>
                </div>
                <!-- /.compare-report -->
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== COMPARE: END ============================================== -->
            <!-- ============================================== PRODUCT TAGS ============================================== -->
            <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
              <h3 class="section-title">Product tags</h3>
              <div class="sidebar-widget-body outer-top-xs">
                <div class="tag-list"> <a class="item" title="Phone" href="category.html">Phone</a> <a class="item active" title="Vest" href="category.html">Vest</a> <a class="item" title="Smartphone" href="category.html">Smartphone</a> <a class="item" title="Furniture" href="category.html">Furniture</a> <a class="item" title="T-shirt" href="category.html">T-shirt</a> <a class="item" title="Sweatpants" href="category.html">Sweatpants</a> <a class="item" title="Sneaker" href="category.html">Sneaker</a> <a class="item" title="Toys" href="category.html">Toys</a> <a class="item" title="Rose" href="category.html">Rose</a> </div>
                <!-- /.tag-list -->
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
          <!----------- Testimonials------------->
            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
              <div id="advertisement" class="advertisement">
                <div class="item">
                  <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">John Doe <span>Abc Company</span> </div>
                  <!-- /.container-fluid -->
                </div>
                <!-- /.item -->

                <div class="item">
                  <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
                  <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                </div>
                <!-- /.item -->

                <div class="item">
                  <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                  <!-- /.container-fluid -->
                </div>
                <!-- /.item -->

              </div>
              <!-- /.owl-carousel -->
            </div>

            <!-- ============================================== Testimonials: END ============================================== -->

            <div class="home-banner"> <img src="assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
          </div>
          <!-- /.sidebar-filter -->
        </div>
        <!-- /.sidebar-module-container -->
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'>
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <div class="image"> <img src="{!! asset('/frontend/images/banners/cat-banner-1.jpg') !!}" alt="" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                <div class="big-text"> Big Sale </div>
                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
              </div>
              <!-- /.caption -->
            </div>
            <!-- /.container-fluid -->
          </div>
        </div>


        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <!-- <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs
            </div> -->
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                     <!-- <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                       <ul ng-model="filter.order_by" role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">position</a></li>
                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                      </ul> -->
                      <select ng-change="productListing()" class="btn dropdown-toggle  cat-select" ng-model="filter.order_by" class="form-control">
                        <option value="1" >Price:Lowest first</option>
                        <option value="2">Price:Highest first</option>
                        <option value="3">Product Name:A to Z</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>
              <!-- /.col -->
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Show</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">1</a></li>
                        <li role="presentation"><a href="#">2</a></li>
                        <li role="presentation"><a href="#">3</a></li>
                        <li role="presentation"><a href="#">4</a></li>
                        <li role="presentation"><a href="#">5</a></li>
                        <li role="presentation"><a href="#">6</a></li>
                        <li role="presentation"><a href="#">7</a></li>
                        <li role="presentation"><a href="#">8</a></li>
                        <li role="presentation"><a href="#">9</a></li>
                        <li role="presentation"><a href="#">10</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-4 text-right">
               <div class="pagination-container">
               <!-- <ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                  
                <!-- /.list-inline -->
                              <dir-pagination-controls
                                    max-size="1"
                                    direction-links="true"
                                    boundary-links="false" >
                </dir-pagination-controls>
              </div>
 
              <!-- /.pagination-container --> </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                  <div ng-if="allproductlisting.length == 0"><center>No Products Found</center></div>


                  <div class="col-sm-6 col-md-4 wow fadeInUp" dir-paginate="(k,m) in filtered=(allproductlisting|itemsPerPage:1|filter:search)">
                  <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="productdetail/@{{ m.product_id }}"><img  src="@{{m.product_image}}" alt=""></a> </div>
                          <!-- /.image -->

                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">@{{m.product_name}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> @{{m.price | currency}} </span> <span class="price-before-discount">@{{m.offer | currency}}</span> </div>
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
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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

                                 </div>
                <!-- /.category-product-inner -->
              </div>
              <!-- /.category-product -->
            </div>
            <!-- /.tab-pane #list-container -->
          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <div class="text-right">
              <div class="pagination-container">
                <!--<ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>-->
                <dir-pagination-controls
                                    max-size="5"
                                    direction-links="true"
                                    boundary-links="false" >
                                </dir-pagination-controls> 
                                
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.text-right -->

          </div>
          <!-- /.filters-container -->

        </div>
        <!-- /.search-result-container -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
        </div>
        <!-- /.owl-carousel #logo-slider -->
      </div>
      <!-- /.logo-slider-inner -->

    </div>
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
  <!-- /.container -->

</div>
<script src="{!! asset('frontend/js/angular/catproducts.js') !!}"></script>

@endsection
