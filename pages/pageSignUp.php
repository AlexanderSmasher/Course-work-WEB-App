<?php
session_start();
class Authorization {
	public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //Если сессия существует
            return $_SESSION["is_auth"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
        }
        else return false; //Пользователь не авторизован, т.к. переменная is_auth не создана
    }

		public function Auth($username, $password) {
			$link = mysqli_connect("mysql.zzz.com.ua","jellon","Sasha020701", "jellon");
			$query = 'SELECT * FROM users';

			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
			if($result) {
				$rows = mysqli_num_rows($result); // количество полученных строк
				for ($i = 0 ; $i < $rows ; ++$i) {
					$row = mysqli_fetch_row($result);

					if ($username == $row[1]) {
							$_SESSION["is_auth"] = true;
							$_SESSION["login"] = $username;
							return true;
					}
					else { //Логин и пароль не подошел
							$_SESSION["is_auth"] = false;
					}
				}
				// очищаем результат
				mysqli_free_result($result);
			}
			mysqli_close($link);
    }

		public function CreateUser($username, $password) {
			$link = mysqli_connect("mysql.zzz.com.ua","jellon","Sasha020701", "jellon");
			$coded_pass = password_hash($password, PASSWORD_BCRYPT);
			$query = "INSERT INTO users (username, password) VALUES ('$username', '$coded_pass');";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
			if($result) {
				$rows = mysqli_num_rows($result);
				for ($i = 0 ; $i < $rows ; ++$i) {
					$row = mysqli_fetch_row($result);
					$hash = $row[2];
					if ($username == $row[1] && password_verify($password, $hash)) {
							$_SESSION["is_auth"] = true;
							$_SESSION["login"] = $username;
							return true;
					}
					else {
							$_SESSION["is_auth"] = false;
					}
				}
				mysqli_free_result($result);
			}
			mysqli_free_result($result);
			mysqli_close($link);
		}

		public function getUsername() {
        if ($this->isAuth()) {
            return $_SESSION["login"];
        }
    }

    public function unAuth() {
        $_SESSION = array();
        session_destroy();
    }
}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<link rel="shortcut icon" href="../img/favicon.ico" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico">
		<link rel="icon" type="image/x-icon" href="/favicon.ico">
		<link rel="icon" href="/favicon.ico" />
		<link type = "text/css" href = "../css/styleLogIn.css" rel = "stylesheet">
		<script src = "../js/script.js"></script>
		<title> Sign Up </title>
	</head>
	<body>
		<div class = "body">
			<div class = "headerPanel">
				<div class = "logo"><img src = "../img/logo.gif" width = "100%" height = "auto"></div>
			</div>
			<div class = "contentBody">
				<div class = "headContent"><p>Sign Up</p></div>
				<div class = "contentLogIn">
					<form method="post" action="">
						<?php
						$auth = new Authorization();
						if ($_SESSION["is_auth"] == true)
						{
							$auth->unAuth();
						}
						if (isset($_POST["buttonSignUp"])) {


							if ($auth->Auth($_POST["user"], $_POST["pass"])) {
								$style = "style='display:block;'";
							}
							else {
								if(empty($_POST["user"]) or empty($_POST["pass"])) {
									$style = "style='display:block;'";
								}
								else {
									$auth->CreateUser($_POST["user"], $_POST["pass"]);
									$auth->Auth($_POST["user"], $_POST["pass"]);
									echo "<script>redirect('mainPage.php');</script>";
									exit;
								}
							}
						}
						?>
					<div class = "logInMenu">
						<div class = "logInText">Username</div>
						<div class = "logInField"><input type="text" name="user" placeholder="username"></div>
						<div class = "logInText">Password</div>
						<div class = "logInField"><input type="password" name="pass" placeholder="password"></div>
						<div class = "logInError" <?php echo $style;?> >Incorrect username or password!</div>
						<div class = "logInButtons">
							<button type="submit" name="buttonSignUp">Sign Up</button>
							<button type="button" onclick="redirect('../index.php');">Back</button>
						</div>
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
