<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PesewaOne</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script src="ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="7178644ff620d1b3e9b59e5f-text/javascript"></script>
	<script type="7178644ff620d1b3e9b59e5f-text/javascript">
		WebFont.load({
		google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
		active: function() {
		sessionStorage.fonts = true;
	}
});
</script>

<meta property="og:url"           content="https://www.ghanamusicplus.com" />
<link rel="me" href="https://twitter.com/twitterdev" >
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Pesewa One" />
<meta property="og:description"   content="Pesewa One" />
<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />
<link rel="apple-touch-icon" sizes="180x180" href="assets/img/blue.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/img/blue.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/img/blue.png">

<link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendors/css/base/pesewaone.css">
<link rel="stylesheet" href="assets/css/animate/animate.min.css">

<link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


	.fas{
		padding: 10px;
		font size: 30px;
		width: 40px;
		text-align: center;
		text-decoration: none;
		margin:5px 2px;
		border-radius:50%; 
	}

	#facebook
	{
		background:#3B5998;
		color: white;
	}

	#twitter
	{
		background:#55ACEE;
		color: white;
	}
	#linkedin 
	{
		background:#007bb5;
		color: white;
	}

	#instagram 
	{
		background:#eb4924;
		color: white;
	}


	.menu li{
		line-height: 4em;
		color:black;
	}

	/*//small devices*/
	@media (max-width: 576px) {
		.off-sidebar-container{
			width: 70% !important;
		}
	}

	/*// Medium devices (tablets, 768px and up)*/
	@media (min-width: 768px) {
		.off-sidebar-container{
			width: 30% !important;
		}
	}

	/*// Large devices (desktops, 992px and up)*/
	@media (min-width: 992px) {
		.off-sidebar-container{
			width: 30% !important;
		}
	}

	/*// Extra large devices (large desktops, 1200px and up)*/
	@media (min-width: 1200px) {
		.off-sidebar-container{
			width: 30% !important;
		}
	}
</style>

</head>

