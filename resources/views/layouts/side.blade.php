<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Admin Menu</span>
							</li>
							<li class="active"> 
								<a href="{{url('home')}}" class="noti-dot "><i class="la la-home"></i> <span>Dashboard</span></a>
							</li>
					
						
							@role('Admin')
							 <li class="submenu">
								<a href="#" ><i class="fa  fa-list-ul"></i> <span>Food Banks </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('new-foodbank')}}">Register New</a></li>
								  

								</ul>
							</li>
							@endrole

							 <li class="submenu">
							<a href="#" ><i class="fa  fa-list-ul"></i> <span>Donations Module </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('new-donations')}}">New Donations</a></li>
								</ul>
							</li>

							

							
							<li class="submenu">
								<a href="#" ><i class="fa fa-files-o"></i> <span> Reports Portal </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('new-report-donors')}}">Donations Report</a></li>

									<!-- <li><a href="{{url('admin/task')}}">View Documents</a></li>		

									<li><a href="{{url('admin/leave')}}">Leave Management</a></li>	 -->					
								
								</ul>
							</li>

@role('Admin')
								<li class="submenu">
								<a href="#" ><i class="fa fa-cogs"></i> <span>General Settings</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
	<!-- 		  
			  <li><a href="{{url('dropdown-settings')}}" class="nav-sub-link">Dropdown Settings</a></li>

              <li><a href="{{url('create-order-party')}}" class="nav-sub-link">Ordering Party Settings</a></li>

              <li><a href="{{url('create-client')}}" class="nav-sub-link">Client Management</a></li> -->

                <li><a href="{{url('dropdown-settings')}}" class="nav-sub-link">Dropdown Settings</a></li>

              <li><a href="{{url('create_user')}}" class="nav-sub-link">User Management</a></li>

              <li><a href="{{url('admin')}}" class="nav-sub-link">Role Management</a></li>
								
								
							
								
								</ul>
							</li>
							@endrole


			

							

							
						
						</ul>
					</div>
                </div>
            </div>