@extends('admin.layouts.default')

@section('content')
<div class="row" ng-controller="ManageVariantsController" >
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Manage Category</h3>
                                </div>
                                {{ csrf_field() }}   

                                
                                <div class=" panel-body form-group">                        
                                       <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                                <input type="text" ng-model="search.variant_name" class="form-control" placeholder="Keywords">
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
                                                <td colspan="4" class="center"><center>No data</center></td>
                                                </tr> 
                                                <tr ng-if="filtered.length > 0">
                                                    <th width="50">id</th>
                                                    <th>Variants Name</th>
                                                    <th>Variants Type</th>
                                                    <th>Variants Value</th>
                                                    <th width="100">Status</th>
                                                    <th width="100">Actions</th>
                                                </tr >
                                            </thead>
                                            <tbody>  
                                                   
                                                <tr id="trow_1" dir-paginate="(k,m) in filtered=(main_category_list|itemsPerPage:5|filter:search)">
                                                <td class="text-center">@{{k+1}}</td>
                                                <td>@{{m.variant_name}}</td>   
                                                <td>@{{m.variant_type}}</td>   
                                                <td>@{{m.variant_value}}</td>   
                                                <td>
                                                    <span ng-if="m.status == 'A'"
                                                   class="label label-success label-form">Active</span>

                                                   <span ng-if="m.status == 'B'"
                                                   class="label label-danger label-form">Block</span>

                                                   <span ng-if="m.status == 'T'"
                                                   class="label label-danger label-form">Trash</span></td>

                                                    <td>

                                                    <div class="form-group">
                                                        <button class="btn btn-default btn-sm" ng-click="redirect(m.id)" ><span class="fa fa-pencil"></span></button>
                                                        </div>
                                                        <div class="form-group">
                                                        <select class="form-control" ng-model="m.status" ng-change="updateStatus(m.id,m.status)" ng-if="x.status_name != m.status" ng-options=" x.status_name disable when x.status == m.status for x in statusList track by x.status">
                                                     <option value="">Status</option>
                                                    </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                 
                                            </tbody>
                                        </table>
                                        <dir-pagination-controls
                                    max-size="5"
                                    direction-links="true"
                                    boundary-links="true" >
                                </dir-pagination-controls>  
                                    </div>    
                                
                                </div>
                            </div>                                                

                        </div>
                    </div>

                            <script type="text/javascript" src="{!! asset('admin/js/angular/managevariants.js'); !!}"></script>
                            <!-- END DEFAULT DATATABLE -->
@endsection