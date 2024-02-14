<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "product_management_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn) {
    // echo "connected";
} else {
    echo "not connected";
}

?>