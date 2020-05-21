<?php
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}

	// wczytanie tabeli
	include('connect.php');
	$query = "SELECT * FROM uzytkownicy";
	$result = mysqli_query( $conn, $query );
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<?php define( "TITLE", "php, mySql - Web systems -  by Magdalena Duma" ); ?>
	
	<!--bootstrap4-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<meta name="description" content="Magdalena Duma pierwsze kroki mySql" />
	<meta name="keywords" content="Magdalena, Duma, raczkuje, mySql" />
	
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<div class="container">
	<br><br>
	<h3>zawartość tabeli w db mySql</h3>

<?php
	echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
	echo "<p><b>E-mail</b>: ".$_SESSION['email'];
?>
	<p>inni użytkownicy to:</p>
<?php
	if( mysqli_num_rows($result) > 0 ) {

    	// wyświetlenie danych w tabeli
        echo "<table class='table table-bordered'><tr><th>ID</th><th>User</th><th>Email</th></tr>";
        while( $row = mysqli_fetch_assoc($result) ) {
            echo "<tr><td>". $row["id"] ."</td><td>". $row["user"] ."</td><td>". $row["email"] ."</td></tr>";
        }
			echo "</table>";
        } else {
            echo "Coś poszło nie tak";
    }
    mysqli_close($conn);
?>
</div>
</body>
</html>