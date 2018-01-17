@extends('admin.layouts.default')

@section('content')

<div class="row" ng-controller="AddProductController as product">

                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="POST"  >
                            <div class="panel panel-default tabs">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>{{ __('message.add_product') }} </strong></h3>
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
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select ng-change="getVariants(product.category_id,main_category_list)" name="category_id" ng-model="product.category_id" class="form-control ">
                                                <option value="@{{ m.category_id }}" ng-repeat='m in main_category_list'>@{{ m.category_name }}</option>
                                            </select>
                                        <span class="help text-danger" ng-if="errors.category_id[0]!= ''">@{{errors.category[0]}}</span> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Variants</label>
                                            @{{variants}}
                                    </div>


                                    <div class="form-group" ng-repeat="(kd,vd) in variants_list">
                                        <label class="col-md-3 col-xs-12 control-label">@{{ vd.variant_name }}</label>
                                        <input type="hidden" ng-init="variants[kd].variant_name = vd.variant_name" value="@{{ vd.variant_name}}"/>
                                        <input type="hidden" ng-init="variants[kd].variant_id = vd.variant_id" value="@{{vd.variant_id}}"/>
                                        <div class="col-md-9 col-xs-12 form-group " ng-repeat="(ku,vu) in vd.variant_value">
                                        <input class="form-control" ng-readonly="true" placeholder="@{{vu}}" type="text" style="width:20%;float:left;margin:5px" ng-model="variants[ku].name" id="product_name" class="form-control" ng-init="variants[kd][ku].name = vu" value="@{{vu}}"/> 
                                        <input class="form-control" type="text" style="width:20%;float:left;margin:5px" placeholder="Variant Price" ng-model="variants[kd][ku].addprice" id="product_name" class="form-control"/>        
                                        <input class="form-control" type="text" style="width:20%;float:left;margin:5px" placeholder="Variant Stock" ng-model="variants[kd][ku].stock" id="product_name" class="form-control"/> 
                                        </div>    
                                    </div>
                                        

                                    <input type="hidden" name="p_status" ng-model="product.p_status" value="A" />
                                    <input type="hidden" name="image" ng-model="product.image" value="" />

                                    
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
                                        <div class="col-md-6 col-xs-12">                                            <!-- 
                                            <textarea summernote class="form-control" name="description" ng-model="detail_description" id="detail_description" rows="5"></textarea> -->

                                            <div class="text-angular" text-angular="text-angular" name="htmlcontent" ng-model="product.detail_description" ></div>

                                        </div>
                                        <span class="help text-danger" ng-if="errors.moredescription[0]!= ''">@{{errors.detail_description[0]}}</span>

                                                                                   
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Available For Sale</label>
                                        <div class="col-md-9"><div class="checkbox">
                                      <label>
                                        <input type="checkbox" ng-model="product.sale_available"  ng-true-value="1" ng-false-value="0" name="sale_available" ng-checked="checked" id="sale_available">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                      </label>
                                        </div>
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

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Stock Status</label>
                                        <div class="col-md-9">

                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox" ng-model="product.stock_status"  ng-true-value="1" ng-false-value="0" name="stock_status" ng-checked="checked" id="stock_status">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                      </label>
                                    </div>
        

                                        <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <hr></hr>

                                        <div class="form-group">
                                        <label class="col-md-3 control-label">Free Shipping</label>
                                        <div class="col-md-9">
                                        <div class="checkbox">
                                      <label>
                                        <input type="checkbox" ng-model="product.free_shipping"  ng-true-value="1" ng-false-value="0" name="free_shipping" ng-checked="checked" id="free_shipping">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                      </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
</div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Shipping Charge</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="shipping_charge" id="shipping_charge" ng-readonly="product.free_shipping == 1"class="form-control" ng-model="product.shipping_charge"/>
                                            </div> 
                                            <span class="help text-danger" ng-if="errors.shipping_charge[0]!= ''">@{{errors.stock[0]}}</span>                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Weight</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="stock" id="stock" class="form-control" ng-model="product.weight"/>
                                            </div> 
                                            <span class="help text-danger" ng-if="errors.weight[0]!= ''">@{{errors.weight[0]}}</span>                                            
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
                                    <hr></hr>



                                    
                                    <!--
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tags</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <input type="text" class="tagsinput" value="First,Second,Third"/>
                                            <span class="help-block">Default textarea field</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Select</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control select">
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                                <option>Option 4</option>
                                                <option>Option 5</option>
                                            </select>
                                            <span class="help-block">Select box example</span>
                                        </div>
                                    </div>-->
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Product Image</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                            <input type="file" class="btn-primary" name="product_photo"   ng-file-model="files"  id="file-simple-1" title="Browse file"/>
                                            <input type="hidden" id="file-simple-1-val" ng-model="product.product_photo[0]"/>
                                            <span class="help text-danger" ng-if="errors.product_photo[0]!= ''">@{{errors.product_photo[0]}}</span>

                                            <input type="file" class="btn-primary" name="product_photo" ng-model="product.product_photo"  ng-file-model="files"  id="file-simple-2" title="Browse file"/>
                                            <input type="hidden" id="file-simple-2-val" ng-model="product.product_photo[1]"/>
                                            <span class="help text-danger" ng-if="errors.product_photo_2[0]!= ''">@{{errors.product_photo_2[0]}}</span>

                                            <input type="file" class="btn-primary" name="product_photo"  ng-file-model="files"  id="file-simple-3" title="Browse file"/>
                                            <input type="hidden" id="file-simple-3-val" ng-model="product.product_photo[2]"/>
                                            <span class="help text-danger" ng-if="errors.product_photo_3[0]!= ''">@{{errors.product_photo_3[0]}}</span>

                                            <input type="file" class="btn-primary" name="product_photo"  ng-file-model="files"  id="file-simple-4" title="Browse file"/>
                                            <input type="hidden" id="file-simple-4-val" ng-model="product.product_photo[3]"/>
                                            <span class="help text-danger" ng-if="errors.product_photo_4[0]!= ''">@{{errors.product_photo_4[0]}}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-default">Clear Form</button>                                    
                                    <button  ng-click="addproduct()" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div> 
                    <script type="text/javascript" src="{!! asset('admin/js/angular/addproduct.js'); !!}"></script>
   
                                  

@endsection