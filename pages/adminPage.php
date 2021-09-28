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
		<link type = "text/css" href = "../css/styleAdmin.css" rel = "stylesheet">
		<script src = "../js/script.js"></script>
		<title> Admin panel </title>
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
				<div class = "headContent"><p>Admin panel</p></div>
				<div class = "contentAdmin">
					<form method="post" action="" enctype="multipart/form-data">
						<div class = "adminMenuAdd">
							<div class = "adminText">Add new product</div>
							<div class = "adminMenuColumns">
								<div class = "adminText"><p>Choose type<p></div>
								<div class = "adminSelect">
									<select name="productNum">
										<option value="1">Windows</option>
									  <option value="2">MS Office</option>
										<option value="3">Other</option>
									  <option value="4">Animations and graphics</option>
										<option value="5">Architecture and projecting</option>
									  <option value="6">Development and industry</option>
										<option value="7">Image processing</option>
									  <option value="8">Design</option>
										<option value="9">Video processing</option>
									  <option value="10">Audio processing</option>
										<option value="11">Valve</option>
										<option value="12">Ubisoft</option>
										<option value="13">Electronic Arts</option>
									</select>
								</div>
								<div class = "adminText"><p>Name<p></div>
								<div class = "adminField"><input type="text" name="name" placeholder=""></div>
								<div class = "adminText"><p>Price<p></div>
								<div class = "adminField"><input type="number" name="price"></div>
								<div class = "adminText"><p>Image<p></div>
								<div class = "adminImg"><input type="file" name="img" placeholder=""></div>
								<div class = "adminText"><p>CPU description<p></div>
								<div class = "adminField"><input type="text" name="cpud" placeholder=""></div>
								<div class = "adminText"><p>RAM description<p></div>
								<div class = "adminField"><input type="text" name="ramd" placeholder=""></div>
								<div class = "adminText"><p>GPU description<p></div>
								<div class = "adminField"><input type="text" name="gpud" placeholder=""></div>
								<div class = "adminText"><p>Size<p></div>
								<div class = "adminField"><input type="text" name="sized" placeholder=""></div>
								<div class = "adminText"><p>resolution<p></div>
								<div class = "adminField"><input type="text" name="resd" placeholder=""></div>
							</div>
							<div class = "adminError" style = "<?php echo $stylea;?>" >You have not filled in all the fields!</div>
							<div class = "adminButtonMenu"><button type="submit" name="adminAdd" placeholder="">Add</div>
							<?php
							if(isset($_POST['adminAdd'])) {
								if ($_POST['prodType'] == '1' OR '2' OR '3') {
									$r_catd = '1';
								}
								$r_typed = $_POST['prodType'];
								$r_named = $_POST['name'];
								$r_priced = $_POST['price'];
								$path = "../img/products/" . $_FILES["img"]["name"];
								$r_cpud = $_POST['cpud'];
								$r_ramd = $_POST['ramd'];
								$r_gpud = $_POST['gpud'];
								$r_sized = $_POST['sized'];
								$r_resd = $_POST['resd'];

								if ((empty($r_typed)) OR (empty($r_named)) OR (empty($r_priced)) OR (empty($_FILES["img"]["name"])) OR (empty($r_cpud))
								 OR (empty($r_ramd)) OR (empty($r_gpud)) OR (empty($r_sized)) OR (empty($r_resd))) {
									$stylea = "visibility: visible;";
									return;
								}
								else {
									$stylea = "visibility: hidden;";
									$link = mysqli_connect("mysql.zzz.com.ua","jellon","Sasha020701", "jellon");
									$query = "INSERT INTO products (category_ID, sub_category_ID, name, price, img, cpu, ram, gpu, size, resolution)
									VALUE ('$r_catd', '$r_typed', '$r_named', '$r_priced', '$path', '$r_cpud', '$r_ramd', '$r_gpud', '$r_sized', '$r_resd')";
									$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
									if($result) {
										move_uploaded_file($_FILES["img"]["tmp_name"], $path);
										echo "<script>alertInfo('New product was added successfuly!');</script>";
									}
									else {
										echo "<script>alertInfo('Some problems!');</script>";
									}
								}
							}
							?>
						</div>
					</form>
					<form method="post" action="" enctype="multipart/form-data">
						<div class = "adminMenuEdit">
							<div class = "adminText">Change product</div>
							<div class = "adminMenuColumns">
								<div class = "adminText"><p>Choose product<p></div>
								<div class = "adminSelect">
									<select name="productNum">
										<?php
										$link = mysqli_connect("mysql.zzz.com.ua","jellon","Sasha020701", "jellon");
										$query = "SELECT products_ID, name FROM products;";
										$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
										if($result) {
								    	$rows = mysqli_num_rows($result);
											$row = mysqli_fetch_row($result);
											echo '<option selected value="';
											echo $row[0];
											echo '">';
											echo $row[1];
											echo '</option>';
											for ($i = 1 ; $i < $rows; ++$i) {
								      	$row = mysqli_fetch_row($result);
												echo '<option value="';
												echo $row[0];
												echo '">';
												echo $row[1];
												echo '</option>';
											}
											mysqli_free_result($result);
										}
										mysqli_close($link);
										?>
									</select>
								</div>
								<div class = "adminText"><p>Choose type<p></div>
								<div class = "adminSelect">
									<select name="prodType">
									  <option value="1">Windows</option>
									  <option value="2">MS Office</option>
										<option value="3">Other</option>
									  <option value="4">Animations and graphics</option>
										<option value="5">Architecture and projecting</option>
									  <option value="6">Development and industry</option>
										<option value="7">Image processing</option>
									  <option value="8">Design</option>
										<option value="9">Video processing</option>
									  <option value="10">Audio processing</option>
										<option value="11">Valve</option>
										<option value="12">Ubisoft</option>
										<option value="13">Electronic Arts</option>
									</select>
								</div>
								<div class = "adminText"><p>Name<p></div>
								<div class = "adminField"><input type="text" name="name" placeholder="<?php $row[3]?>"></div>
								<div class = "adminText"><p>Price<p></div>
								<div class = "adminField"><input type="number" name="price" placeholder="<?php $row[4]?>"></div>
								<div class = "adminText"><p>Image<p></div>
								<div class = "adminImg"><input type="file" name="img" placeholder=""></div>
								<div class = "adminText"><p>CPU description<p></div>
								<div class = "adminField"><input type="text" name="cpud" placeholder="<?php $row[6]?>"></div>
								<div class = "adminText"><p>RAM description<p></div>
								<div class = "adminField"><input type="text" name="ramd" placeholder="<?php $row[7]?>"></div>
								<div class = "adminText"><p>GPU description<p></div>
								<div class = "adminField"><input type="text" name="gpud" placeholder="<?php $row[8]?>"></div>
								<div class = "adminText"><p>Size<p></div>
								<div class = "adminField"><input type="text" name="sized" placeholder="<?php $row[9]?>"></div>
								<div class = "adminText"><p>resolution<p></div>
								<div class = "adminField"><input type="text" name="resd" placeholder="<?php $row[10]?>"></div>
							</div>
							<div class = "adminError" style = "<?php echo $stylea;?>" >You have not filled in all the fields!</div>
							<div class = "adminButtonMenu"><button type="submit" name="adminUpdate" placeholder="">Change</div>
							<?php
							if(isset($_POST['adminUpdate'])) {
								if ($_POST['prodType'] == '1' OR '2' OR '3') {
									$r_catd = '1';
								}
								if ($_POST['prodType'] == '4' OR '5' OR '6') {
									$r_catd = '2';
								}
								if ($_POST['prodType'] == '7' OR '8' OR '9' OR '10') {
									$r_catd = '3';
								}
								if ($_POST['prodType'] == '11' OR '12' OR '13') {
									$r_catd = '4';
								}
								$r_prodNum = $_POST['productNum'];
								$r_typed = $_POST['prodType'];
								$r_named = $_POST['name'];
								$r_priced = $_POST['price'];
								$path = "../img/products/" . $_FILES["img"]["name"];
								$r_cpud = $_POST['cpud'];
								$r_ramd = $_POST['ramd'];
								$r_gpud = $_POST['gpud'];
								$r_sized = $_POST['sized'];
								$r_resd = $_POST['resd'];

								if ((empty($r_typed)) OR (empty($r_named)) OR (empty($r_priced)) OR (empty($_FILES["img"]["name"])) OR (empty($r_cpud))
								 OR (empty($r_ramd)) OR (empty($r_gpud)) OR (empty($r_sized)) OR (empty($r_resd))) {
									$stylea = "visibility: visible;";
									return;
								}
								else {
									$stylea = "visibility: hidden;";
									$link = mysqli_connect("mysql.zzz.com.ua","jellon","Sasha020701", "jellon");
									$query = "UPDATE products SET category_ID = '$r_catd', sub_category_ID = '$r_typed', name = '$r_named', price = '$r_priced', img = '$path',
									cpu = '$r_cpud', ram = '$r_ramd', gpu = '$r_gpud', size = '$r_sized', resolution = '$r_resd' WHERE products_ID = '$r_prodNum'";
									$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
									if($result) {
										move_uploaded_file($_FILES["img"]["tmp_name"], $path);
										echo "<script>alertInfo('New product was added successfuly!');</script>";
									}
									else {
										echo "<script>alertInfo('Some problems!');</script>";
									}
								}
							}
							?>
						</div>
					</form>
					<form method="post" action="" enctype="multipart/form-data">
						<div class = "adminMenuDelete">
							<div class = "adminText">Delete product</div>
							<div class = "adminMenuColumns">
								<div class = "adminText"><p>Choose product<p></div>
								<div class = "adminSelect">
									<select name="prodTypeToDelete">
										<?php
										$numberP = 0;
										$link = mysqli_connect("mysql.zzz.com.ua","jellon","Sasha020701", "jellon");
										$query = "SELECT products_ID, name FROM products;";
										$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
										if($result) {
								    	$rows = mysqli_num_rows($result);
											$row = mysqli_fetch_row($result);
											echo '<option selected value="';
											echo $row[0];
											echo '">';
											echo $row[1];
											echo '</option>';
											for ($i = 1 ; $i < $rows; ++$i) {
								      	$row = mysqli_fetch_row($result);
												echo '<option value="';
												echo $row[0];
												echo '">';
												echo $row[1];
												echo '</option>';
											}
											mysqli_free_result($result);
										}
										mysqli_close($link);
										?>
									</select>
								</div>
							</div>
							<div class = "adminButtonMenu"><button type="submit" name="adminDelete" placeholder="">Delete</div>
							<?php
							if(isset($_POST['adminDelete'])) {
								$r_deletenum = $_POST['prodTypeToDelete'];
								$stylea = "visibility: hidden;";
								$link = mysqli_connect("mysql.zzz.com.ua","jellon","Sasha020701", "jellon");
								$query = "DELETE FROM products WHERE products_ID = $r_deletenum";
								$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
								if($result) {
									move_uploaded_file($_FILES["img"]["tmp_name"], $path);
									echo "<script>alertInfo('New product was added successfuly!');</script>";
								}
								else {
									echo "<script>alertInfo('Some problems!');</script>";
								}
							}
							?>
						</div>
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
