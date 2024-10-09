<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addClient.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/container.css">
    <link rel="stylesheet" href="css/general.css">
    <title>Add a Client</title>
</head>
<body>
    
    <?php
        include("initSession.php");        
    
        if(isset($_POST['menu'])){
            header("location: main.php");
        }else if(isset($_POST['add'])){

            if(!empty($_POST['firstName']) && !empty($_POST['lastName'])){
                $client = new Client($_POST['firstName'], $_POST['lastName']);
                $carRentList->addClient($client);
                header("location: addClient.php");      
            }            
            else{
                $errorMessage = "Please fill all of the fields";
                echo "<h1 style='color:red;'>".$errorMessage."</h1>";
            }
        }

    ?>
    <form method='post' action='addClient.php'>
<h1 id='header'>Add A Client</h1>
    <div class='container'>
    <label for='first-name'>first name:</label>
    <input type='text' name='firstName' id='first-name' placeholder="eg:bilal">

    <label for='last-name'>last name:</label>
    <input type='text' name='lastName' id='first-name' placeholder="eg:edelbi">

    </br></br><br/>
    
    <button type="submit" name="add">Add Client</button>
    <button type="submit" name="menu">Main Menu</button>
    </div>

    </form>
</body>
</html>
