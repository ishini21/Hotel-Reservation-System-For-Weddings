<?php

$servername="localhost";
$username="root";
$password="";
$database="reservations";

//create connection
$conn=mysqli_connect($servername,$username,$password,$database);

//check connection
if(!$conn){
    die("connection failed :" .mysqli_connect_error());
}

$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$email=$_POST['email'];
$nic=$_POST['number'];
$package=$_POST['type'];
$pnumber=$_POST['pnumber'];
$rdate=$_POST['date'];

$sql="INSERT INTO user(FirstName,LastName,Email,NIC,Package,PhoneNumber,date) values('$firstname','$lastname','$email','$nic','$package','$pnumber','$rdate')";


if (mysqli_query($conn,$sql)===TRUE) {

    echo "<script>alert('Details Added');window.location.href='display.php';</script>";
} else {
    echo "Error:" . $sql2 . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);



?>