<!--头部公众--> 
  @include("admin.common.common")
  
			<!-- 侧边栏 -->
				<div class="sidebar" >
				
					<div class="sidebar-background"></div>
					<div class="sidebar-wrapper scrollbar-inner">
						<div class="sidebar-content">
							<ul class="nav">
								<li class="nav-item  active submenu">
									<a href="{{url('/admin/index')}}">
										<i class="fas fa-home"></i>
										<p>首页</p>
									</a>
								</li>
								<li class="nav-item">
									<a data-toggle="collapse" href="#base">
										<i class="fas fa-layer-group"></i>
										<p>商品管理</p>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="base">
										<ul class="nav nav-collapse">
											<li>
												<a href="{{url('/admin/cates')}}">
													<span class="sub-item" style="text-align: center;">分类管理</span>
												</a>
											</li>
											<li>
												<a href="{{url('/admin/cates/create')}}">
													<span class="sub-item">添加分类</span>
												</a>
											</li>
											<li>
												<a href="{{url('/admin/product')}}">
													<span class="sub-item">商品管理</span>
												</a>
											</li>
											<li>
												<a href="{{url('/admin/product/create')}}">
													<span class="sub-item">添加商品</span>
												</a>
											</li>									
										</ul>
									</div>
								</li>
								<li class="nav-item">
									<a data-toggle="collapse" href="#forms">
										<i class="fas fa-pen-square"></i>
										<p>订单管理</p>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="forms">
										<ul class="nav nav-collapse">
											<li>
												<a href="{{url('/admin/confirm')}}">
													<span class="sub-item">商城订单管理</span>
												</a>
											</li>
											<li>
												<a href="{{url('/admin/reservation')}}">
													<span class="sub-item">服务订单管理</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="nav-item">
									<a href="{{url('/admin/group')}}">
										<i class="fas fa-cart-arrow-down"></i>
										<p>团购管理</p>
										<span class="badge badge-count"></span>
									</a>
								</li>
								<li class="nav-item">
									<a data-toggle="collapse" href="#tables">
										<i class="fas fa-table"></i>
										<p>新闻管理</p>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="tables">
										<ul class="nav nav-collapse">
											<li>
												<a href="{{url('/admin/news')}}">
													<span class="sub-item">新闻管理</span>
												</a>
											</li>
											<li>
												<a href="{{url('/admin/news/create')}}">
													<span class="sub-item">添加新闻</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="nav-item">
									<a data-toggle="collapse" href="#maps">
										<i class="fas fa-map-marker-alt"></i>
										<p>广告管理</p>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="maps">
										<ul class="nav nav-collapse">
											<li>
												<a href="tables/datatables.html">
													<span class="sub-item">广告管理</span>
												</a>
											</li>
											
											<li>
												<a href="tables/datatables.html">
													<span class="sub-item">添加广告</span>
												</a>
											</li>
											
										</ul>
									</div>
								</li>
								<li class="nav-item">
									<a href="{{url('/admin/user')}}">
										<i class="fas fa-desktop"></i>
										<p>用户管理</p>
									</a>
								</li>
								
								<li class="nav-item">
									<a data-toggle="collapse" href="#charts">
										<i class="far fa-chart-bar"></i>
										<p>管理员管理</p>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="charts">
										<ul class="nav nav-collapse">
											<li>
												<a href="{{url('/admin/admin')}}">
													<span class="sub-item">管理员管理</span>
												</a>
											</li>
											<li>
												<a href="{{url('/admin/admin/create')}}">
													<span class="sub-item">添加管理员</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
			<!-- 侧边栏结束 -->	
  
			<!--主体-->
			<div class="main-panel">
				<div class="content">
					<div class="page-inner">
						<div class="page-header">
							<h4 class="page-title">数据统计</h4>
							<div class="btn-group btn-group-page-header ml-auto">
								<button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown"
								 aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-ellipsis-h"></i>
								</button>
								<div class="dropdown-menu">
									<div class="arrow"></div>
									<a class="dropdown-item" href="#">用户总数</a>
									<a class="dropdown-item" href="#">产品总数</a>
									<a class="dropdown-item" href="#">销售总数</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">日活跃量</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row align-items-center">
											<div class="col-icon">
												<div class="icon-big text-center icon-primary bubble-shadow-small">
													<i class="fas fa-users"></i>
												</div>
											</div>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
													<p class="card-category">用户总数</p>
													<h4 class="card-title">1,294</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-icon">
												<div class="icon-big text-center icon-info bubble-shadow-small">
													<i class="far fa-newspaper"></i>
												</div>
											</div>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
													<p class="card-category">产品总数</p>
													<h4 class="card-title">1303</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-icon">
												<div class="icon-big text-center icon-success bubble-shadow-small">
													<i class="far fa-chart-bar"></i>
												</div>
											</div>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
													<p class="card-category">销售总数</p>
													<h4 class="card-title">345</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-icon">
												<div class="icon-big text-center icon-secondary bubble-shadow-small">
													<i class="far fa-check-circle"></i>
												</div>
											</div>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
													<p class="card-category">日活跃量</p>
													<h4 class="card-title">576</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>