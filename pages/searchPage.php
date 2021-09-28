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
		<link type = "text/css" href = "../css/styleSearch.css" rel = "stylesheet">
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
		if(empty($_SESSION['style'])) {
			$_SESSION['style'] = "visibility: hidden;";
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
				<div class = "headContent"><p>Search</p></div>
				<div class = "contentSearch">
					<form method="post" action="">
					<div class = "searchMenu">
						<div class = "searchText">Search by name</div>
						<div class = "searchField"><input type="text" name="name" placeholder=""></div>
						<div class = "searchText">Search by price</div>
						<div class = "priceSearch">
							<div class = "searchText"><p>From:</p></div>
							<div class = "searchField"><input type="number" name="priceFrom" placeholder=""></div>
							<div class = "searchText"><p>To:</p></div>
							<div class = "searchField"><input type="number" name="priceTo" placeholder=""></div>
						</div>
						<div class = "searchText">Description</div>
						<div class = "searchField"><input type="text" name="descrpt" placeholder=""></div>
						<div class = "searchError" style = "<?php echo $_SESSION['style'];?>" >Nothing was found for your request!</div>
						<div class = "searchButtonMenu"><button type="submit" name="buttonSearch">Search</button></div>
					</div>
					<?php
					if(isset($_POST['buttonSearch'])) {
						$r_name = $_POST['name'];
						if (empty($r_name)) {
							$r_name = " ";
						}
						$r_descrpt = $_POST['descrpt'];
						if (empty($r_descrpt)) {
							$r_descrpt = " ";
						}
						$r_from = $_POST['priceFrom'];
						if (empty($r_from)) {
							$r_from = 0;
						}
						$r_to = $_POST['priceTo'];
						if (empty($r_to)) {
							$r_to = 999999;
						}
						$_SESSION['query'] = "SELECT * FROM products WHERE (name LIKE '%$r_name%') AND
						(price BETWEEN '$r_from' AND '$r_to') AND
						((cpu LIKE '%$r_descrpt%') OR (ram LIKE '%$r_descrpt%') OR
						(gpu LIKE '%$r_descrpt%') OR (size LIKE '%$r_descrpt%') OR
						(resolution LIKE '%$r_descrpt%'));";
						echo "<script>redirect('selectSearch.php');</script>";
					}
					?>
					</form>
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
