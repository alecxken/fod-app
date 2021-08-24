<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Admin Menu</span>
							</li>
							<li class="active"> 
								<a href="{{url('admin/home')}}" class="noti-dot "><i class="la la-home"></i> <span>Dashboard</span></a>
							</li>
					
						  <li class="submenu">
								<a href="#" ><i class="fa  fa-list-ul"></i> <span> Beneficiary  Module</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('beneficiary')}}">Register  Beneficiary</a></li>
								</ul>
							</li>

							 <li class="submenu">
								<a href="#" ><i class="fa  fa-list-ul"></i> <span>Food Banks </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('ngo-index')}}">Register New</a></li>
								    <li>
									  <a href="{{url('view-jobs')}}">Programs</a>
									</li>
									<li>
										<a href="{{url('view-jobs')}}">Eumerators</a>
									</li>

								</ul>
							</li>

								 <li class="submenu">
								<a href="#" ><i class="fa  fa-list-ul"></i> <span>Reports Module</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">							

									<li><a href="{{url('agentqueue/New')}}">Pending Orders</a></li>								
								

									<li><a href="{{url('agentqueue/Closed')}}">Closed Orders</a></li>		
								
								</ul>
							</li>
							

							
							<li class="submenu">
								<a href="#" ><i class="fa fa-files-o"></i> <span> Reports Portal </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('admin/emp-user-view')}}">View All Applicants</a></li>

									<li><a href="{{url('admin/task')}}">View Documents</a></li>		

									<li><a href="{{url('admin/leave')}}">Leave Management</a></li>						
								
								</ul>
							</li>

								<li class="submenu">
								<a href="#" ><i class="fa fa-cogs"></i> <span>General Settings</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
			  
			  <li><a href="{{url('dropdown-settings')}}" class="nav-sub-link">Dropdown Settings</a></li>

              <li><a href="{{url('create-order-party')}}" class="nav-sub-link">Ordering Party Settings</a></li>

              <li><a href="{{url('create-client')}}" class="nav-sub-link">Client Management</a></li>

              <li><a href="{{url('create_user')}}" class="nav-sub-link">User Management</a></li>

              <li><a href="{{url('admin')}}" class="nav-sub-link">Role Management</a></li>
								
								
							
								
								</ul>
							</li>


			

							

							
						
						</ul>
					</div>
                </div>
            </div>