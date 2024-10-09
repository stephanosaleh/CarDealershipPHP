<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/container.css">
    <link rel="stylesheet" href="css/confirmRent.css">
    <link rel="stylesheet" href="css/form.css">
    <title>confirmrent</title>
</head>
<body>
    
    <form method="post" action="confirmRent.php">
<?php
    include("initSession.php");

    if(isset($_POST['main'])){
        header("location: main.php");
    } else if(isset($_POST['assign'])){
        if(!isset($_POST['client']) or !isset($_POST['selectedCar']) and !isset($_SESSION['currentCar'])){
            header("location: assignCar.php");
        } else {
            $_SESSION['currentCar'] = $_POST['selectedCar'];
            $_SESSION['currentClient'] = $_POST['client'];
        }
    }

    $selectedCar = $carRentList->getCarById($_SESSION['currentCar']); 

    $totalPrice = 0;
    $errorMessage = "";

    if(isset($_POST['days']) && isset($_POST['startingDate']) && !empty($_POST['days']) && !empty($_POST['startingDate'])){
        $days = $_POST['days'];
        $startingDate = $_POST['startingDate'];
        $totalPrice = $selectedCar->price * $days;
    } else if(isset($_POST['calculate'])) {
        $errorMessage = "<p style='color:red;'>Please fill in the number of days and starting date.</p>";
    }

    if(isset($_POST['confirm'])){
        $currentCar = $_SESSION['currentCar'];
        $currentClient = $_SESSION['currentClient'];
        $days = $_POST['days'];
        $startingDate = $_POST['startingDate'];

        
        $carRentList->assignCar($currentCar, $currentClient, $days, $startingDate);

        unset($_SESSION['currentCar']);unset($_SESSION['currentClient']);unset($_SESSION['days']);unset($_SESSION['startingDate']);
    

        // Redirect to main page 
        header("location: main.php");
    }

    echo "<div class='container'>";
    echo "<p>you have chosen car: ".$selectedCar->name."</p>";
    echo "<p>id: ".$selectedCar->id."</p>";
    echo "<p>price per day: ".$selectedCar->price."$</p>";

    echo "<p><label>number of days: </label><input name ='days' type='text' value='" . $_POST['days'] . "'></p>";
    echo "<p><label>starting at date: </label><input name='startingDate' type='date' value='" . $_POST['startingDate'] . "'></p>";

    echo "<button type='submit' name='calculate'>calculate total</button>";

    if($totalPrice > 0){
        echo "<p>total price:".$totalPrice."$</p>";        
        echo "<button type='submit' name='confirm'>Confirm</button>";
    } else {
        if($errorMessage != ""){
            echo "<p>".$errorMessage."</p>";
        }
    }
    echo "</div>";
    echo "</form>";
?>

</body>
</html>
