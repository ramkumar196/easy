@extends('admin.layouts.default')

@section('content')

<div class="row" ng-controller="EditVariantsController">

                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="POST"  >
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Edit Variants </strong></h3>
                                   <!-- <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>-->
                                </div>
                            
                                <div class="panel-body">   
                                {{ csrf_field() }}                                                                     
                                    
                                    <input type="hidden" name="status" ng-model="status" value="A" />

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Variant Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="variant_name" id="variant_name" ng-model="variant_name" class="form-control" ng-model="variant_name"/>
                                            </div> 
                                            <span class="help text-danger" ng-if="errors.variant_name[0]!= ''">@{{errors.variant_name[0]}}</span>                                           
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Category</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select name="category" ng-model="category" class="form-control ">
                                                <option value="@{{ m.category_id }}" ng-selected= "m.category_id == category" ng-repeat='m in main_category_list'>@{{ m.category_name }}</option>
                                            </select>
                                        <span class="help text-danger" ng-if="errors.category[0]!= ''">@{{errors.category[0]}}</span> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Variant Type</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select name="variant_type" ng-model="variant_type" class="form-control ">
                                                <option  value="">Select type</option>
                                                <option value="@{{ m.variant_type }}" ng-selected= "m.variant_type == variant_type" ng-repeat='m in variantList'>@{{ m.variant_name }}</option>
                                            </select>
                                        <span class="help text-danger" ng-if="errors.variant_type[0]!= ''">@{{errors.variant_type[0]}}</span> 
                                        </div>
                                    </div>
                                    <input type="hidden" id="variants_id" value="{{$variants_id}}"/>

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Variants Values</label>
                                        <div class="col-md-6 col-xs-12">                
                                        <tags-input class="bootstrap" ng-model="variant_value" 
                                        placeholder="Add value" 
                                        min-length="1"
                                        max-length="10"
                                        >
                                        <!-- allowed-tags-pattern="^[0-9]+$" -->
                                        </tags-input>
                                            <span class="help-block" ng-if="errors.variants_value[0]!= ''">@{{errors.variants_value[0]}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-footer">
                                    <button  ng-click="clear()" class="btn btn-default">Clear Form</button>                                    
                                    <button  ng-click="editvariants()" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div> 
                    <script type="text/javascript" src="{!! asset('admin/js/angular/editvariants.js'); !!}"></script>
   
                                  

@endsection