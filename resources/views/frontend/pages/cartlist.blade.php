@extends('frontend.layouts.default')
@section('content')
<div class="container" ng-controller="CartListController">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr ng-if="allcartlisting.length == 0"><td colsspan="4"><center>No Orders Found</center></td></tr>
				<tr ng-if="allcartlisting.length > 0">
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					{{--  <th class="cart-edit item">Edit</th>  --}}
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Subtotal</th>
					<th class="cart-total last-item">Grandtotal</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="{{route('home')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<!-- <a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a> -->
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody >
				<tr ng-repeat="(kl,cl) in allcartlisting">
					<td ng-click="deleteCart(cl.order_id)" class="romove-item"><a href="#" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="@{{cl.products_detail.product_link}}">
						    <img src="@{{ cl.products_detail.product_image }}" alt="">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="">@{{ cl.products_detail.description | capitalize }}</a></h4>
<!-- 						<div class="row">
							<div class="col-sm-4">
								<div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-8">
								<div class="reviews">
									(06 Reviews)
								</div>
							</div>
						</div><!-- /.row -->
 						<div ng-repeat="vv in cl.variants"  class="cart-product-info">
											<span class="product-color">@{{vv.variant_name}}:<span></span>@{{vv.variant.name}}</span>
						</div>
					</td>
					{{--  <td class="cart-product-edit"><a href="#" class="product-edit">Edit</a></td>  --}}
					<td class="cart-product-quantity">
						<div class="quant-input">
				                <div class="arrows">
				                  <div ng-click="increment(cl.order_id)" class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
				                  <div  ng-click="decrement(cl.order_id)" class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
				                </div>
				                <input type="text" ng-model="order_qty[cl.order_id]" value="@{{ cl.quantity }}"/>
			            </div>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price">@{{ product_price[cl.order_id] }}</span>
					</td>
					<td class="cart-product-grand-total"><span class="cart-grand-total-price">@{{ order_total[cl.order_id]}}</span>
					<input type="hidden"  ng-init="order_total[kl] = cl.total" value="@{{ cl.total }}"/>

					</td>

				</tr>
			</tbody><!-- /tbody -->
		</table><!-- /table -->
	</div>
</div><!-- /.shopping-cart-table -->				<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Estimate shipping and tax</span>
					<p>Enter your destination to get shipping and tax.</p>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<label class="info-title control-label">Country <span>*</span></label>
							<select class="form-control unicase-form-control selectpicker">
								<option>--Select options--</option>
								<option>India</option>
								<option>SriLanka</option>
								<option>united kingdom</option>
								<option>saudi arabia</option>
								<option>united arab emirates</option>
							</select>
						</div>
						<div class="form-group">
							<label class="info-title control-label">State/Province <span>*</span></label>
							<select class="form-control unicase-form-control selectpicker">
								<option>--Select options--</option>
								<option>TamilNadu</option>
								<option>Kerala</option>
								<option>Andhra Pradesh</option>
								<option>Karnataka</option>
								<option>Madhya Pradesh</option>
							</select>
						</div>
						<div class="form-group">
							<label class="info-title control-label">Zip/Postal Code</label>
							<input type="text" class="form-control unicase-form-control text-input" placeholder="">
						</div>
						<div class="pull-right">
							<button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
						</div>
					</td>
				</tr>
		</tbody>
	</table>
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Discount Code</span>
					<p>Enter your coupon code if you have one..</p>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
						</div>
						<div class="clearfix pull-right">
							<button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead>
			<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">@{{grand_subtotal}}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">@{{grand_total}}</span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
							<span class="">Checkout with multiples address!</span>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
		</div> <!-- /.row -->
		</div> <!-- /.row -->
		<script src="{!! asset('frontend/js/angular/cartlist.js') !!}"></script>

	@endsection
