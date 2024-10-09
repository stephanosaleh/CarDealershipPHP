<?php
include("class.php");

session_start();
if(!isset($_SESSION["CarRent"])){
    $_SESSION["CarRent"] = new CarRent();

}
$carRentList = $_SESSION["CarRent"];
?>+