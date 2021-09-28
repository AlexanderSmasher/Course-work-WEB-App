<?php
session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<link rel="shortcut icon" href="../img/favicon.ico" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico">
		<link rel="icon" type="image/x-icon" href="/favicon.ico">
		<link rel="icon" href="/favicon.ico" />
		<link type = "text/css" href = "../css/style.css" rel = "stylesheet">
		<script src = "../js/script.js"></script>
		<title> Microsoft products </title>
	</head>
  <body>
    <?php
		if ($_SESSION["is_auth"] == false) {
			echo "<script>redirect('../index.php');</script>";
			exit();
		}
		if ($_SESSION["login"] == "admin") {
			$style = "visibility: visible;";
		}
		else {
			$style = "visibility: hidden;";
		}
		?>
		<div class = "body">
      <div class = "headerPanel">
				<div class = "logo"><a href = "mainPage.php"><img src = "../img/logo.gif" width = "100%" height = "auto"></a></div>
				<div class="search" style = "<?php echo $style; ?>" ><div class="accauntButton"><a href="adminPage.php"><p>Admin</p></a></div></div>
				<div class="search"><div class="exitButton"><a href="../index.php"><p>Exit</p></a></div></div>
				<div class="search"><div class="accauntName"><p><?php echo $_SESSION["login"]; ?></p></div></div>
				<div class="search"><a href="shopingCart.php"><div class="accauntBasket"><img src = "../img/basket.png" width = "100%" height = "auto"><p>Shoping Cart</p></div></a></div>
				<div class="search"><div class="searchButton"><a href="searchPage.php"><p>Search</p></a></div></div>
			</div>
			<div class = "headerCatalog">
				<div class = "catalogButton">
					<li><a href="pageMicrosoft.php">Microsoft</a>
					<ul>
						<li><a href="microsoftWindows.php">Windows</a></li>
						<li><a href="microsoftOffice.php">MS Office</a></li>
						<li><a href="microsoftOther.php">Other</a></li>
					</ul>
				</div>
				<div class = "catalogButton">
					<li><a href="pageAutodesk.php">Autodesk</a>
					<ul>
						<li><a href="autodeskDesign.php">Animations and graphics</a></li>
						<li><a href="autodeskProjecting.php">Architecture and projecting</a></li>
						<li><a href="autodeskIndustry.php">Development and industry</a></li>
					</ul>
				</div>
				<div class = "catalogButton">
					<li><a href="pageAdobe.php">Adobe</a>
					<ul>
						<li><a href="adobePictures.php">Image processing</a></li>
						<li><a href="adobeDesign.php">Design</a></li>
						<li><a href="adobeVideo.php">Video processing</a></li>
						<li><a href="adobeAudio.php">Audio processing</a></li>
					</ul>
				</div>
				<div class = "catalogButton">
					<li><a href="pageGames.php">Games</a>
					<ul>
						<li><a href="gamesValve.php">Valve</a></li>
						<li><a href="gamesUbisoft.php">Ubisoft</a></li>
						<li><a href="gamesEA.php">Electronic Arts</a></li>
					</ul>
				</div>
			</div>
			<div class = "contentBody">
				<div class = "headContent"><p>Microsoft products</p></div>
				<div class = "content">
					<div class = "inContent"><a href = "microsoftWindows.php"><img src = "../img/Windows.png" width = "75%" height = "auto"><p>Windows</p></a></div>
					<div class = "inContent"><a href = "microsoftOffice.php"><img src = "../img/Office.png" width = "75%" height = "auto"><p>MS Office</p></a></div>
					<div class = "inContent"><a href = "microsoftOther.php"><img src = "../img/Other.png" width = "75%" height = "auto"><p>Other</p></a></div>
				</div>
				<div class = "footer">
  <div class = "endLogo"><img src = "../img/favicon.png" width = "100%" height = "auto"></div>
  <div class = "textFoot">
    <p>Site was created by Alexander Slobodianyk for Web-technologies in 2021. All rights reserved. </br>
    My E-mail: slobodianyk.alexander@gmail.com</br>
    My Instagram: <a href="https://www.instagram.com/s.m.a.s.h.e.r/">@s.m.a.s.h.e.r</br></a>
    My git-hub: <a href="https://github.com/AlexanderSmasher">@AlexanderSmasher</br></a></p>
  </div>
</div>
			</div>
		</div>
	</body>
</html>
