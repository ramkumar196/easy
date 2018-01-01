@extends('admin.layouts.default')

@section('content')

<div class="row" ng-controller="EditProductController as product">

                         <div class="col-md-12">
                            
                            <form class="form-horizontal" method="POST"  >
                            <div class="panel panel-default tabs">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>{{ __('message.edit_product') }}</strong></h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div> 
                                {{--  <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Product info</a></li>
                                        <li><a href="#tab-second" role="tab" data-toggle="tab">Pricing</a></li>
                                        <li><a href="#tab-third" role="tab" data-toggle="tab">Shipping</a></li>
                                        <li><a href="#tab-fourth" role="tab" data-toggle="tab">Marketing</a></li>

                                </ul>  --}}
                            
                                <div class="panel-body">   
                                {{ csrf_field() }}  
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Product Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="product_name" id="product_name" class="form-control" ng-model="product.product_name"/>
                                            </div> 
                                            <span class="help text-danger" ng-if="errors.product_name [0]!= ''">@{{errors.product_name[0]}}</span>                                           
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Category</label>
                                        <div class="col-md-6 col-xs-12">                                                                               @{{product.category}}             
                                            <select name="category_id" ng-model="product.category_id" class="form-control ">
                                            <option value="">Select Category</option>
                                                <option ng-selected= "m.id == product.category_id" value="@{{ m.id }}" ng-repeat='m in main_category_list'>@{{ m.category_name }}</option>
                                            </select>
                                        <span class="help text-danger" ng-if="errors.main_category[0]!= ''">@{{errors.category[0]}}</span> 
                                        </div>
                                    </div>


                                    <input type="hidden" name="p_status" ng-model="product.p_status" value="A" />
                                    <input type="hidden" name="image" ng-model="product.image" value="" />
                                    <input type="hidden" name="product_id" ng-model="product_id" id="product_id" value="{{$product_id}}" />

                                    
                                    <!--<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Password</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                <input type="password" class="form-control"/>
                                            </div>            
                                            <span class="help-block">Password field sample</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Datepicker</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="text" class="form-control datepicker" value="2014-11-01">                                            
                                            </div>
                                            <span class="help-block">Click on input field to get datepicker</span>
                                        </div>
                                    </div>-->
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Product Description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" name="description" ng-model="product.description" id="description" rows="5"></textarea>
                                        </div>
                                        <span class="help text-danger" ng-if="errors.description[0]!= ''">@{{errors.description[0]}}</span>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Detailed Description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea summernote class="form-control" name="description" ng-model="product.detail_description" id="detail_description" rows="5"></textarea>
                                           
                                        </div>
                                        <span class="help text-danger" ng-if="errors.moredescription[0]!= ''">@{{errors.moredescription[0]}}</span>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Available For Sale</label>
                                        <div class="col-md-9">
                                        <label class="check"><div class="icheckbox_minimal-grey "><input type="checkbox" class="icheckbox" ng-checked="sale_available" name="sale_available" id="sale_available" checked="checked" ></div></label>
                                        <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <hr></hr>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Product Price</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="price" id="price" class="form-control" ng-model="product.price"/>
                                            </div> 
                                            <span class="help text-danger" ng-if="errors.price[0]!= ''">@{{errors.price[0]}}</span>                                                                                     
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Product Offer</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="offer" id="offer" class="form-control" ng-model="product.offer"/>
                                            </div> 
                                            <span class="help text-danger" ng-if="errors.offer[0]!= ''">@{{errors.offer[0]}}</span>                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Stock</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="stock" id="stock" class="form-control" ng-model="product.stock"/>
                                            </div> 
                                            <span class="help text-danger" ng-if="errors.stock[0]!= ''">@{{errors.stock[0]}}</span>                                            
                                        </div>
                                    </div>

                                    <hr></hr>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Free Shipping</label>
                                        <div class="col-md-9">
                                        <label class="check"><div class="icheckbox_minimal-grey "><input type="checkbox" class="icheckbox" ng-checked="free_shipping" name="free_shipping" id="free_shipping" checked="checked" ></div></label>
                                        <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Shipping Charge</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="shipping_charge" id="shipping_charge" class="form-control" ng-model="product.shipping_charge"/>
                                            </div> 
                                            <span class="help text-danger" ng-if="errors.shipping_charge[0]!= ''">@{{errors.stock[0]}}</span>                                            
                                        </div>
                                    </div>

                                    <hr></hr>


                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Meta keywords</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" ng-model="product.meta_keywords"/>
                                            </div> 
                                            <span class="help text-danger" ng-if="errors.meta_keywords[0]!= ''">@{{errors.stock[0]}}</span>                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Meta Description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" name="meta_description" ng-model="product.meta_description" id="meta_description" rows="5"></textarea>
                                        </div>
                                        <span class="help text-danger" ng-if="errors.meta_description[0]!= ''">@{{errors.meta_description[0]}}</span>

                                    </div>


                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Product Image</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                            <input type="file" class="btn-primary" name="product_photo" ng-model="product.product_photo" file="file" multiple id="file-simple" title="Browse file"/>
                                            <span class="help text-danger" ng-if="errors.product_photo[0]!= ''">@{{errors.product_photo[0]}}</span>                                          

                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label class="col-md-3 col-xs-12 control-label"></label>

                                        <div class="col-md-6 col-xs-12">                                                      
                                            <img width="150px" height="150px" src="/uploads/products/@{{ product.product_photo }}" alt="image">

                                        </div>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Checkbox</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                            <label class="check"><input type="checkbox" class="icheckbox" checked="checked"/> Checkbox title</label>
                                            <span class="help-block">Checkbox sample, easy to use</span>
                                        </div>
                                    </div>-->

                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-default">Clear Form</button>                                    
                                    <button  ng-click="updateproduct()" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div> 
                    <script type="text/javascript" src="{!! asset('admin/js/angular/editproduct.js'); !!}"></script>
   
                                  

@endsection