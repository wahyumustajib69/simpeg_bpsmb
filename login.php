<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SIMPEG BPSMB | LOGIN</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(img/login-bg.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x" style="text-shadow: 2px 2px 4px #000066;"> SIMPEG BPSMB</h1>
						<div class="well row pt-1x pb-2x bk-light" style="box-shadow: 5px 8px 8px #000033">
							<div class="col-md-8 col-md-offset-2">
								<div class="text-center"><img src="img/kalsel.png" width="60px"></div>
								<div>
					                 <?php
					                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
					                    echo '<div id="pesan" class="alert alert-danger" style="display:none;">'.$_SESSION['pesan'].'</div>';
					                    }
					                    $_SESSION['pesan'] = '';
					                ?>
					            </div>
								<form method="post" action="login_act.php">

									<label for="" class="text-uppercase text-sm text-primary">username</label>
									<input type="text" name="username" placeholder="Username" class="form-control input-sm mb">

									<label for="" class="text-uppercase text-sm text-primary">Password</label>
									<input type="password" name="password"  placeholder="Password" class="form-control input-sm mb">

									<div class="checkbox checkbox-circle checkbox-info">
										<input id="checkbox7" type="checkbox">
										<label for="checkbox7">
											Ingat saya
										</label>
									</div>

									<button class="btn btn-primary btn-block btn-sm" type="submit"><i class="fa fa-key"></i> LOGIN</button>

								</form>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script>
        $(document).ready(function(){setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);});
        setTimeout(function(){$("#pesan").fadeOut('slow');}, 5000);
   	</script>
</body>

</html>