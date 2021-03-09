<?php
	
	require "../includes/connect.php";
	if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];
	
	$sql = "SELECT * FROM customers WHERE username=?";
	$res = $dbh->prepare($sql);
	$res->bind_param("s",$username);
	$res->execute();
	$result=$res->get_result();
	
	$row = $result->fetch_assoc();
	$str='';
	if($_SESSION['status'] == 1)
	{
		$str=<<<TABLE
						<tr>
							<th>Admin</th>
						</tr>
						<br>
						<br>
						<tr>
							<th>Användarnamn: </th>
							<td>{$row['username']} </td>
						</tr>
						<br>
						<tr>
							<th>Förstanamn: </th>
							<td>{$row['firstname']} </td>
						</tr>
						<br>
						<tr>
							<th>Efternamn:</th>
							<td>{$row['lastname']} </td>
						</tr>
						<br>
						<tr>
							<th>Adress: </th>
							<td>{$row['adress']} </td>
						</tr>
						<br>
						<tr>
							<th>Postkod: </th>
							<td>{$row['zip']} </td>
						</tr>
						<br>
						<tr>
							<th>Stad: </th>
							<td>{$row['city']} </td>
						</tr>
						<br>
						<tr>
							<th>Telefonnummer:</th>
							<td>{$row['phone']} </td>
						</tr>
						<br>
						<br>
						<a href="logout.php">Logga ut</a>
TABLE;
	}
	}
	else
	{
		$str =<<<FORM
			<form action="login2.php" method="post">
				<p><label for="user">Användarnamn:</label>
				<input type="text" id="user" name="username"></p>
				<p><label for="pwd">Lösenord:</label>
				<input type="password" id="pwd" name="password"></p>
				<p>
					<input type="submit" value="Logga in">
				</p>
			</form>
			<p class="create"><a href="createUser.php">Skapa användare</a></p>
FORM;
	}
?>
<!DOCTYPE html>

<html lang="sv">

  <head>
     <meta charset="utf-8">
     <title>Logga in</title>
		 <link rel="stylesheet" href="css/stilmall.css">
	</head>
  <body id="login">
    <div id="wrapper">
     	<?php
	        require "masthead.php";
		    require "menu.php";
			
			
			if(isset($_GET['status'])){
				if($_GET['status']==3){
					$str="Felaktig användare";
				}
				elseif($_GET['status']==4){
					$str="Felaktigt lösenord";
				}
			}
	    ?>
		
			<main> <!--Huvudinnehåll-->
				<section>
					<p><?php echo $str; ?></p>
				</section>

			</main>

    </div>
    <?php
			require "footer.php";
		?>

	</body>
</html>
