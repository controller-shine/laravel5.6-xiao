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
					<li class="nav-item  active submenu">
						<a data-toggle="collapse" href="#tables">
							<i class="fas fa-table"></i>
							<p>新闻管理</p>
							<span class="caret"></span>
						</a>
						<div class="collapse show" id="tables">
							<ul class="nav nav-collapse">
								<li>
									<a href="{{url('/admin/news')}}">
										<span class="sub-item">新闻管理</span>
									</a>
								</li>
								<li class="active">
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
				<h4 class="page-title">添加新闻</h4>
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
						<a href="#">新闻管理</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">添加新闻</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div class="col-md-10">
									<h4 class="card-title">添加新闻</h4>
								</div>
								<div class="col-md-2 text-right">
									<a href="{{url('/admin/news')}}">
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal">
											返回列表
										</button>
									</a>
								</div>
							</div>
						</div>
						<form class="form-horizontal m-t" action="{{url('/admin/news')}}" method="post" id="commentForm" enctype="multipart/form-data">
							<div class="form-group">
								<label for="exampleFormControlSelect1">新闻分类</label>
								<select class="form-control" name="cate_id" id="exampleFormControlSelect1">
									@foreach($cates as $k=>$v)
									<option value="{{$v->id}}">{{$v->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="email2">新闻标题</label>
								<input type="title" name="title" class="form-control" id="email2" placeholder="请输入产品标题~">
							</div>
							<div class="form-group">
								<label for="email2">新闻简介</label>
								<input type="title" name="introduction" class="form-control" id="email2" placeholder="请输入产品简介~">
							</div>
							<div class="form-group">
								<label for="email2">发布者</label>
								<input type="author" name="author" class="form-control" id="email2" placeholder="请输入发布者的姓名~">
							</div>
							<div class="form-group">
								<label for="comment">新闻内容</label>
								<textarea name="comment" style="height: 500px;" id="editor" rows="8"></textarea>
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
<script type="text/javascript" charset="utf-8" src="../../plugins/ueditor/ueditor.config.js"></script>
			<script type="text/javascript" charset="utf-8" src="../../plugins/ueditor/ueditor.all.min.js"> </script>
			<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
			<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
			<script type="text/javascript" charset="utf-8" src="../../plugins/ueditor/lang/zh-cn/zh-cn.js"></script>
			<script type="text/javascript">
				var ue = UE.getEditor('editor', {
					toolbars: [
						[
			
							'source', //源代码
							'undo', //撤销
							'redo', //重做
							'fontfamily', //字体
							'fontsize', //字号
							'forecolor', //字体颜色
							'backcolor', //背景色
							'insertorderedlist', //有序列表
							'insertunorderedlist', //无序列表
							'paragraph', //段落格式
							'indent', //首行缩进
							'justifyleft', //居左对齐
							'justifycenter', //居中对齐
							'justifyright', //居右对齐
							'justifyjustify', //两端对齐
							'bold', //加粗
							'italic', //斜体
							'underline', //下划线
							'horizontal', //分隔线
							'simpleupload', //单图上传
							'insertimage', //多图上传
							'time', //时间
							'date', //日期
							'emotion', //表情
							'spechars', //特殊字符
							'searchreplace', //查询替换
							'insertvideo', //视频
							'fullscreen', //全屏
						]
					]
				});
			</script>
<!--调色板-->
@include("admin.common.colorx")
