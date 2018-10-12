<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/back2/back2.1/css/main.css">
<?php require '../config.inc.php'; ?>
<title>Untitled Document</title>
</head>

<body>
	 <header>
      <nav>
        <ul>
			<li><a href="/back2/back2.1/account/user_add.php">register</a></li>
          <!--<li><a href="/back12/periode5/login/logout.php">logout</a></li>-->
        </ul>
      </nav>
      <h1>welcome op de pagina.</h1>

    </header>
	<main>
	<form action="" method="post">
		gebruikersnaam
		<input type="text" name="gn"><br>
		wachtwoord
		<input type="password" name="ww"><br>
		<input type="submit" name="send">
	</form>

	</main>

		<?php
		
		if(isset($_POST['send'])) {
			//form var
			$gn = $_POST['gn'];//maak een var aan voor je gebruikersnaam
			$ww = $_POST['ww'];//maak een var aan voor je wachtwoord
			$ww = md5($ww);
			$query = "SELECT * FROM `inloggen` WHERE
			`gebruikernaam`='$gn'
			AND
			`wachtwoord`='$ww'";//query die checkt of je wachtwoord en gebruikersnaam klopt
			$con = mysqli_query($mysqli, $query);

			if(mysqli_num_rows($con) > 0) {
				session_start();
				$_SESSION['gn'] = $gn;
				     header("location: ../game/index.php");
				echo "goed";
			}
			else {
				//echo $query;
				echo"je shit is fout";
			}
		}
	




		?>
</body>
</html>
