@extends('admin.layouts.default')

@section('content')
 <!-- START BREADCRUMB -->
 <ul class="breadcrumb">
 <li><a href="#">Link</a></li>                    
 <li class="active">Active</li>
</ul>
<!-- END BREADCRUMB -->                

<div class="page-title">                    
 <h2><span class="fa fa-arrow-circle-o-left"></span> Dashboard</h2>
</div>                   

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

 <div class="row">
     <div class="col-md-12">

         <div class="panel panel-default">
             <div class="panel-heading">
                 <h3 class="panel-title">Panel Title</h3>
             </div>
             <div class="panel-body">
                 Panel body
             </div>
         </div>

     </div>
 </div>

</div>
<!-- END PAGE CONTENT WRAPPER --> 
        @endsection
