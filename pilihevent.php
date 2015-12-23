<!DOCTYPE html>
<html>
	<head>

		<title>Hasil Rating Event | KM-ITB </title>
		<link href="css/association.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/half-slider.css" rel="stylesheet">	
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>		
	
	<body> 
		<!-- Navigation -->
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<div class="title">
								<a class="navbar-brand" href="#">Welcome to Rating Event page</a>
							</div>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div>
						<!-- /.navbar-collapse -->
					</div>
					<!-- /.container -->
				</nav>
				   
				<!-- /.container -->
				</nav>
				 <div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="menu-bar">
								<div class= "logo">
									<img id="logo-img" src="assets/logo.gif"></img>
								</div>
								<div class= "menu">
										<ul class="nav nav-pills">
											<li><a href="index.html">Home</a></li>
											<li><a href="#">Event</a></li>
											<li><a href="#">Open Data</a></li>
											<li><a href="#">Kader</a></li>
										</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="container">
					<div class="satu">
						<div class="satu-txt">
							<legend><p><b>Pilih event </b></p></legend>
							<fieldset>
								<?php
									$userid = $_POST['userid'];
									echo " <p> Log In as <b>" .$userid ."</b> </p>";
									
									$info = file_get_contents('http://localhost/versihana/event_api.php?action=get_Allevent');
									$info = json_decode($info,true);
									echo "<table>";
									echo "<tr>";
									echo "<th> ID Event</th>";
									echo "<th> Nama Event </th>";
									echo "</tr>";
									foreach ($info as $result) {
										echo "<tr>";
										echo "<td>";
										echo $result['event_id'] . "<br>";
										echo "</td>";
										echo "<td>";
										echo $result['nama'] . "<br>";
										echo "</td>";
										echo "<tr>";
									}
									echo "<table>";
								
								?>
								
									<form action = "rating.php" method = "POST">
										<input type = "hidden" name = "userid" value = "<?php echo $userid ?>">
										<input type = "hidden" name = "action" value = "pilih">
										Pilih event (Masukkan ID event) <br>
										<input type = "number_format" name = "id" required>
										<input type = "submit" name = "submiteventid" value = "Ok!">
									</form>
							</fieldset>
						</div>
					</div>
				</div>
			

			<!-- Page Content -->
			<div class="container">
				<div class="center">
					<div class="social-media">
						<a href='https://www.facebook.com/ITB.KM'><img id="icon-fb" src="assets/home/icon-fb.png"></img></a>
						<a href='http://mail.google.com'><img id="icon-mail" src="assets/home/icon-mail.png"></img></a>
						<a href='https://www.instagram.com/km_itb/'><img id="icon-ig" src="assets/home/icon-ig.png"></img></a>	
					</div>
				</div>
			</div>
			
			<!-- Footer -->
				<footer>
					<div class="row">
						<div class="copyright">
							<p>Sistem dan Teknologi Informasi 2013</p>
						</div>
					</div>
					<!-- /.row -->
				</footer>
			<!-- /.container -->

			<!-- jQuery -->
			<script src="js/jquery.js"></script>

			<!-- Bootstrap Core JavaScript -->
			<script src="js/bootstrap.min.js"></script>

			<!-- Script to Activate the Carousel -->
			<script>
			$('.carousel').carousel({
				interval: 5000 //changes the speed
			})
			</script>
			
	</body>
</html>
