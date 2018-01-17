@extends('frontend.layouts.default')
@section('content')

	<div class='container' ng-controller="ProductDetailController">
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n">
<img src="{!! asset('frontend/images/banners/home-banner.jpg') !!}" alt="Image">
</div>
    	<!-- ============================================== HOT DEALS ============================================== -->
<div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
<input type="hidden" name="product_id" id="product_id"  value="{{ $product_id }}"/>
	<h3 class="section-title">hot deals</h3>
<!--	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">-->
	<data-owl-carousel class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs" data-options="{
		items : 1,
		itemsTablet:[768,2],
		itemsDesktopSmall :[979,2],
		itemsDesktop : [1199,1],
		navigation : true,
		slideSpeed : 300,
		pagination: false,
		paginationSpeed : 400,
		navigationText: ['', '']
	}">

					<div owl-carousel-item="" class="item" ng-repeat="bp in bestproductlisting">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
								<img src="@{{ bp.product_image }}" alt="">
							</div>
							<div class="sale-offer-tag"><span>35%<br>off</span></div>
							<div class="timing-wrapper">
								<div class="box-wrapper">
									<div class="date box">
										<span class="key">120</span>
										<span class="value">Days</span>
									</div>
								</div>

				                <div class="box-wrapper">
									<div class="hour box">
										<span class="key">20</span>
										<span class="value">HRS</span>
									</div>
								</div>

				                <div class="box-wrapper">
									<div class="minutes box">
										<span class="key">36</span>
										<span class="value">MINS</span>
									</div>
								</div>

				                <div class="box-wrapper hidden-md">
									<div class="seconds box">
										<span class="key">60</span>
										<span class="value">SEC</span>
									</div>
								</div>
							</div>
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
							<h3 class="name"><a href="detail.html">@{{ bp.product_name | capitalize }}</a></h3>
							<div class="rating rateit-small"></div>

							<div class="product-price">
								<span class="price">
								@{{ bp.price | currency }}
								</span>

							    <span class="price-before-discount">@{{ bp.offer | currency }}
</span>

							</div><!-- /.product-price -->

						</div><!-- /.product-info -->

						<div class="cart clearfix animate-effect">
							<div class="action">

								<div class="add-cart-button btn-group">
									<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
										<i class="fa fa-shopping-cart"></i>
									</button>
									<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

								</div>

							</div><!-- /.action -->
						</div><!-- /.cart -->
					</div>
						
					</data-owl-carousel>


    </div><!-- /.sidebar-widget -->
</div>
<!-- ============================================== HOT DEALS: END ============================================== -->

<!-- ============================================== NEWSLETTER ============================================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
        <form>
        	 <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			  </div>
			<button class="btn btn-primary">Subscribe</button>
		</form>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->
<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
	<div id="advertisement" class="advertisement">
        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

         <div class="item">
         	<div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
		<div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>
        </div><!-- /.item -->

        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

    </div><!-- /.owl-carousel -->
</div>

