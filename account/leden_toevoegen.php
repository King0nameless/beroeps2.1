<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="/template/css_t/main.css">
	<?php require '../config.inc.php';?>
</head>

<body>
	<?php
	session_start();
		if(isset($_SESSION['gn'])) {
			?>
			<header>
					<nav>
						<ul>
							<li><a href="/back12/periode5/login/show.php">library</a></li>
							<li><a href="/back12/periode5/login/logout.php">logout</a></li>
						</ul>
					</nav>
					<h1>welcome op de pagina.</h1>

				</header>
			<main>
	<form action="" enctype="multipart/form-data" method="post">
		<fieldset>
			<legend>voeg een band toe</legend>

			First name
			<input type="text" name="first_name"><br>
			Last name
			<input type="text" name="last_name" ><br>
			Birth date
			<input type="date"  name="birth_date"><br>
			Gender<br>
			
			Male
          <input type='radio' name='gender' value='M' >
          <br>
          Female
          <input type='radio' name='gender' value='F'>
			<br>
			photo
			<input type="file" name="img">

			<input type="submit" name="submit" value="submit">

		</fieldset>
	</form>
	<?php
		$verzend = $_POST['submit'];
		if(isset($verzend)) {
		$first_name = $_POST['naam'];
		$last_name = $_POST['Instrument'];
		$gender = $_POST['Geslacht'];
		$birth_date = $_POST['info'];
		
		$img = $_FILES['img'];
        //img specifications
        $tijdelijk = $img['tmp_name'];
        $name = $img['name'];
        $map = __DIR__ . "/image/";

		$type = $img['type'];
        $allowed  = array('image/jpeg', 'image/gif', 'image/png');
			if(isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
				echo "1";
				if (in_array($type, $allowed)) {
					if ( move_uploaded_file($tijdelijk, $map.$name)) {
						echo "kobjihg";
					}
					else {
						echo $map.$name;
					}
				}
			}
			
			/*if (in_array($type, $allowed)) {
				if (move_uploaded_file($tijdelijk, $map.$name)) {
				  echo $tijdelijk;
					  echo "<br>" .$map.$name;
				}   else {
				  //echo $tijdelijk;
					  echo "no" ;//.$map.$name;
				}
          }*/

			/*if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($band)) {
				if(filter_var($band, FILTER_VALIDATE_INT)) {
					if (count($date) == 3) {
						if (checkdate($date[1], $date[2], $date[0])) {
							$query = "INSERT INTO `mphp3_artiesten`
							VALUES(NULL, '$first_name', '$Instrument', '$Geboortedatum1', '$Geslacht', '$info', '$band')";
							if(mysqli_query($mysqli, $query)) {
								echo 'werkt';
							}
							else {
								echo 'vul iets in';
							}
						}
					}
				}
			}*/
		}

	}
	else if(!isset($_SESSION['gn'])) {
		header("location: ../index.php");
	}

	?>
	</main>
</body>
</html>
