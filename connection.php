<?php

$servername="localhost";
$username="root";
$password="";
$dbname="Online_food_delivery";

$conn=mysqli_connect($servername,$username,$password,$dbname);


if($conn){


}else{
    echo "Connection failed".mysqli_connect_error();
}

?>