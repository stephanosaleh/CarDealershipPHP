<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/table.css">
	<link rel="stylesheet" href="css/search.css">
	<title>Manage Cars</title>
</head>

<body>
	<form method='Post' action='manageCars.php'>
		<fieldset>
		<legend>Search</legend>
		<div class='search'>
			<p><label class='search-label' for='id'> Search by id: </label>
			<input class='search-input' type='text' name='cid'>
			<button class='search-button' type="submit" name="selectbyid" value="selectbyid"> Search </button></p>
		</div>
		<div class='search'>
			<p><label class='search-label' for='id'> Search by name: </label>
			<input class='search-input' type='text' name='cname'>
			<button class='search-button' type="submit" name="selectbyname" value="selectbyname"> Search </button></p>
		</div>
		</fieldset>
		<br>
		<br>
		
		<br>
		<br>
		<?php

		include("initSession.php");

		if (isset($_POST['Main'])) {
			header("location: main.php");
		}

		if (isset($_POST['deleteCar'])) {
			$carIndex = $_POST['deleteCar'];
			$carRentList->deleteCarByIndex($carIndex);

			header("location: manageCars.php");
		}
		$carList = $carRentList->getCarList();
		if (count($carList) == 0) {
			echo "<h2>No Cars Registered<h2>";
		} else {
			if (isset($_POST['updateCar'])) {
				$carId = $_POST['updateCar'];

				header("location: updateCars.php?carId=" . $carId);
			}

			if ($_POST['selectbyid'] || $_POST['selectbyname']) {
				echo "<table border>";
				echo "<tr><th>id</th>
			  <th>name</th>
			  <th>seat number</th>
			  <th>price</th>
			  <th>delete</th>
			  <th>update</th>
			  </tr>";
				foreach ($carRentList->carList as $key => $value) {

					if ($_POST['cid'] == $value->id || $_POST['cname'] == $value->name) {
						echo "<tr>";
						echo "<td>" . $value->id . "</td>";
						echo "<td>" . $value->name . "</td>";
						echo "<td>" . $value->seatNumber . "</td>";
						echo "<td>" . $value->price . "</td>";
						echo "<td><button type='submit' value='" . $key . "' name='deleteCar' >Delete</button></td>";
						echo "<td><button type='submit' value='" . $value->id . "' name='updateCar' >Update</button></td>";
						echo "</tr>";
					}
				}
				echo "</table>";
			} else {
				echo "<table border >";
				echo "<tr><th>id</th>
			  <th>name</th>
			  <th>seat number</th>
			  <th>price</th>
			  <th>delete</th>
			  <th>update</th>
			  </tr>";
				foreach ($carRentList->carList as $key => $value) {
					echo "<tr>";
					echo "<td>" . $value->id . "</td>";
					echo "<td>" . $value->name . "</td>";
					echo "<td>" . $value->seatNumber . "</td>";
					echo "<td>" . $value->price . "</td>";
					echo "<td><button type='submit' value='" . $key . "' name='deleteCar' >Delete</button></td>";
					echo "<td><button type='submit' value='" . $value->id . "' name='updateCar' >Update</button></td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		}





		?>
		<button id='main-button' type="submit" name="Main" value="Main"> Main </button>
	</form>
</body>

</html>