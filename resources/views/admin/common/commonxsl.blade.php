<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>喜锦机械管理系统</title>
		<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
		<link rel="stylesheet" type="text/css" href="layui/css/layui.css"/>
		<link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/azzara.min.css">
		<link rel="stylesheet" href="assets/css/demo.css">
		
		
		<script src="assets/js/plugin/webfont/webfont.min.js"></script>
		<script>
			WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	</head>
	<body>
			<div class="main-header" data-background-color="purple">
				<!-- Logo  -->
				<div class="logo-header">
					<a href="index.html" class="logo">
						喜锦机械管理后台
					</a>
					<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i class="fa fa-bars"></i>
						</span>
					</button>
					<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
					<div class="navbar-minimize">
						<button class="btn btn-minimize btn-rounded">
							<i class="fa fa-bars"></i>
						</button>
					</div>
				</div>
				<!-- End Logo -->

				<!-- 导航栏 -->
				<nav class="navbar navbar-header navbar-expand-lg">

					<div class="container-fluid">
						<div class="collapse" id="search-nav">
							<form class="navbar-left navbar-form nav-search mr-md-3">
								<div class="input-group">
									<div class="input-group-prepend">
										<button type="submit" class="btn btn-search pr-1">
											<i class="fa fa-search search-icon"></i>
										</button>
									</div>
									<input type="text" placeholder="搜索 ..." class="form-control">
								</div>
							</form>
						</div>
						<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
							<li class="nav-item toggle-nav-search hidden-caret">
								<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
									<i class="fa fa-search"></i>
								</a>
							</li>
							<li class="nav-item dropdown hidden-caret">
								<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown"
								 aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-envelope"></i>
								</a>
								<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
									<li>
										<div class="dropdown-title d-flex justify-content-between align-items-center">
											评价内容
											<a href="#" class="small">标记为已读</a>
										</div>
									</li>
									<li>
										<div class="message-notif-scroll scrollbar-outer">
											<div class="notif-center">
												<a href="#">
													<div class="notif-img">
														<img src="assets/img/jm_denis.jpg" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">张三</span>
														<span class="block">
															在吗
														</span>
														<span class="time">2020/02/14</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-img">
														<img src="assets/img/chadengle.jpg" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">李四</span>
														<span class="block">
															在吗
														</span>
														<span class="time">2020/02/14</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-img">
														<img src="assets/img/mlane.jpg" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">王五</span>
														<span class="block">
															在吗
														</span>
														<span class="time">2020/02/14</span>
													</div>
												</a>
												<a href="#">
													<div class="notif-img">
														<img src="assets/img/talha.jpg" alt="Img Profile">
													</div>
													<div class="notif-content">
														<span class="subject">刘六</span>
														<span class="block">
															在吗
														</span>
														<span class="time">2020/02/14</span>
													</div>
												</a>
											</div>
										</div>
									</li>
								</ul>
							</li>

							<?php $admin = \App\Admin::find(session('aid')); ?>
							<li class="nav-item dropdown hidden-caret">
								<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
									<div class="avatar-sm">
										<img src="{{$admin->img}}"class="avatar-img rounded-circle">
									</div>
								</a>
								<ul class="dropdown-menu dropdown-user animated fadeIn">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="{{$admin->img}}" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{$admin->name}}</h4>
												<p class="text-muted">{{$admin->email}}</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">查看资料</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">修改信息</a>
										<a class="dropdown-item" href="#">修改密码</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{url('/admin/logout')}}">退出</a>
									</li>
								</ul>
							</li>

						</ul>
					</div>
				</nav>
				<!-- 导航栏结束 -->
			</div>

			<!--   核心js   -->
			<script src="assets/js/core/jquery.3.2.1.min.js"></script>
			<script src="assets/js/core/popper.min.js"></script>
			<script src="assets/js/core/bootstrap.min.js"></script>
			
			<!-- jQuery UI -->
			<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
			<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
			
			<!-- jQuery Scrollbar -->
			<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
			
			<!-- Azzara JS -->
			<script src="assets/js/ready.min.js"></script>
			
			<!-- Bootstrap Toggle -->
			<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
				
			<!-- Azzara DEMO methods, don't include it in your project! -->
			<script src="assets/js/setting-demo.js"></script>

			
	</body>
</html>
