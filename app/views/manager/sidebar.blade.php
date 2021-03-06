	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu " data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="@if(strtolower($title) == 'dashboard') active open @endif">
					<a href="{{URL::route('admin/home')}}">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
				</li>
				<li class="@if(strtolower($title) == 'clients') active open @endif">
					<a href="javascript:;">
					<i class="icon-rocket"></i>
					<span class="title">Clients</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="@if(strtolower($sub_title) == 'all clients') active @endif">
							<a href="{{URL::route('admin/clients')}}">
							<i class="fa fa-caret-right"></i>
							All Clients</a>
						</li>	
						<li class="@if(strtolower($sub_title) == 'add client' 
						|| strtolower($sub_title) == 'edit client') active @endif">
							<a href="{{URL::route('admin/client_new')}}">
							<i class="fa fa-caret-right"></i>
							Add & Edit Client</a>
						</li>
						<li class="@if(strtolower($sub_title) == 'all clientcontacts') active @endif">
							<a href="{{URL::route('admin/clientcontacts')}}">
							<i class="fa fa-caret-right"></i>
							All Contacts</a>
						</li>
						<li class="@if(strtolower($sub_title) == 'add clientcontact' 
						|| strtolower($sub_title) == 'edit clientContact') active @endif">
							<a href="{{URL::route('admin/clientcontact_new')}}">
							<i class="fa fa-caret-right"></i>
							Add & Edit Contact</a>
						</li>																
					</ul>
				</li>					
				<li class="@if(strtolower($title) == 'atm') active open @endif">
					<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span class="title">ATM</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="@if(strtolower($sub_title) == 'all atm') active @endif">
							<a href="{{URL::route('manager/atm')}}">
							<i class="fa fa-caret-right"></i>
							All ATM</a>
						</li>
						<li class="@if(strtolower($sub_title) == 'add atm' 
						|| strtolower($sub_title) == 'edit atm') active @endif">
							<a href="{{URL::route('manager/atm_new')}}">
							<i class="fa fa-caret-right"></i>
							Add & Edit ATM</a>
						</li>						
					</ul>
				</li>	
				<li class="@if(strtolower($title) == 'contracts') active open @endif">
					<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span class="title">Contracts</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="@if(strtolower($sub_title) == 'all contracts') active @endif">
							<a href="{{URL::route('manager/contracts')}}">
							<i class="fa fa-caret-right"></i>
							All Contracts</a>
						</li>
						<li class="@if(strtolower($sub_title) == 'add contract' 
						|| strtolower($sub_title) == 'edit contract') active @endif">
							<a href="{{URL::route('manager/contract_new')}}">
							<i class="fa fa-caret-right"></i>
							Add & Edit Contract</a>
						</li>						
					</ul>
				</li>
				<li class="@if(strtolower($title) == 'transaction') active open @endif">
					<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span class="title">Bank Transaction</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="@if(strtolower($sub_title) == 'all withdraws') active @endif">
							<a href="{{URL::route('manager/withdraws')}}">
							<i class="fa fa-caret-right"></i>
							All Withdraws</a>
						</li>
						<li class="@if(strtolower($sub_title) == 'add withdraw' 
						|| strtolower($sub_title) == 'edit withdraw') active @endif">
							<a href="{{URL::route('manager/withdraw_new')}}">
							<i class="fa fa-caret-right"></i>
							Add & Edit Withdraw</a>
						</li>
						<li class="@if(strtolower($sub_title) == 'all deposits') active @endif">
							<a href="{{URL::route('manager/deposits')}}">
							<i class="fa fa-caret-right"></i>
							All Deposits</a>
						</li>
						<li class="@if(strtolower($sub_title) == 'add deposit' 
						|| strtolower($sub_title) == 'edit deposit') active @endif">
							<a href="{{URL::route('manager/deposit_new')}}">
							<i class="fa fa-caret-right"></i>
							Add & Edit Deposit</a>
						</li>							
					</ul>
				</li>											
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>