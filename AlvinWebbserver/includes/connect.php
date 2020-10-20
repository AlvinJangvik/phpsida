<?php
	$dbh = new mysqli("localhost", "dbUser", "qwe123", "webbshop");
	
	if(!$dbh){
		echo "Ingen kontakt med databasen";
		exit;
	}
	
	$sql = "SELECT * FROM products";
	$res = $dbh->prepare($sql);
	$res->execute();
	$result = $res->get_result();
	// var_dump($result);
	
	if(!$result){
		echo "Felaktig SQL fråga";
		exit;
	}
	
	//$dbh->close();
	
	// var_dump($result);
	echo "<table>";
			while($row = $result->fetch_assoc()){
				echo "<tr>";
					echo "<td>";
						echo $row['name'];
					echo "</td>";
					echo "<td>";
						echo $row['price']. " kronor";
					echo "</td>";
				echo "</tr>";
			}
	echo "</table>";
	
	echo "<br><br>";;

	$sql = "SELECT users.user, users.email, customers.username, customers.firstname, customers.lastname FROM users JOIN customers WHERE users.user = customers.username";

	$res = $dbh->prepare($sql);
	$res->execute();
	$result = $res->get_result();
	// var_dump($result);

echo "<table><tr><th>Anv namn</th><th>Förnamn</th><th>Efternamn</th></tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr><td>";
		echo $row['username'];
		echo "</td><td>";
		echo $row['firstname'];
		echo "</td><td>";
		echo $row['lastname'];
		echo "</td><td>";
		echo $row['email'];
		echo "</td></tr>";
	}
echo "</table>";

	$sql = "SELECT customers.customerID, customers.username, customers.firstname, customers.lastname, orders.customerID, orders.productID, orders.orderID, products.productID, products.name FROM order JOIN customers WHERE customers.customerID=orders.custumerID JOIN products WHERE products.productID = orders.productID";

	$res = $dbh->prepare($sql);
	$res->execute();
	$result = $res->get_result();
	
	echo "<table><tr><th>Anv namn</th><th>Förnamn</th><th>Efternamn</th></tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr><td>";
		echo $row['username'];
		echo "</td><td>";
		echo $row['firstname'];
		echo "</td><td>";
		echo $row['lastname'];
		echo "</td><td>";
		echo $row['email'];
		echo "</td></tr>";
	}
	echo "</table>";

?>

