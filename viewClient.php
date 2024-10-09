<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/general.css">
    <title>Clients</title>
</head>
<body>
    
    <form method="post" action="viewClient.php">
    <?php
    include("initSession.php");

    if(isset($_POST['deleteClient'])){
        $clientIndex = $_POST['deleteClient'];
        $carRentList->deleteClientByIndex($clientIndex);        

        header("location: viewClient.php");
    }else if(isset($_POST['displayCars'])){
        $clientId = $_POST['displayCars'];

        header("location: viewCarByClient.php?clientId=".$clientId);
    }else if(isset($_POST["menu"])){
        header("location: main.php");
    }

    $clientList = $carRentList->getClientList();
    if(count($clientList) == 0){
        echo "<h1>no clients registered!<h1>";        
    }else{
        echo "<table border>";
        echo "<tr><th id='mainheader' colspan='3'><h2>Client List:</h2></th></tr>";
        echo "<tr><th>name</th><th></th><th></th></tr>";
        foreach($clientList as $key=>$value){
            echo "<tr>";
            echo "<td>".$value->firstName." ".$value->lastName."</td>";
            echo '<td><button type="submit" value="'.$key.'" name="deleteClient">Delete</button></td>';
            echo '<td><button type="submit" value="'.$value->id.'" name="displayCars">View client`s cars</button></td>';

            echo "</tr>";
        }
        echo "</table>";
    }

    
    echo "</br><button type='submit' name='menu' id='main-button'>Main Menu</button>";
    ?>
    </form>
</body>
</html>