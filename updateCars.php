<html lang="en">
<head>
	<title>Update a Car</title>
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/container.css">
	<link rel="stylesheet" href="css/general.css">
</head>
<body>
	<?php 
		include('initSession.php');

		if(isset($_GET['carId'])) {
			$_SESSION['carId'] = $_GET['carId'];
		}
		
		if(isset($_POST['manage'])) {
			header("location: manageCars.php");
		}
		
		$carList = $carRentList->getCarById($_SESSION['carId']);
		
		if (isset($_POST['update'])) {
			foreach($carRentList->carList as $key=>$value) {
				if($value->id == $_SESSION['carId']) {
					$value->id = $_POST['newid'];
					$value->name = $_POST['newname'];
					$value->horsePower = $_POST['newpower'];
					$value->seatNumber = $_POST['newnumber'];
					$value->price = $_POST['newprice'];
					unset($_SESSION['carId']);
					header("location: manageCars.php");
				}
			}
		}
	?>

	<form method='post' action='updateCars.php'>
	<div class='container'>
		<label>id:</label> <input type="text" name="newid" value="<?php echo $carList->id ?>">

		<label>name:</label> <input type="text" name="newname" value="<?php echo $carList->name ?>">

		<label>horse power:</label> <input type="text" name="newpower" value="<?php echo $carList->horsePower ?>">

		<label>seats number:</label> <input type="text" name="newnumber" value="<?php echo $carList->seatNumber ?>">

		<label>price:</label> <input type="text" name="newprice" value="<?php echo $carList->price ?>">

		
		<button id='upper-button' type="submit" name="manage" value="manage">Back to Manage</button>
		<button type="submit" name="update" value="update">Update</button>
	</div>
	</form>
</body>
</html>
