<?php include"kasir/config.php";?>
<!DOCTYPE HTML>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ADB: AdaBuku</title>
	<link rel="stylesheet" type="text/css" href="style/prime.css" />
	<link rel="shortcut icon" type="image/png" href="" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link href="css/login.css" rel="stylesheet">
		<link href="css/login.min.css" rel="stylesheet">
		<link href="css/site.css" rel="stylesheet">
	<script type="text/javascript" src=""></script>
</head>
<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-top:-20px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal !! Username dan Password Salah !!</div>";
			}
		}
		?>
<body id="log">
	<div id="header">
	</div>
		<div id="header-inne2r">
			<a href="index.php" id="logo2">
				<p class="adb2">AdaBuku</p>
			</a>
			</div>
		</div>
<!--END OF HEADER-->
		<div id="login-page" class="container">
			<h1>Login Page</h1>
			<form id="login-form" class="well" action="login-proses.php" method="post">
			<input type="text" class="span2" placeholder="Username" name="username" /><br />
			<input type="password" class="span2" placeholder="Password" name="password" /><br />
			<button type="submit" class="btn btn-primary" name="button">Masuk</button>
			
		</form>	
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/site.js"></script>
<!--END OF ARTICLE-->
<div id="footer2">
	<center><p class="j-kaki2">&copy; Copyright 2017 ADB. All Rights Reserved</center></p>
	<ul id="footer-menu2">
		<li><a href="footer/bantuan.html">Bantuan</a></li>
		<li><a>Credit by RAY71</a></li>
		<li><a href="footer/site-hp.html">Situs Mobile</a></li>
	</ul>
</div>
<!--END FOOTERMENU-->

</td>
</section>
</header>
</body>
</html>