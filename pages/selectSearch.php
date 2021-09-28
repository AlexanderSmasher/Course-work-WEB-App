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
		<link type = "text/css" href = "../css/styleContent.css" rel = "stylesheet">
		<script src = "../js/script.js"></script>
		<title> Searh </title>
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
		if (empty($_SESSION['query'])) {
			echo "<script>redirect('searchPage.php');</script>";
			exit();
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
				<div class = "headContent"><p>Results</p></div>
				<form method="post">
				<div class = "content">
					<?php
					$link = mysqli_connect("mysql.zzz.com.ua","jellon","Sasha020701", "jellon");
					$checkTab = array();
					$result = mysqli_query($link, $_SESSION['query']) or die("Ошибка " . mysqli_error($link));
					if($result) {
			    	$rows = mysqli_num_rows($result);
						if($rows < 1) {
							echo "<script>redirect('searchPage.php');</script>";
							mysqli_close($link);
							$_SESSION['style'] = "visibility: visible;";
						}
						else {
							$_SESSION['style'] = "visibility: hidden;";
						}
						for ($i = 0 ; $i < $rows ; ++$i) {
							echo '<div class = "inContent">';
			      	$row = mysqli_fetch_row($result);
							echo '<img src = "';
							echo $row[5];
							echo '" width = "100%" height = "470px"><p>';
							echo $row[3];
							echo '<span>Процесор: ';
							echo $row[6];
							echo '</br>Оперативна пам’ять: ';
							echo $row[7];
							echo '</br>Простір на жорсткому диску: ';
							echo $row[9];
							echo '</br>Відеокарта: ';
							echo $row[8];
							echo '</br>Дисплей: ';
							echo $row[10];
							echo '</span>';
							echo $row[4];
							echo ',00$</p><input type="submit" name="product';
							echo $row[0];
							array_push($checkTab, $row[0]);
							echo '" value="Buy now"></div>';
						}
						mysqli_free_result($result);
					}
					mysqli_close($link);
					?>
					<?php
					for ($i = 0; $i < sizeof($checkTab); $i++) {
						if(isset($_POST["product$checkTab[$i]"])) {
							array_push($_SESSION['productToCart'], $checkTab[$i]);
						}
					}
					?>
				</div>
				</form>
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
