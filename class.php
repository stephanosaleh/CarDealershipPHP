<?php
class Client{
    public $id;
    public $firstName;
    public $lastName;
    

    function __construct($firstName, $lastName){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->id = uniqid();
    }

}

class Car{
    public $id;
    //client id renting the car
    public $clientId;
    public $name;
    public $horsePower;
    public $seatNumber;
    public $price;
    //a boolean variable that indicate if a car is rented or not
    public $isRented = false;
    //when a car is created it`s not rented thus null
    public $rentDate = null;
    public $rentDays = null;

    public function __construct($id, $name, $horsePower, $seatNumber, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->horsePower = $horsePower;
        $this->seatNumber = $seatNumber;
        $this->price = $price;
    }
    function freeCar(){
        $this->isRented = false;
        $this->rentDate = null;
        $this->rentDays = null;
        $this->clientId = null;
    }
}

class CarRent{
    public $carList;
    public $clientList;

    function getCarList(){
        return $this->carList;
    }
    function getFreeCarsList(){
        $cars = Array();
        foreach($this->carList as $value){
            if($value->isRented == false){
                $cars[] = $value;
            }
        }
        return $cars;
    }
	function getRentedCarsList(){
	$carsrented = Array();
	foreach($this->carList as $value){
		if($value->isRented == true){
			$carsrented[] = $value;
		}
	}
	}
    function getClientList(){
        return $this->clientList;
    }
    function addCar($car){
        $this->carList[] = $car;
    }
    function addClient($client){        
        $this->clientList[] = $client;
    }
    function deleteClientByIndex($index){
        //implement a way to free all of the client cars when the client is deleted
        $clientId = $this->clientList[$index]->id;
        foreach($this->carList as $value){
            if($value->clientId == $clientId){
                $value->freeCar();
            }
        }
        unset($this->clientList[$index]);
    }
    function deleteCarByIndex($index){
        unset($this->carList[$index]);
    }
    function getCarById($carId){
        foreach($this->carList as $value){
            if($value->id == $carId){
                return $value;
            }
        }
    }
    function getClientById($clientId){
        foreach($this->clientList as $value){
            if($value->id == $clientId){
                return $value;
            }
        }
    }
    function assignCar($carId, $clientId, $days, $startingDate){
        foreach($this->carList as $value){
            if($value->id == $carId){
                $value->clientId = $clientId;
                $value->isRented = true;
                $value->rentDays = $days;
                $value->rentDate = $startingDate;
            }
        }
    }
    function getCarsByClientId($clientId){
        $cars = Array();
        foreach($this->carList as $value){
            if($value->clientId == $clientId){
                $cars[] = $value;
            }
        }
        return $cars;
    }
}
?>