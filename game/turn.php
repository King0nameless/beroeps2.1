<?php

$sqlCount = "SELECT * FROM `inloggen`";
$countF1 = mysqli_query($mysqli, $sqlCount);
//maakt array met value van database
$lenUser = mysqli_num_rows($countF1);
$lenUser -= 1;
$arrayUsers = array();
for($i=0;$i <= $lenUser; $i++) {
	$countF2 = mysqli_fetch_array($countF1);
	array_push($arrayUsers, $countF2['gebruikernaam']);
	$lastUser = $arrayUsers[$i];
}

 $sql = "SELECT * FROM `turn`";
 $result = mysqli_query($mysqli, $sql);//gaat alleen verder als er een connecton met $sql
 $con = mysqli_fetch_array($result);

$needle = $con['user'];
function array_find($needle, array $arrayUsers)
{
	foreach ($arrayUsers as $key => $value) {
		if (false !== stripos($value, $needle)) {
			return $key;
		}
	}
	return false;
}

if(isset($_POST['submit'])) {
	array_find($needle, $arrayUsers);
	$currentUser = $arrayUsers[array_find($needle, $arrayUsers)];
	$nextUserId = array_find($needle, $arrayUsers) + 1;
	$nextUser = $arrayUsers[$nextUserId];
}

?>
