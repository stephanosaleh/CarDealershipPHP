<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/table.css">
    <title>Car rented by client</title>
</head>
<body>
    <?php
        include("initSession.php");
        if(isset($_GET['clientId'])){
            $clientId = $_GET['clientId'];
            $client = $carRentList->getClientById($clientId);

            $cars = $carRentList->getCarsByClientId($clientId);

            if(count($cars) == 0){
                echo "<h2>".$client->firstName." ".$client->lastName." has not rented any cars.</h2>";
            }else{
                echo "<table border>";
                echo "<tr><th id='mainheader' colspan='4'><h2>Car List for client:".$client->firstName." ".$client->lastName."</h2></th></tr>";
                echo "<tr><th>id</th><th>name</th><th>date</th><th>number of days</th></tr>";
                foreach($cars as $value){
                    echo "<tr>";
                    echo "<td>".$value->id."</td>";
                    echo "<td>".$value->name."</td>";
                    echo "<td>".$value->rentDate."</td>";
                    echo "<td>".$value->rentDays."</td>";
                    echo "</tr>";
                }
                echo "</table></br>";
            }        
                echo "<form action='main.php'>";
                echo "<button type='submit' name='main' id='main-button'>Main menu</button>";
                echo "</form>";
        }
    ?>
</body>
</html>
