<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/back2/back2.1/css/main.css">
<title>wijzig</title>
	<?php require '../config.inc.php';
	session_start();
	?>
</head>

<body>
	 <header>
      <nav>
        <ul>
          <li><a href="/back12/periode5/login/logout.php">logout</a></li>
        </ul>
      </nav>
      <h1>welcome op de pagina.</h1>

    </header>
	<main>

	<?php
    session_unset();

    session_destroy();
    header("location: index.php");
	?>
	</main>
</body>
</html>
