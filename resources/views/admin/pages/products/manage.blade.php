@extends('admin.layouts.default')

@section('content')
<div class="row" ng-controller="ManageProductController">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Manage Product</h3>
                                </div>
                                {{ csrf_field() }} 
                                
                                <div class=" panel-body form-group">                        
                                       <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                                <input type="text" ng-model="search.product_name" class="form-control" placeholder="Keywords">
                                            </div>
                                        </div>    
                                        <div class="col-md-4">
                                            <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-search"></span></span>

                                            <select class="form-control" ng-model="search.status" >
                                            <option value="">Search By Status</option>
                                            <option value="@{{x.status}}" ng-repeat="x in statusList">@{{x.status_name}}</option>

                                            </select>
                                            </div>                                            
                                        </div>
                                        </div>
 
                                                                           


                                <div class="panel-body panel-body-table">
                                
                                

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                            <tr ng-if="filtered.length == 0">
                                            <td colspan="5"><center>No data</center></td>
                                            </tr>
                                                <tr  ng-if="filtered.length > 0">
                                                    <th width="50">id</th>
                                                    <th>Product Name</th>
                                                    <th width="100">Status</th>
                                                    <th width="100">Price</th>
                                                    <th width="100">Product image</th>
                                                    <th width="100">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>      
                                            <!-- ng-repeat="(k,m) in main_product_list"--> 
                                                <tr id="trow_1" dir-paginate="(k,m) in filtered=(main_product_list|itemsPerPage:5|filter:search)">
                                                    <td class="text-center">@{{k+1}}</td>
                                                    <td><strong>@{{ m.product_name }}</strong></td>
                                                    <td class="form-group">
                                                    <span ng-if="m.status == 'A'"
                                                   class="label label-success label-form">Active</span>

                                                   <span ng-if="m.status == 'B'"
                                                   class="label label-danger label-form">Block</span>

                                                   <span ng-if="m.status == 'T'"
                                                   class="label label-danger label-form">Trash</span>
                                                    </td>
                                                    <td>@{{ m.price }}</td>
                                                    <td>
                                                    <img width="150px" height="150px" src="@{{ m.product_image }}" alt="image">
                                                    </td>
                                                    <td>
                                                    <div class="form-group">
                                                        <button class="btn btn-default btn-sm" ng-click="redirect(m.product_id)" ><span class="fa fa-pencil"></span></button>
                                                        </div>
                                                        <div class="form-group">
                                                        <select class="form-control" ng-model="m.status" ng-change="updateStatus(m.product_id,m.status)" ng-options=" x.status_name disable when x.status == m.status for x in statusList track by x.status">
                                                     <option value="">Status</option>
                                                    </select>
                                                        </div>
                                                        <!--<button class="btn btn-danger btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></button>-->


                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>                            

                                </div>
                                <dir-pagination-controls
                                    max-size="5"
                                    direction-links="true"
                                    boundary-links="true" >
                                </dir-pagination-controls> 
                                    
                            </div>                                                

                        </div>
                    
                    </div>

                    <script type="text/javascript" src="{!! asset('admin/js/angular/manageproduct.js'); !!}"></script>


@endsection