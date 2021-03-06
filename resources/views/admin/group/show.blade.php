<!--头部公众-->
@include("admin.common.commonx")
<script src="../../layui/layui.js"></script>
<link rel="stylesheet" href="../../layui/css/layui.css">
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
				<h4 class="page-title">查看团购</h4>
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
					<li class="nav-item">
						<a href="#">查看团购</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="col-md-10">
									<h4 class="card-title">查看团购商品</h4>
								</div>
								<div class="col-md-2 text-right">
									<a href="{{url('/admin/group')}}">
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal">
											返回列表
										</button>
									</a>
								</div>
							</div>
						</div>
						<form class="form-horizontal m-t" action="{{url('/admin/group/'.$info->id)}}}" method="post" id="commentForm"
						 enctype="multipart/form-data">
							<div class="form-group">
								<label for="exampleFormControlSelect1">选择团购商品</label>
								<select class="form-control" name="product_id" id="exampleFormControlSelect1">
									@foreach($products as $k=>$v)
									<option value="{{$v->id}}" @if($v->id == $info->product_id) selected @endif>{{$v->title}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-check">
								<div class="input-group col-md-12">
									<div class="input-group col-md-4">
										<div class="input-group-prepend">
											<span class="input-group-text">团购价格 ￥</span>
										</div>
										<input type="text" value="{{$info->price}}" name="price" readonly="readonly" class="form-control" aria-label="Amount (to the nearest dollar)">
										<div class="input-group-append">
											<span class="input-group-text">.00</span>
										</div>
									</div>
									<div class="input-group col-md-4">
										<div class="input-group-prepend">
											<span class="input-group-text">团购人数</span>
										</div>
										<input type="text" value="{{$info->groupnumber}}" name="groupnumber" readonly="readonly" class="form-control">
										<div class="input-group-append">
										</div>
									</div>
									<div class="input-group col-md-4">
										<div class="input-group-prepend">
											<span class="input-group-text">截至时间</span>
										</div>
										<input type="text" value="{{$info->entdate}}" name="entdate" readonly="readonly" class="form-control" id="test1">
										<div class="input-group-append">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="col-md-10">
									<h4 class="card-title">查看团购用户</h4>
								</div>
								<div class="col-md-2 text-right">
									<a href="{{$info->id}}/edit">
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal">
											修改支付状态
										</button>
									</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">序号</th>
										<th scope="col">用户名</th>
										<th scope="col">联系方式</th>
										<th scope="col">是否支付</th>
									</tr>
								</thead>
								<tbody>
									@foreach($usergroups as $k=>$v)
									<tr>
										<td>{{$v->id}}</td>
										<td>{{$v->username}}</td>
										<td>{{$v->usertel}}</td>
										<td>
										@if($v->status)
											<span class="btn btn-success">已支付</span>
										@else
											<span class="btn btn-warning">未支付</span>
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

<!--调色板-->
@include("admin.common.colorx")
