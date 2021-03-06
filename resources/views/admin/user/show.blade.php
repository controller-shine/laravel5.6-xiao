<!--头部公众-->
@include("admin.common.commonx")

<!-- 侧边栏 -->
<div class="sidebar">

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
								<a href="{{url('/admin/admin')}}">
									<span class="sub-item">广告管理</span>
								</a>
							</li>

							<li>
								<a href="{{url('/admin/admin/create')}}">
									<span class="sub-item">添加广告</span>
								</a>
							</li>

						</ul>
					</div>
				</li>
				<li class="nav-item active submenu">
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
				<h4 class="page-title">查看用户信息</h4>
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
						<a href="#">用户管理</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">查看用户信息</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="col-md-10">
									<h4 class="card-title">查看用户信息</h4>
								</div>
								<div class="col-md-2 text-right">
									<a href="{{url('/admin/user')}}">
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal">
											返回列表
										</button>
									</a>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="card card-profile card-secondary">
									<div class="card-header" style="background-image: url('../../assets/img/blogpost.jpg')">
										<div class="profile-picture">
											<div class="avatar avatar-xl">
												<img src="../../{{$info->img}}" alt="..." class="avatar-img rounded-circle">
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="user-profile text-center">
											<div class="name">{{$info->actualname}}</div>
											<div class="job">{{$info->tel}}</div>
											<div class="desc">{{$info->addr}}{{$info->address}}</div>
											<div class="view-profile">
												<a href="{{url('/admin/user/create')}}" class="btn btn-secondary btn-block">购买记录</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="card card-with-nav">
									<div class="card-body">
										<div class="row mt-3">
											<div class="col-md-4">
												<div class="form-group form-group-default">
													<label>用户昵称</label>
													<input type="text" class="form-control" value="{{$info->username}}" readonly="readonly">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group form-group-default">
													<label>微信ID</label>
													<input type="email" class="form-control"value="{{$info->wxid}}" readonly="readonly">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group form-group-default">
													<label>电话号码</label>
													<input type="email" class="form-control"value="{{$info->tel}}" readonly="readonly">
												</div>
											</div>
										</div>
										<div class="row mt-3">
											<div class="col-md-4">
												<div class="form-group form-group-default">
													<label>真实姓名</label>
													<input type="text" class="form-control" value="{{$info->actualname}}" readonly="readonly">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group form-group-default">
													<label>性别</label>
													<select class="form-control" id="gender">
														<option>男</option>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group form-group-default">
													<label>EMAIL</label>
													<input type="text" class="form-control" value="{{$info->email}}" readonly="readonly">
												</div>
											</div>
										</div>
										<div class="row mt-3">
											<div class="col-md-12">
												<div class="form-group form-group-default">
													<label>地址</label>
													<input type="text" class="form-control" value="{{$info->addr}}{{$info->address}}" readonly="readonly">
												</div>
											</div>
										</div>
										<div class="row mt-3 mb-1">
											<div class="col-md-12">
												<div class="form-group form-group-default">
													<label>个人简介</label>
													<textarea class="form-control" readonly="readonly">{!!$info->introduction!!}</textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--调色板-->
@include("admin.common.colorx")
