<html lang="nl">
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
	<?php
	require '../config.inc.php';
	include('turn.php');
	array_find($needle, $arrayUsers);
	$currentUser = $arrayUsers[array_find($needle, $arrayUsers)];
	$text = "";
	$text = $currentUser.  " is nu aan de beurt";

	session_start();
	?>
</head>

<body>

	<?php if(isset($_SESSION['gn'])) { ?>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="img">
		<input type="number" name="prijs">
		<input type="text" name="titel">
		<input type="submit" name="submit">
	</form>

	<?php
	 if(isset($_POST['submit'])) {//check bestaat de submit
		 $text = $currentUser.  " is nu aan de beurt";
		//$text = $nextUser.  " is nu aan de beurt";



		 $img = $_FILES['img'];
		 //img specifications
		 $tijdelijk = $img['tmp_name'];//pakt de tijdelijke naam van je file
		 $name = $img['name'];//de naam van de file
		 $map = __DIR__ . "/image/";// het path naar het doel map

		 $type = $img['type'];//welke extensie is het
		 $allowed  = array('image/jpeg', 'image/gif', 'image/png');
		 $prijs = $_POST['prijs'];
		 $titel = $_POST['titel'];

		 $error = "";
				//fout melding neef
			if(strlen($prijs) == 0) {
				$error .= "vul de prijs in<br>";
			}

			if(strlen($titel) == 0) {
				$error .= "je hebt geen titel ingevult<br>";
			}


			if($img == NULL) {
				$error .= "je hebt geen foto toegevoegd";
			}
                //plaats het tier level
                if($prijs < 5) {
                    $tier = 1;
                } else if($prijs < 20) {
                    $tier = 2;
                } else if($prijs < 50) {
                    $tier = 3;
                } else if($prijs > 100) {
                    $tier = 4;
                } else if($prijs < 500) {
                    $tier = 5;
                } else if($prijs < 1000) {
                    $tier = 6;
                            }
					if($currentUser == $_SESSION['gn']) {//gaat alleen verder als het ingelogt persoon gelijk is als users van DB
						$query = "INSERT INTO `artikel`
						VALUES(NULL, '$prijs', '$tier', '$name', '$titel','". $_SESSION['gn'] . "', '','')";
						if(strlen($error) == 0) {
							if(mysqli_query($mysqli, $query)) {
								if($currentUser == $lastUser) {
									$nextUser = $arrayUsers[0];
								}
								$sqlUpdateUses = "UPDATE `turn` SET `user` = '" . $nextUser . "' WHERE `turn`.`user` = '" . $currentUser . "'";
								echo($sqlUpdateUses);
								mysqli_query($mysqli, $sqlUpdateUses);
								if(isset($_FILES['img']) && $_FILES['img']['error'] == 0) {//checkt of the img  bestaat en 0 errors heeft
									if (in_array($type, $allowed)) {//controleert of het bestand een jpeg of gif of png is
										if ( move_uploaded_file($tijdelijk, $map.$name)) {//verplaats het bestand van de tijdelijke map naar de image map
											//header("location: index3.php");
										}
										else {
											echo $map.$name;
										}
									}
								}
							}
						} else {
							echo $error;

							}
						} else { echo "wacht op de turn"; }
		  	}
    } else if(!isset($_SESSION['gn'])) {
        header("location: ../account/index.php");
    }
	?>
</body>
</html>
