@extends('admin.layouts.default')

@section('content')
<div class="row" ng-controller="EditCategoryController">

                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="POST"  >
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Edit Category </strong></h3>
                                   <!-- <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>-->
                                </div>
                            
                                <div class="panel-body">   
                                {{ csrf_field() }}                                                                     
                                    
                                    <input type="hidden" name="status" ng-model="status" value="A" />
                                    <input type="hidden" name="category_id" id="category_id"
                                    ng-model="category_id"  value="1" />
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Category</label>
                                        <div class="col-md-6 col-xs-12">    
                                            <select name="main_category"   ng-model="main_category" class="form-control ">
                                            <option value="">Select Category</option>
                                                <option value="@{{ m.category_id }}" ng-selected= "m.id == main_category" ng-repeat="m in main_category_list">@{{ m.category_name }}</option>
                                            </select>
                                        <span class="help text-danger" ng-if="errors.main_category[0]!= ''">@{{errors.main_category[0]}}</span> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Category Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="category_name" id="category_name" ng-model="category_name" class="form-control" />
                                            </div> 
                                            <span class="help text-danger" ng-if="errors.category_name[0]!= ''">@{{errors.category_name[0]}}</span>                                           
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-footer">
                                    <button  ng-click="clear()" class="btn btn-default">Clear Form</button>                                    
                                    <button  ng-click="editcategory()" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div> 
                    <script type="text/javascript" src="{!! asset('admin/js/angular/editcategory.js'); !!}"></script>
   
                                  

@endsection