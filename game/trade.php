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
  echo $currentUser;
	?>
</head>

<body>

  <?php if(isset($_SESSION['gn'])) {
    $queryFetchLeden = "SELECT * FROM `artikel` WHERE `ask` != '" . $_SESSION['gn'] . "'and `ask`!=''";
    echo $queryFetchLeden;
  	if($result = mysqli_query($mysqli, $queryFetchLeden)) {
  		?>
  	<table>
  		<tr>
  			<th>prijs</th>
  			<th>titel</th>
  			<th>foto</th>
  			<th>owner</th>
        <th></th>
  		</tr>
  	<?php
  		while($con = mysqli_fetch_array($result)){
        $file =  "image/" . $con['foto'];
        $sqlupdateTrade = "UPDATE `artikel` SET `owner`='$currentUser',`ask`='',`trade`='' WHERE id_artikel='" . $con['id_artikel'] . "'";

  			?>
  			<tr>
  				<td><?php echo $con['prijs'] ?></td>
          <td><?php echo $con['titel'] ?></td>
          <td><?php if(file_exists($file)) {?>
  				<img width="200px" src="/beroeps2/beroeps2.1/game/image/<?php echo $con['foto'] ?>" alt="">
  			<?php } ?></td>

  				<td><?php echo $con['owner'] ?></td>
          <td>
            <form action="" method="post"><input class="submit" type="submit" name="submit" value="ruilen" onClick="return  confirm('weet je zeker')"></form>
          </td>
          <td><?php echo $sqlupdateTrade ?></td>
	       </tr>
  	<?php
  		}
  		?>
  	</table>
  <?php }
  if (isset($_POST['submit'])) {

  }
} else if(!isset($_SESSION['gn'])) {
    header("location: ../account/index.php");
}
?>
</body>
</html>
