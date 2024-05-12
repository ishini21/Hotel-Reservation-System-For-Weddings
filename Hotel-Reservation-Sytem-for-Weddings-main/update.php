<?php
include 'connect.php';

$id=$_GET['updateid'];
$sql="SELECT * from 'user' where id=$id";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

$firstname=$row['FirstName'];
$lastname=$row['LastName'];
$email=$row['Email'];
$nic=$row['NIC'];
$ptype=$row['Package'];
$pnumber=$row['PhoneNumber'];
$rdate=$row['date'];

if (isset($_POST['submit'])){
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$email=$_POST['email'];
$nic=$_POST['number'];
$package=$_POST['type'];
$pnumber=$_POST['pnumber'];
$rdate=$_POST['date'];

$sql="UPDATE 'user' set id=$id,fname='$firstname',lname='$lastname',email='$email',number=$nic,type='$package',pnumber='$pnumber',date='$rdate'
where id=$id";
$result=mysqli_query($conn,$sqli);
if($result){
    echo"Updated successfully";
}else{
    die(mysqli_error($conn));
}
}

?>
<!DOCTYPE html>
<html>
    <head>

        <title>Wedding Reservation</title>

    <link rel="stylesheet" href="pkg_style.css">
    </head>

    <body>

    <div class="heading">
        WEDDING RESERVATION
        </div>

    <br>
    
    <div class="container">   
        <form action="wdp.php" method="POST">

    <p10>First Name</p10>
    <p10><input type="text" name="fname" required="true" value=<?php
    echo $firstname;?>
    ></p10>

    <p10>Last Name</p10>
    <p10><input type="text" name="lname"  required="true" value=<?php
    echo $lastname;?>></p10>

    <br>
    <br>

    <p10>Email</p10>
    <p10><input type="text" name="email"  required="true" value=<?php
    echo $email;?>></p10>

    <br>
    <br>

    <p10>NIC</p10>
    <p10><input type="text" name="number"  required="true" value=<?php
    echo $nic;?>></p10>

    <br>
    <br>

    <p10>Select a package<br>

        <select name="type" value=<?php
        echo $ptype;?>>
            <option>-Please choose an option-</option>
            <option>HERITAGE EXPERIENCE(P2390)</option>
            <option>IMPERIAL EXPERIENCE(P2050)</option>
            <option>WALEEMA PACKAGE(P3850)</option>
        </select>

    </p10>

    <br>
    <br>

    <p10>Phone Number</p10>
    <p10><input type="text" name="pnumber"  required="true" value=<?php
    echo $pnumber;?>></p10>

    <br>
    <br>

    <p10>Date</p10>
    <br>
    <p10><input type="text" name="date"  required="true" value=<?php
    echo $rdate;?>><p10>
<br>
<br> 

    <input type="submit" id="button2" value="Update">

</form>
</div>
    
</body>
    
</html>