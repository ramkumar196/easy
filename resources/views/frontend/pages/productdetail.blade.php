@extends('frontend.layouts.default')
@section('content')

	<div class='container' ng-controller="ProductDetailController">
		<div class='row single-product'>
			<input type="hidden" name="product_id" id="product_id"  value="{{ $product_id }}"/>

			<div class='col-md-12'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">

					     <div class="col-xs-6 col-sm-3 col-md-6 gallery-holder">
    <div id="productslider" class="product-item-holder size-big single-product-gallery small-gallery">
	
        {{--  <div id="owl-single-product">  --}}

		<data-owl-carousel id="owl-single-product" data-options="{
        items:1,
		autoplay:true,
		autoplayTimeout:200,
		slideSpeed : 200,
    	navigation : true,
    	addClassActive:true,
    	navigationText: ['','']



    }"> 
	<div owl-carousel-item="" class="item" ng-repeat="(k,v) in pd.product_images track by $index" class="single-product-gallery-item" id="slide@{{ key+1 }}">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="@{{k+1}}" href="#slide@{{k+1}}">
						 <img ng-if="k == 0" elevatezoom  class="img-responsive"     ng-src="@{{v}}"
         zoom-image="@{{v}}" />
         				<img ng-if="k != 0" class="img-responsive"     ng-src="@{{v}}"
         zoom-image="@{{v}}" />


                    </a>
                </div>



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
          
            </data-owl-carousel><!-- /#owl-single-product-thumbnails --> 

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->
					<div class='col-sm-6 col-md-6 product-info-block'>
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
									<div class="col-sm-3 m-t-20">
										<div class="form-group" ng-repeat="(kd,vd) in pd.variants" >
											<label class="control-label">@{{vd.variant_name}}</label>
                                        <input type="hidden" ng-if="variantprice[kd]" ng-init="variantprice[kd].variant_name = vd.variant_name" value="@{{ vd.variant_name}}"/>
                                        <input type="hidden" ng-if="variantprice[kd]" ng-init="variantprice[kd].variant_id = vd.variant_id" value="@{{ vd.variant_id}}"/>
											<select  class="form-control" ng-change="changePrice()" ng-model="variantprice[kd].variant">
												<option value="@{{vu}}" ng-repeat="(ku,vu) in vd " ng-if="vu.addprice">@{{vu.name}}</option>
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
											<span class="price">@{{ product_price | currency}}</span>

											<span class="price-strike">@{{ pd.offer | currency}}</span>
											
										</div>
									</div>

									<div class="col-sm-6">
										<div ng-click="updateWish(pd.product_id)" class="favorite-button m-t-10">
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
        items : 5,
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
				<div class="product-price"> <span class="price"> @{{ fp.price | currency }} </span> <span ng-if="fp.product_offer != 0" class="price-before-discount">@{{ fp.offer | currency }}</span> 
                            <span  ng-if="fp.product_offer != 0" class="offer">@{{ fp.product_offer | offer}} </span> </div>

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
							<a class="add-to-cart" href="@{{fp.product_link}}" title="Wishlist">
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
