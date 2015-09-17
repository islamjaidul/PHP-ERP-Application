<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                       
                        
                       
                        
                       
                          
							<li><a href="{{ URL::route('get_student') }}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
							<li><a href="{{ URL::route('get_country') }}"><i class="fa fa-home"></i> Country</a></li>
                                <li>
                                    <a href="{{ URL::route('get_institute') }}"><i class="fa fa-sitemap"></i> Institution Category</a>
									
                                </li>
                               
							   <li>
                                    <a href="{{ URL::route('get_sub_institute') }}"><i class="fa fa-university"></i> Institution</a>
									
                                </li>
								
								
                                
                            
                     <li><a href="{{ URL::route('get_studentinfo') }}"><i class="fa fa-user"></i> Student Information</a></li>
					 
					  <li><a href="{{ URL::route('get_coverletter') }}"><i class="fa fa-file-text-o"></i> Cover Letter</a></li>
					 
					 <li><a href="{{ URL::route('get_report_student') }}"><i class="fa fa-pie-chart"></i></i> Report</a></li>
                           
					 
					 
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>