<body id="page-top">
	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>

	<p style="display:none">
		<?php
		require 'core/init.php';
		require 'views/views.php';
		require 'core/db_con.php';
		$user = new User();
		$views = new Views();
		?>
	</p>

	<div class="page db-social">
		<?php
		function getUserIpAddr(){
			if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	        //ip from share internet
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	        //ip pass from proxy
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}else{
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			return $ip;
		}

		if(isset($_GET['login']))
		{
			echo $views->login();
		}elseif(isset($_GET['logout']))
		{
			echo $views->logout($user);
		}
		elseif(isset($_GET['register']))
		{
			echo $views->register($con);
		}
		else
		{
			if(isset($_GET['board']))
			{
				?>
				<header class="header">
					<div class="container">
						<nav class="navbar fixed-top" style="background:white;border-color: yellow;box-shadow: inset 0px -11px 8px -10px #CCC;">

							<div class="search-box">
								<button class="dismiss"><i class="ion-close-round"></i></button>
								<form id="searchForm" action="#" role="search">
									<input type="search" placeholder="Search something ..." class="form-control">
								</form>
							</div>


							<div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
								<?php 
								include 'include/nav.php';
								?>
							</div>

						</nav>
					</div>
				</header>
				<?php
				echo $views->userboard();
			}elseif(isset($_GET['profile']))
			{
				?>
				<header class="header">
					<div class="container">
						<nav class="navbar fixed-top" style="background:white;border-color: yellow;box-shadow: inset 0px -11px 8px -10px #CCC;">

							<div class="search-box">
								<button class="dismiss"><i class="ion-close-round"></i></button>
								<form id="searchForm" action="#" role="search">
									<input type="search" placeholder="Search something ..." class="form-control">
								</form>
							</div>


							<div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
								<?php 
								include 'include/nav.php';
								?>
							</div>

						</nav>
					</div>
				</header>
				<?php
				echo $views->profile($user);
			}
			elseif(isset($_GET['read']))
			{
				?>
				<header class="header">
					<div class="container">
						<nav class="navbar fixed-top" style="background:white;border-color: yellow;box-shadow: inset 0px -11px 8px -10px #CCC;">

							<div class="search-box">
								<button class="dismiss"><i class="ion-close-round"></i></button>
								<form id="searchForm" action="#" role="search">
									<input type="search" placeholder="Search something ..." class="form-control">
								</form>
							</div>


							<div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
								<?php 
								include 'include/nav.php';
								?>
							</div>

						</nav>
					</div>
				</header>

				<div class="page-content" style="margin-top:5px;">
					<div class="row">
						<div class="col-xl-7">
							<?php
							$id = escape($_GET['read']);
							$output = '';
							$select = mysqli_query($con, "SELECT * FROM portal WHERE pid = '$id'");
							if(mysqli_affected_rows($con) != 0)
							{
								while($row = mysqli_fetch_array($select))
								{
									$output .='
									<div class="card">
									';
									if($row['checker'] == "1")
									{
										$output .='
										<img src="upload/'.$row['image'].'" class="card-img-top" style="height:230px;" alt="...">
										';
									}
									$output.='
									<div class="card-body">
									<h3 class="card-title">'.$row['title'].'</h3>
									<div>
									'.htmlspecialchars_decode(stripslashes($row['body'])).'
									</div>
									</div>

									<div class="card-footer text-right">
									<div class="status">
									<a href ="#"class="fa fas fa-facebook"> </a>&nbsp;&nbsp;
									<a href ="#"class="fa fas fa-twitter"> </a>&nbsp;&nbsp;
									<a href ="#"class="fa fas fa-linkedin"> </a>
									</div>
									</div>
									</div>
									';
								}
							}

							echo $output;
							?>
						</div>

						<div class="col-xl-5">
							<div class="widget widget-10 has-shadow">
								<div class="widget-header bordered d-flex align-items-center">
									<h2 style="color:orangered;"> Articles </h2>
								</div>
								<div class="widget-body no-padding">
									<ul class="ticket list-group w-100">
										<?php
										$outpu = '';
										$select = mysqli_query($con, "SELECT * FROM portal WHERE category = '300' ORDER BY pdate DESC LIMIT 2");
										if(mysqli_affected_rows	($con) != 0)
										{
											while($row = mysqli_fetch_array($select))
											{
												$outpu .='
												<li class="list-group-item">
												<div class="media">
												<div class="media-left align-self-center pr-4">

												</div>
												<div class="media-body align-self-center">
												<div class="username">
												<h4 style="color:royalblue;">'.$row['title'].'</h4>
												</div>
												<div class="msg">
												'.htmlspecialchars_decode(stripslashes(substr($row['body'],0,200))).'...
												</div>
												<div class="status"><span class="read more mr-2"></span>
												<br>
												<a href ="#"class="fa  fas fa-facebook"> </a>
												<a href ="#"class="fa fas fa-twitter"> </a>
												<a href ="#"class="fa fas fa-linkedin"> </a>
												<a href ="?read='.$row['pid'].'" style="color:white"class="btn btn-info ripple mr-1 mb-2 btn-sm"> read more</a>
												</div>
												</div>
												</div>
												</li>
												';
											}
										}

										echo $outpu;
										?>
									</ul>
								</div>
							</div>

							<div class="widget widget-10 has-shadow">
								<div class="widget-header bordered d-flex align-items-center">
									<h2 style="color:limegreen ">Ads</h2>
								</div>

								<div class="widget-body no-padding">
									<ul class="ticket list-group w-100">
										<?php
										$outpute = '';
										$select = mysqli_query($con, "SELECT * FROM portal WHERE category = '100' ORDER BY pdate DESC LIMIT 2");
										if(mysqli_affected_rows	($con) != 0)
										{
											while($row = mysqli_fetch_array($select))
											{
												$outpute .='
												<li class="list-group-item">
												<div class="media">
												<div class="media-left align-self-center pr-4">

												</div>
												<div class="media-body align-self-center">
												<div class="username">
												<h4 style="color:royalblue;">'.$row['title'].'</h4>
												</div>
												<div class="msg">
												'.htmlspecialchars_decode(stripslashes(substr($row['body'],0,200))).'...
												</div>
												<div class="status"><span class="read more mr-2"></span>
												<br>
												<a href ="#"class="fa fa-facebook"> </a>
												<a href ="#"class="fa fa-twitter"> </a>
												<a href ="#"class="fa fa-linkedin"> </a>
												<a href ="?read='.$row['pid'].'" style="color:white"class="btn btn-info ripple mr-1 mb-2 btn-sm"> read more</a>
												</div>
												</div>
												</div>
												</li>
												';
											}
										}

										echo $outpute;
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}elseif(isset($_GET['services']))
			{
				?>
				<header class="header">
					<div class="container">
						<nav class="navbar fixed-top" style="background:white;border-color: yellow;box-shadow: inset 0px -11px 8px -10px #CCC;">

							<div class="search-box">
								<button class="dismiss"><i class="ion-close-round"></i></button>
								<form id="searchForm" action="#" role="search">
									<input type="search" placeholder="Search something ..." class="form-control">
								</form>
							</div>


							<div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
								<?php 
								include 'include/nav.php';
								?>
							</div>

						</nav>
					</div>
				</header>


				<div class="page-content container-fluid" style="margin-top:-30px;">
							<br>


							<div class="row flex-row">
								<?php
									$service = escape($_GET['services']);
									$select = mysqli_query($con, "SELECT * FROM categories WHERE identifier = '$service'");
									if(mysqli_affected_rows($con) != 0)
									{
										while($row = mysqli_fetch_array($select))
										{
											$service = $row['cid'];
										}
									}
									echo $views->services($service, $con);
								?>
							</div>

						</div>
						<!-- nav sidebar -->

						<?php
						echo $views->sidebar($con);
						?>
			        <!--
						<footer class="main-footer">
							<div class="container">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
										<p class="text-gradient-02">&copy; PesewaOne</p>
									</div>
								</div>
							</div>
						</footer>
					-->

				</div>
				<?php
			}elseif(isset($_GET['serviced']))
			{
				?>
				<header class="header">
					<div class="container">
						<nav class="navbar fixed-top" style="background:white;border-color: yellow;box-shadow: inset 0px -11px 8px -10px #CCC;">

							<div class="search-box">
								<button class="dismiss"><i class="ion-close-round"></i></button>
								<form id="searchForm" action="#" role="search">
									<input type="search" placeholder="Search something ..." class="form-control">
								</form>
							</div>


							<div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
								<?php 
								include 'include/nav.php';
								?>
							</div>

						</nav>
					</div>
				</header>


				<div class="page-content">

							<div class="content-inner compact active">
								<?php
									if(isset($_GET['intern']))
									{
										$service = escape($_GET['service']);
										echo $views->intern($con, $service, $user);
									}else if(isset($_GET['jobber']))
									{
										$service = escape($_GET['service']);
										echo $views->jobber($con, $service, $user);
									}else if(isset($_GET['entreprenuer']))
									{
										$service = escape($_GET['service']);
										echo $views->entreprenuer($con, $service, $user);
									}
									else
									{
										$service = escape($_GET['business']);
										echo $views->business($service, $con, $user);
									}
								?>
							</div>

						</div>
						<!-- nav sidebar -->

						<?php
						echo $views->sidebar($con);
						?>
			        <!--
						<footer class="main-footer">
							<div class="container">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
										<p class="text-gradient-02">&copy; PesewaOne</p>
									</div>
								</div>
							</div>
						</footer>
					-->

				</div>
				<?php
			}elseif(isset($_GET['internship']))
			{
				?>
				<header class="header">
					<div class="container">
						<nav class="navbar fixed-top" style="background:white;border-color: yellow;box-shadow: inset 0px -11px 8px -10px #CCC;">

							<div class="search-box">
								<button class="dismiss"><i class="ion-close-round"></i></button>
								<form id="searchForm" action="#" role="search">
									<input type="search" placeholder="Search something ..." class="form-control">
								</form>
							</div>


							<div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
								<?php 
								include 'include/nav.php';
								?>
							</div>

						</nav>
					</div>
				</header>


				<div class="page-content container-fluid">
					<?php
						$intern = escape($_GET['internship']);
						if($intern == "intern")
						{
							echo $views->intern_dashboard($user,$con);
						}
					?>
				</div>
						<!-- nav sidebar -->

						<?php
							echo $views->sidebar($con);
						?>
			        <!--
						<footer class="main-footer">
							<div class="container">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
										<p class="text-gradient-02">&copy; PesewaOne</p>
									</div>
								</div>
							</div>
						</footer>
					-->

				</div>
				<?php
			}
			else
			{
				?>
				<header class="header">
					<div class="container">
						<nav class="navbar fixed-top" style="background:white;border-color: yellow;box-shadow: inset 0px -11px 8px -10px #CCC;">

							<div class="search-box">
								<button class="dismiss"><i class="ion-close-round"></i></button>
								<form id="searchForm" action="#" role="search">
									<input type="search" placeholder="Search something ..." class="form-control">
								</form>
							</div>


							<div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
								<?php 
								include 'include/nav.php';
								?>
							</div>

						</nav>
					</div>
				</header>


				<div class="page-content container-fluid" style="margin-top:-30px;">

					<!--<div class="container-fluid">-->
						<!--<div class="jumbotron">-->
							<!--<h1 class="display-4">Hello, world!</h1>-->
							<!--<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>-->
							<!--<hr class="my-4">-->
							<!--<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>-->
							<!--<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>-->
							<!--</div>-->
							<br>


							<div class="row flex-row">
								<span style="margin-top:-26px;" id="articles"></span>
							</div>

						</div>
						<!-- nav sidebar -->

						<?php
						echo $views->sidebar($con);
						?>
			        <!--
						<footer class="main-footer">
							<div class="container">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
										<p class="text-gradient-02">&copy; PesewaOne</p>
									</div>
								</div>
							</div>
						</footer>
					-->

				</div>
				<?php
			}
		}
		?>
	</div>


	<script src="assets/vendors/js/base/jquery.min.js" type="text/javascript"></script>
	<script src="assets/vendors/js/base/core.min.js" type="text/javascript"></script>

	<script src="assets/vendors/js/base/means.js" type="text/javascript"></script>
	<script src="assets/vendors/js/nicescroll/nicescroll.min.js" type="text/javascript"></script>
	<script src="assets/vendors/js/chart/chart.min.js" type="text/javascript"></script>
	<script src="assets/vendors/js/progress/circle-progress.min.js" type="text/javascript"></script>
	<script src="assets/vendors/js/app/app.min.js" type="text/javascript"></script>


	<script src="assets/js/dashboard/db-modern.min.js" type="text/javascript"></script>
</body>

</html>