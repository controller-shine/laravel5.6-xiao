<!--头部公众-->
@include("admin.common.common")	

<!-- 侧边栏 -->
	<div class="sidebar" >
	
		<div class="sidebar-background"></div>
		<div class="sidebar-wrapper scrollbar-inner">
			<div class="sidebar-content">
				<ul class="nav">
					<li class="nav-item">
						<a href="{{url('/admin/index')}}">
							<i class="fas fa-home"></i>
							<p>首页</p>
							<span class="badge badge-count">5</span>
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
					<li class="nav-item active submenu">
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
									<a href="{{url('/admin/ads')}}">
										<span class="sub-item">广告管理</span>
									</a>
								</li>
								
								<li>
									<a href="{{url('/admin/ads/create')}}">
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
							<span class="badge badge-count badge-success">4</span>
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

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">团购管理</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">团购管理</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<div class="col-md-10">
										<h4 class="card-title">团购列表</h4>
										</div>
										<div class="col-md-2 text-right">
										<a href="{{url('/admin/group/create')}}">
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal">
											<i class="fa fa-plus"></i>							
											添加
										</button>
										</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th scope="col">序号</th>
													<th scope="col">用户名</th>
													<th scope="col">联系方式</th>
													<th scope="col">是否支付</th>
												</tr>
											</thead>
											<tbody>
												@foreach($groups as $k=>$v)
												<tr>
													<td>{{$info->id}}</td>
													<td>{{$info->username}}</td>
													<td>{{$info->usertel}}</td>
													<td>
														@if($info->status)
															<label class="form-radio-label">
																<input class="form-radio-input" type="radio">
																<span class="form-radio-sign">未支付</span>
															</label>
														@else
															<label class="form-radio-label ml-3">
																<input class="form-radio-input" type="radio">
																<span class="form-radio-sign">已支付</span>
															</label>
														</div>
														@endif
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--调色板-->
		@include("admin.common.color")