<!-- ============================================== Testimonials: END ============================================== -->



				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">

					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div id="productslider" class="product-item-holder size-big single-product-gallery small-gallery">
	
        {{--  <div id="owl-single-product">  --}}

		<data-owl-carousel id="owl-single-product" data-options="{
        items:1,
        itemsTablet:[768,2],
        itemsDesktop : [1199,1],
		autoplay:true,
		autoplayTimeout:2000,
		slideSpeed : 200,
    	navigation : true,
    	addClassActive:true


    }"> 
	<div owl-carousel-item="" class="item" ng-repeat="(k,v) in pd.product_images track by $index" class="single-product-gallery-item" id="slide@{{ key+1 }}">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="@{{k+1}}" href="#slide@{{k+1}}">
						 <img ng-if="k == 0" elevatezoom class="img-responsive"     ng-src="@{{v}}"
         zoom-image="@{{v}}" />
         				<img ng-if="k != 0" class="img-responsive"     ng-src="@{{v}}"
         zoom-image="@{{v}}" />


                    </a>
                </div>

		{{--  <div data-owl-carousel='' ng-repeat="(key, img) in pd.product_images track by $index" class="single-product-gallery-item" id="slide@{{ key+1 }}">
                <a data-lightbox="image-@{{ key+1 }}" data-title="Gallery" href="@{{ img }}">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="@{{ img }}" />
                </a>
            </div>  --}}


            {{--  <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="Gallery" href="@{{ pd.product_image }}">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="@{{ pd.product_image }}" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide2">
                <a data-lightbox="image-1" data-title="Gallery" href="@{{ pd.product_image }}">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="@{{ pd.product_image }}" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide3">
                <a data-lightbox="image-1" data-title="Gallery" href="@{{ pd.product_image }}">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="@{{ pd.product_image }}" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide4">
                <a data-lightbox="image-1" data-title="Gallery" href="@{{ pd.product_image }}">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="@{{ pd.product_image }}" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide5">
                <a data-lightbox="image-1" data-title="Gallery" href="@{{ pd.product_image }}">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="@{{ pd.product_image }}" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide6">
                <a data-lightbox="image-1" data-title="Gallery" href="@{{ pd.product_image }}">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="@{{ pd.product_image }}" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide7">
                <a data-lightbox="image-1" data-title="Gallery" href="assets/images/products/p14.jpg">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="assets/images/products/p14.jpg" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide8">
                <a data-lightbox="image-1" data-title="Gallery" href="assets/images/products/p15.jpg">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="assets/images/products/p15.jpg" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide9">
                <a data-lightbox="image-1" data-title="Gallery" href="assets/images/products/p16.jpg">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="assets/images/products/p16.jpg" />
                </a>
            </div><!-- /.single-product-gallery-item -->  --}}

        </data-owl-carousel><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">
			<data-owl-carousel id="owl-single-product-thumbnails" data-options="{
        items: 4,
        pagination: true,
        rewindNav: true,
        itemsTablet : [768, 4],
        itemsDesktop : [1199,3]
    }">
            {{--  <div id="owl-single-product-thumbnails">  --}}
                <div owl-carousel-item="" class="item" ng-repeat="(k,v) in pd.product_images track by $index">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="@{{k+1}}" href="#slide@{{k+1}}">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="@{{ v }}" />
                    </a>
                </div>
                {{--  <div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="assets/images/products/p18.jpg"/>
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="assets/images/products/p19.jpg" />
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="4" href="#slide4">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="assets/images/products/p20.jpg" />
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="5" href="#slide5">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="assets/images/products/p21.jpg" />
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="6" href="#slide6">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="assets/images/products/p22.jpg" />
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="7" href="#slide7">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="assets/images/products/p23.jpg" />
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="8" href="#slide8">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="assets/images/products/p24.jpg" />
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="9" href="#slide9">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="assets/images/products/p25.jpg" />
                    </a>
                </div>  --}}
            </data-owl-carousel><!-- /#owl-single-product-thumbnails --> 

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name">@{{ pd.product_name | capitalize }}</h1>

							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">(13 Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value" ng-if="pd.stock_status=0">In Stock</span>
											<span class="value" ng-if="pd.stock_status=1">Stock Available</span>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-control" ng-repeat="(kd,vd) in pd.variants" >
											<select ng-change="changePrice()" ng-model="variantprice[kd]">
												<option>@{{vd.variant_name}}</option>
												<option value="@{{vu.addprice}}" ng-repeat="(ku,vu) in vd">@{{vu.name}}</option>
											</select>
										</div>
									</div>
									
								</div><!-- /.row -->
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
							@{{ pd.description}}
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">


									<div class="col-sm-6">
										<div class="price-box">
											<span class="price">@{{ pd.price | currency}}</span>
											<span class="price-strike">@{{ pd.offer | currency}}</span>
											<span class="price">@{{ product_price | currency}}</span>
											
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">

									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>

									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div ng-click="increment()" class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div ng-click="decrement()" class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input ng-model="product_qty" type="text" value="@{{product_qty}}">
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
										@if(session()->has('userid'))
										<a href="#" class="btn btn-primary" ng-click="updateCart({'product_id':pd.product_id,'product_price':pd.price,'product_offer':pd.offer})"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
										@else
										<a href="#" class="btn btn-primary" ng-click="loginAlert()"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
										@endif
									</div>


								</div><!-- /.row -->
							</div><!-- /.quantity-container -->






						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>

				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">

								<div id="description" class="tab-pane in active">
									<div  ng-bind-html="pd.detail_description">
									</div>
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">

										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>

											<div class="reviews">
												<div class="review">
													<div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
													<div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
																										</div>

											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->



										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											<div class="review-table">
												<div class="table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="cell-label">Quality</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Price</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Value</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->

											<div class="review-form">
												<div class="form-container">
													<form role="form" class="cnt-form">

														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputName" placeholder="">
																</div><!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->

														<div class="action text-right">
															<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->

							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								<div id="tags" class="tab-pane">
									<div class="product-tag">

										<h4 class="title">Product Tags</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container">

												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="email" id="exampleInputTag" class="form-control txt">


												</div>

												<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">upsell products</h3>
	<data-owl-carousel class="owl-carousel upsell-product home-owl-carousel custom-carousel owl-theme outer-top-xs" data-options="{
        items : 4,
        itemsTablet:[768,2],
        itemsDesktop : [1199,2],
        navigation : true,
        pagination : false,
        navigationText: ['', '']
    }">

		<div owl-carousel-item="" class="item item-carousel" ng-repeat="fp in filterproducts">
			<div class="products">

	<div class="product">
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="@{{ fp.product_image }}" alt=""></a>
			</div><!-- /.image -->

			            <div class="tag sale"><span>sale</span></div>
		</div><!-- /.product-image -->


		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">@{{ fp.product_name | capitalize }}</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">
				<span class="price">
				@{{ fp.price | currency }}				</span>
										     <span class="price-before-discount">@{{ fp.price | currency }}</span>

			</div><!-- /.product-price -->

		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

						</li>

		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->

			</div><!-- /.products -->
		</div><!-- /.item -->

			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->

</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
<script src="{!! asset('frontend/js/angular/productdetail.js') !!}"></script>
<script>

</script>
@endsection
