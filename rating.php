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
					<legend><p><b>Berikan nilai Anda</b></p></legend>
					<fieldset>
						<?php
							echo " <p> Log In as  <b>" .$_POST['userid']. "</b></p>";
							
							$info = file_get_contents('http://localhost/versihana/event_api.php?action=get_event&id=' . $_POST['id']);
							$info = json_decode($info,true);
							
							$info2 = file_get_contents('http://localhost/versihana/rating_api.php?action=i_am_new&tableid=event');
							$info2 = json_decode($info2,true);
							
						?>
						
						<table border="1">
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>Tanggal</th>
							<th>Waktu</th>
							<th>Lokasi</th>
							<th>Biaya</th>
							<th>Deskripsi</th>
							<th>Penyelenggara Acara</th>
							<th>Target Peserta</th>
							<th>Rating</th>
							<th>Media</th>
						</tr>
						<tr>
							<td><?php echo $info['event_id'];?></td>
							<td><?php echo $info['nama'];?></td>
							<td><?php echo $info['tanggal'];?></td>
							<td><?php echo $info['waktu'];?></td>
							<td><?php echo $info['lokasi'];?></td>
							<td><?php echo $info['biaya'];?></td>
							<td><?php echo $info['deskripsi'];?></td>
							<td><?php echo $info['penyelenggara_acara'];?></td>
							<td><?php echo $info['target_peserta'];?></td>
							<td>
								<form action = "upload.php" method = "POST">
									<input type = "hidden" name = "userid" value = "<?php echo $_POST['userid'] ?>">
									<input type = "hidden" name = "id" value = "<?php echo $_POST['id'] ?>">
									<input type = "hidden" name = "action" value = "user_rate">
									<input id= "input-21c" name= "score" value="0" type="number" class="rating" min=0 max=10>
									<input type = "submit" name= "submit" value = "Rate!">
								</form>
								<?php
					
									if(isset($_POST["action"]) == "user_rate" && isset($_POST["submit"]) == "Rate!") {
										$info6 = file_get_contents('http://localhost/versihana/rating_api.php?action=user_rate&tableid=event&titleid=' . $info['event_id'] . '&scorerate='.$_POST["score"].'&userid=' . $_POST['userid']);
										$info6 = json_decode($info6,true);
									}
									$info3 = file_get_contents('http://localhost/versihana/rating_api.php?action=check_scorerate&tableid=event&titleid='.$info['event_id'].'&userid='.$_POST['userid']);
									$info3 = json_decode($info3,true);
					
									$info4 = file_get_contents('http://localhost/versihana/rating_api.php?action=average_score&tableid=event&titleid='.$info['event_id']);
									$info4 = json_decode($info4,true);
					
									$info5 = file_get_contents('http://localhost/versihana/rating_api.php?action=total_user&tableid=event&titleid='.$info['event_id']);
									$info5 = json_decode($info5,true);
									
									$info7 = file_get_contents('http://localhost/versihana/event_api.php?action=insert_average_rate&eventid=' . $info['event_id'] . '&averagerate='. $info4);
									$info7 = json_decode($info7,true); 
					
									if ($info3 != 'x') {
										echo ('You have rate this : ' . $info3 . '<br>');
									} else {
									}
			
									echo ('<br>Ratings = '.$info4.'/5 from '.$info5 .' users');
								?>
								</br>
							</td>
							<td><?php echo $info['media'];?></td>
						</tr>
						</table>
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
