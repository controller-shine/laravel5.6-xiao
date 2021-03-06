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
					<li class="nav-item active submenu">
						<a data-toggle="collapse" href="#forms">
							<i class="fas fa-pen-square"></i>
							<p>订单管理</p>
							<span class="caret"></span>
						</a>
						<div class="collapse show" id="forms">
							<ul class="nav nav-collapse">
								<li class="active">
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
						<h4 class="page-title">已确认订单</h4>
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
								<a href="#">已确认订单管理</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">已确认订单管理</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<div class="col-md-10">
										<h4 class="card-title">已确认订单列表</h4>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive col-md-12">
										<table id="basic-datatables" style="width: 1150px;" class="display table table-striped table-hover" >
											<thead class="text-center">
												<tr>
													<th>订单信息</th>
													<th>买家信息</th>
													<th>购买价格/数量</th>
													<th>交易时间</th>
													<th>交易状态</th>
													<th>操作</th>
												</tr>
											</thead>
											<tbody class="text-center">
												
												@foreach($mallorders as $k=>$v)
												
												<tr>
													<td>
														订单号：{{$v->id}} </br>
														创建时间：{{$v->created_at}}</br>
													</td>
													<td>
														用户名：</br>
														联系方式：</br>
													</td>
													<td>
														购买价格：￥{{$v->price}}</br>
														购买数量：{{$v->num}} </br>
													</td>
													<td>{{$v->created_at}}</td>
													<td></td>
													<td>
														<div class="form-button-action">
															<a href="confirm/{{$v->id}}">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
															 data-original-title="查看">
																<i class="fas fa-eye"></i>
															</button>
															</a>
															<a href="confirm/{{$v->id}}/edit">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg"
															 data-original-title="修改">
																<i class="fa fa-edit"></i>
															</button>
															</a>
															<form action="confirm/{{$v->id}}" method="POST" aria-label="Register">
																<input type="hidden" name="_method" value="DELETE">
																
																{{csrf_field()}}
																<button type="submit" data-toggle="tooltip" title=""  class="btn btn-link btn-danger" data-original-title="删除">
																<i class="fa fa-times"></i>
															</button>
															</form>                                      
														</div>
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
