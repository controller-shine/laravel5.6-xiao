<!--头部公众-->
@include("admin.common.commonx")

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
					<li class="nav-item active submenu">
						<a data-toggle="collapse" href="#maps">
							<i class="fas fa-map-marker-alt"></i>
							<p>广告管理</p>
							<span class="caret"></span>
						</a>
						<div class="collapse show" id="maps">
							<ul class="nav nav-collapse">
								<li>
									<a href="{{url('/admin/ads')}}">
										<span class="sub-item">广告管理</span>
									</a>
								</li>
								
								<li class="active">
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
				<h4 class="page-title">添加广告</h4>
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
						<a href="#">广告管理</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">添加广告</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="col-md-10">
									<h4 class="card-title">添加广告</h4>
								</div>
								<div class="col-md-2 text-right">
									<a href="{{url('/admin/ads')}}">
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal">
											返回列表
										</button>
									</a>
								</div>
							</div>
						</div>
						<form class="form-horizontal m-t" action="{{url('/admin/ads')}}" method="post" id="commentForm" enctype="multipart/form-data">
							<div class="form-group">
								<label for="exampleFormControlSelect1">广告位置</label>
								<select class="form-control" name="cate_id" id="exampleFormControlSelect1">
									@foreach($cates as $k=>$v)
									<option value="{{$v->id}}">{{$v->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="email2">广告名称</label>
								<input type="title" name="name" class="form-control" id="email2" placeholder="请输入广告标题~">
							</div>
							<div class="form-group">
								<label for="exampleFormControlFile1">商品图片</label>
								<input type="file" name="img" class="form-control-file" id="exampleFormControlFile1" multiple="multiple">
							</div>
							<div class="form-group">
								<label for="email2">广告链接</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon3">https://</span>
									</div>
									<input type="text" name="link" class="form-control" id="basic-url" placeholder="请输入广告链接~">
								</div>
							</div>
							
							<div class="form-group">
								<label for="email2">发布者</label>
								<input type="author" name="author" class="form-control" id="email2" placeholder="请输入发布者的姓名~">
							</div>
							<div class="card-action">
								{{csrf_field()}}
								<button class="btn btn-success">提交</button>
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
