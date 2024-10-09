<html lang="en">
<head>
<meta charset="UTF-8">
<title>Car List</title>
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/general.css">
</head>

<body>

<form method="post" action="viewCar.php">
<?php 
		include("initSession.php");
			
			if(isset($_POST['menu'])){
				header('location: main.php');
			}
			if(count($carRentList->carList) == 0){
        echo "<h1>No Rented Cars!<h1>";        
    }else{
			echo "<table border>";
    echo "<tr><th id='mainheader' colspan='5'><p> Car List: </p></th></tr>";
	echo "<tr><th>id</th>
	          <th>name</th>
			  <th>rented by</th>
			  <th>number of days</th>
			  <th>date</th>
		</tr>";
		foreach($carRentList->carList as $key=>$value){
			if($value->isRented == true){
				$client=$carRentList->getClientById($value->clientId);
				echo "<td >".$value->id."</td>";
				echo "<td >".$value->name."</td>";
				echo "<td >".$client->firstName." ".$client->lastName."</td>";
				echo "<td >".$value->rentDays."</td>";
				echo "<td >".$value->rentDate."</td>";
				echo "<tr >";
			}
		}
		
	echo "</table>";}
		echo "<br>";			
?>
<button type='submit' name='menu' id="main-button">Main Menu</button>
</form>
</body>
</html>	