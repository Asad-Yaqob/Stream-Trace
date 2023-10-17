<!DOCTYPE html>
<html lang="en">

<head>
	<title>Flat Able - Premium Admin Template by Phoenixcoded</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>



</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div ">

				<div class="">
					<div class="main-menu-header">
						<div class="user-details">
							<span>
								<?php echo $_SESSION['username'] ?>
							</span>
							<div id="more-details">
								 <i class="fa fa-chevron-down m-l-5"></i>
							</div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="user-profile.php"><i
										class="feather icon-user m-r-5"></i>View Profile</a></li>
							<li class="list-group-item"><a href="setting.php"><i
										class="feather icon-settings m-r-5"></i>Settings</a></li>
							<li class="list-group-item"><a href="logout.php"><i
										class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>

				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li>
					<li class="nav-item">
						<a href="index.php" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>


					<li class="nav-item pcoded-menu-caption">
						<label>User</label>
					</li>
					<li class="nav-item">
						<a href="total.php" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-user"></i></span><span class="pcoded-mtext">Total
								User</span></a>
					</li>
					<li class="nav-item">
						<a href="package.php" class="nav-link "><span class="pcoded-micon"><i
						class="feather icon-user-check"></i></span><span class="pcoded-mtext">Packages</span></a>
							</li>
					<li class="nav-item">
						<a href="active_subscription.php" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-user-check"></i></span><span class="pcoded-mtext">Active Subscriptions</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Media</label>
					</li>
					<li class="nav-item">
						<a href="services.php" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-music"></i></span><span class="pcoded-mtext">Service Providers</span></a>
					</li>
					<li class="nav-item">
						<a href="movies_shows.php" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-video"></i></span><span class="pcoded-mtext">Movies/Shows</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Pages</label>
					</li>
					<li class="nav-item">
						<a href="feedback.php" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-message-circle"></i></span><span
								class="pcoded-mtext">Feedback</span></a> 
					
					</li> 
					<li class="nav-item"><a href="setting.php" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-settings"></i></span><span
								class="pcoded-mtext">Setting</span></a></li>

				</ul>

			

			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">


		<div class="m-header">
			<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			<a href="#!" class="b-brand">
				<!-- ========   change your logo hear   ============ -->
				<strong><h2 style="color:white;font-size:20px;">Stream<span style="color:#1abc9c;">Trace</span></h2></strong>
			</a>
			<a href="#!" class="mob-toggler">
				<i class="feather icon-more-vertical"></i>
			</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
					<div class="search-bar">
						<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
						<button type="button" class="close" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</li>

			</ul>
			<ul class="navbar-nav ml-auto">
				<li>
					<div class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">
							<i class="icon feather icon-bell"></i>
							<span class="badge badge-pill badge-danger">5</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right notification">
							<div class="noti-head">
								<h6 class="d-inline-block m-b-0">Notifications</h6>
								<div class="float-right">
									<a href="#!" class="m-r-10">mark as read</a>
									<a href="#!">clear all</a>
								</div>
							</div>
							<ul class="noti-body">
								<li class="n-title">
									<p class="m-b-0">NEW</p>
								</li>
								<li class="notification">
									<div class="media">
										<img class="img-radius" src="" alt="Generic placeholder image">
										<div class="media-body">
											<p><strong>
													<?php echo $_SESSION['username'] ?>
												</strong><span class="n-time text-muted"><i
														class="icon feather icon-clock m-r-10"></i>5 min</span></p>
											<p>New ticket Added</p>
										</div>
									</div>
								</li>
								<li class="n-title">
									<p class="m-b-0">EARLIER</p>
								</li>
								<li class="notification">
									<div class="media">
										<img class="img-radius" src="assets/images/user/avatar-2.jpg"
											alt="Generic placeholder image">
										<div class="media-body">
											<p><strong>Joseph William</strong><span class="n-time text-muted"><i
														class="icon feather icon-clock m-r-10"></i>10 min</span></p>
											<p>Prchace New Theme and make payment</p>
										</div>
									</div>
								</li>
								<li class="notification">
									<div class="media">
										<img class="img-radius" src="assets/images/user/avatar-1.jpg"
											alt="Generic placeholder image">
										<div class="media-body">
											<p><strong>Sara Soudein</strong><span class="n-time text-muted"><i
														class="icon feather icon-clock m-r-10"></i>12 min</span></p>
											<p>currently login</p>
										</div>
									</div>
								</li>
								<li class="notification">
									<div class="media">
										<img class="img-radius" src="assets/images/user/avatar-2.jpg"
											alt="Generic placeholder image">
										<div class="media-body">
											<p><strong>Joseph William</strong><span class="n-time text-muted"><i
														class="icon feather icon-clock m-r-10"></i>30 min</span></p>
											<p>Prchace New Theme and make payment</p>
										</div>
									</div>
								</li>
							</ul>
							<div class="noti-footer">
								<a href="#!">show all</a>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="dropdown drp-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="feather icon-user"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-notification">
							<div class="pro-head">
								<span>
									<?php echo $_SESSION['username'] ?>
								</span>
								<a href="logout.php" class="dud-logout" title="Logout">
									<i class="feather icon-log-out"></i>
								</a>
							</div>
							<ul class="pro-body">
								<li><a href="setting.php" class="dropdown-item"><i class="feather icon-user"></i>
										Profile</a></li>
								<li><a href="logout.php" class="dropdown-item"><i class="feather icon-lock"></i>
										Logout</a></li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>


	</header>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
		crossorigin="anonymous"></script>