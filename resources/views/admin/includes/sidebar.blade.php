<!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">Easy Admin</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <!--<li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">John Doe</div>
                                <div class="profile-data-title">Web Developer/Designer</div>
                            </div>
                            <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>
                    </li>-->
                    <li class="xn-title">Navigation</li>
                    <li class="active">
                        <a href="{{ route('admin.dashboard') }}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Products</span></a>
                        <ul>
                            <li><a href="{{ route('products.create') }}">Add Products</a></li>
                            <li><a href="{{ route('product.manage') }}">Manage Products</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Category</span></a>
                        <ul>
                            <li><a href="{{ route('category.create') }}">Add Category</a></li>
                            <li><a href="{{ route('category.manage') }}">Manage Category</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Variants</span></a>
                        <ul>
                            <li><a href="{{ route('variants.create') }}">Add Variants</a></li>
                            <li><a href="{{ route('variants.manage') }}">Manage Variants</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
