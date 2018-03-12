@extends('frontend.layouts.default')
@section('content')
<div class="container" ng-controller="WishListController">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Wishlist</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-if="allwishlisting.length == 0"><td colsspan="4"><center>No products found in wishlist</center></td></tr>

				<tr  dir-paginate="(kl,wl) in filtered=(allwishlisting|itemsPerPage:5|filter:search)">
					<td class="col-md-2"><img src="@{{ wl.products_detail.product_image }}" alt="imga"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="#">@{{ wl.products_detail.product_name | capitalize }}</a></div>
						<!--<div class="rating">
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star non-rate"></i>
							<span class="review">( 06 Reviews )</span>
						</div> -->
						<div class="price">
							<span ng-if="wl.products_detail.product_offer != 0">@{{ wl.products_detail.product_offer | offer}}</span>
							@{{ wl.products_detail.product_price | currency }}
						</div>
					</td>
					<td class="col-md-2">
						<a href="#" ng-click="redirect(wl.product_id)" class="btn-upper btn btn-primary">Add to cart</a>
					</td>
					<td class="col-md-1 close-btn">
						<a href="#" ng-click="deleteWish(wl.wish_id)"  class=""><i class="fa fa-times"></i></a>
					</td>
				</tr>
			</tbody>
		</table> <dir-pagination-controls
                                    max-size="5"
                                    direction-links="true"
                                    boundary-links="true" >
                                </dir-pagination-controls> 
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	
</div><!-- /.logo-slider -->
<script src="{!! asset('frontend/js/angular/wishlist.js') !!}"></script>

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div>		@endsection
