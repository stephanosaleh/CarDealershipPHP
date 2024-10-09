<html lang="en">
<head>
<title> Add a Car </title>
<link rel="stylesheet" href="css/container.css">
<link rel="stylesheet" href="css/addCar.css">
<link rel="stylesheet" href="css/general.css">
<link rel="stylesheet" href="css/form.css">
</head>
<body>

<?php include("initSession.php");
		
		if(isset($_POST['menu'])){
		header("location: main.php");}
		
		else if(isset($_POST['add'])){
			
			if (!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['horsepower']) && !empty($_POST['seatsnumber']) && !empty($_POST['price'])){
				$car= new Car($_POST['id'], $_POST['name'], $_POST['horsepower'], $_POST['seatsnumber'], $_POST['price']);
				$carRentList->carList[]=$car;
			}
			else {
				$errorMessage = "Fill all fields";
				echo "<h1>".$errorMessage."</h1>";
			}
			header("location: addCar.php");
		}
		?>
	<h1>Add A Car</h1>
	
	<form method='post' action='addCar.php'>
	<div class='container'>
	<label for='id'>id:</label>
	<input type='text' name='id' id='id' id='id' placeholder="eg:47">
	</br>
	<label for='name'>name:</label>
	<input type='text' name='name' id='name' id='name' placeholder='eg:Mercedes-Benz'>
	</br>
	<label for='horse'>horsepower:</label>
	<input type='text' name='horsepower' id='horsepower' id='horse' placeholder='eg:127'>
	</br>
	<label for='seat'>seatsnumber:</label>
	<input type='text' name='seatsnumber' id='seatsnumber' id='seat' placeholder='eg:4'>
	</br>
	<label for='price'>price:</label>
	<input type='text' name='price' id='price' id='price' placeholder='eg:20'>
	
	</br>
	<button type="submit" name="add" >Add Car</button>
	<button type="submit" name="menu"> Main Menu</button>
	</div>
	</form>
	
</body>
</html>	