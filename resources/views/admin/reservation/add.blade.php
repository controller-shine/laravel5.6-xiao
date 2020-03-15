<!--头部公众-->
@include("admin.common.commonx")
<link rel="stylesheet" type="text/css" href="../../jindu/css/less/style.css" />
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
				<li class="nav-item active submenu">
					<a data-toggle="collapse" href="#forms">
						<i class="fas fa-pen-square"></i>
						<p>订单管理</p>
						<span class="caret"></span>
					</a>
					<div class="collapse show" id="forms">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{url('/admin/confirm')}}">
									<span class="sub-item">商城订单管理</span>
								</a>
							</li>
							<li class="active">
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
				<h4 class="page-title">服务订单详情</h4>
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
						<a href="#">服务订单管理</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">服务订单详情</a>
					</li>
				</ul>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header col-md-12">
							<div class="d-flex align-items-center">
								<div class="col-md-10">
									<h4 class="card-title">服务订单详情</h4>
								</div>
								<div class="col-md-2 text-right">
									<a href="{{url('/admin/reservation')}}">
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal">
											返回列表
										</button>
									</a>
								</div>
							</div>
							<!--进度条-->
							<ul class="nav nav-justified step step-arrow" data-step="{{$info->schedule}}">
								<li>
									<a>提交预约</a>
								</li>
								<li>
									<a>服务确认、正在安排</a>
								</li>
								<li>
									<a>确认服务时间和人员</a>
								</li>
								<li>
									<a>服务完成、确认服务、评价</a>
								</li>
							</ul>	
						</div>
						<form class="form-horizontal m-t" action="{{$info->id}}/edit"  id="commentForm" enctype="multipart/form-data">
							<div class="form-group">
								<div class="card-body">
									<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
										<li class="nav-item submenu">
											<a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
											 aria-controls="pills-home" aria-selected="false">订单信息</a>
										</li>
										<li class="nav-item submenu">
											<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
											 aria-selected="false">服务信息</a>
										</li>
										<li class="nav-item submenu">
											<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
											 aria-selected="true">评价信息</a>
										</li>
									</ul>
									<div class="tab-content mt-2 mb-3" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
											<div class="card-body">
												<div class="form-group">
													
												</div>
												<div class="form-group form-inline">
												<div class="input-group col-md-4">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon3"> <h3>服务类型</h3></span>
														</div>
														<input type="text" class="form-control" value="{{$info->types}}" id="basic-url" aria-describedby="basic-addon3" readonly="readonly">
													</div>
													<div class="input-group col-md-4">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon3">
																<h3>联系人姓名</h3>
															</span>
														</div>
														<input type="text" class="form-control" value="{{$info->username}}" id="basic-url" aria-describedby="basic-addon3" readonly="readonly">
													</div>
													<div class="col-md-4">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon3">
																	<h3>联系人电话</h3>
																</span>
															</div>
															<input type="text" class="form-control" value="{{$info->usertel}}" id="basic-url" aria-describedby="basic-addon3" readonly="readonly">
														</div>
													</div>
												</div>
												<div class="form-group form-inline">
													<div class="col-md-4">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon3">
																	<h3>服务地址：</h3>
																</span>
															</div>
															<input type="text" class="form-control" value="{{$info->address}}" id="basic-url" aria-describedby="basic-addon3" readonly="readonly">
														</div>
													</div>
													<div class="input-group col-md-4">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon3">
																<h3>产品类型</h3>
															</span>
														</div>
														<input type="text" class="form-control"  value="{{$info->cate->name}}" id="basic-url" aria-describedby="basic-addon3" readonly="readonly">
													</div>
													<div class="col-md-4">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon3">
																	<h3>品牌及型号</h3>
																</span>
															</div>
															<input type="text" class="form-control" value="{{$info->brand}}" id="basic-url" aria-describedby="basic-addon3" readonly="readonly">
														</div>
													</div>
												</div>
												<div class="form-group form-inline">
													<div class="input-group col-md-6">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon3">
																<h3>购机日期</h3>
															</span>
														</div>
														<input type="text" class="form-control" value="{{$info->purchasedate}}" id="basic-url" aria-describedby="basic-addon3" readonly="readonly">
													</div>
													<div class="col-md-6">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon3">
																	<h3>预约时间</h3>
																</span>
															</div>
															<input type="text" class="form-control" value="{{$info->appointment}}"  id="basic-url" aria-describedby="basic-addon3" readonly="readonly">
														</div>
													</div>
												</div>
												<div class="col-md-12">
												<div class="form-group">
													<label for="comment"> <h3>故障说明</h3></label>
													<textarea class="form-control"  value="{{$info->faultdescription}}"  rows="5" readonly="readonly"></textarea>
												</div>
												</div>
											</div>
											
										</div>
										
										<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
											
											<div class="form-group form-inline">
												<div class="input-group col-md-4">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3">
															<h3>服务人员姓名</h3>
														</span>
													</div>
													<input type="text" class="form-control" value="{{$info->workername}}" aria-describedby="basic-addon3" readonly="readonly">
												</div>
												<div class="col-md-4">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon3">
																<h3>电话</h3>
															</span>
														</div>
														<input type="text" class="form-control" value="{{$info->workertel}}"  aria-describedby="basic-addon3" readonly="readonly">
													</div>
												</div>
												<div class="col-md-4">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon3">
																<h3>预约时间</h3>
															</span>
														</div>
														<input type="text" class="form-control" value="{{$info->appointment}}" id="test1" aria-describedby="basic-addon3" readonly="readonly">
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label">
														<h3>评分</h3>
													</label> 
														<div id="test1"></div>
												</div>
												<div class="form-group">
													<label for="comment">
														<h3>评论</h3>
													</label>
													<textarea class="form-control" value="{{$info->assess}}" rows="5" readonly="readonly"></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							<div class="card-action ">
								{{csrf_field()}}
								<div class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
									<button class="btn btn-primary col-md-offset-4" value="2" name="schedule" type="submit">确认服务</button>
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="../../layui/css/layui.css">
<script src="../../layui/layui.js"></script>
<script>
	layui.use('rate', function(){
	var rate = layui.rate;
	//渲染
	var ins1 = rate.render({
	elem: '#test1'  //绑定元素
	});
});
</script>

<script type="text/javascript" src="../../jindu/js/lib/lib.js"></script>
	<script>
		$(function() {
			bsStep();
			//bsStep(i) i 为number 可定位到第几步 如bsStep(2)/bsStep(3)
		})
	</script>	
<script>
