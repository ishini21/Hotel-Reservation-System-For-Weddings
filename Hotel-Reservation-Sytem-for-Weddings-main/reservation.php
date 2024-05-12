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
    <p10><input type="text" name="fname" required="true"></p10>

    <p10>Last Name</p10>
    <p10><input type="text" name="lname"  required="true"></p10>

    <br>
    <br>

    <p10>Email</p10>
    <p10><input type="text" name="email"  required="true"></p10>

    <br>
    <br>

    <p10>NIC</p10>
    <p10><input type="text" name="number"  required="true"></p10>

    <br>
    <br>

    <p10>Select a package<br>

        <select name="type">
            <option>-Please choose an option-</option>
            <option>HERITAGE EXPERIENCE(P2390)</option>
            <option>IMPERIAL EXPERIENCE(P2050)</option>
            <option>WALEEMA PACKAGE(P3850)</option>
        </select>

    </p10>

    <br>
    <br>

    <p10>Phone Number</p10>
    <p10><input type="text" name="pnumber"  required="true"></p10>

    <br>
    <br>

    <p10>Date</p10>
    <br>
    <p10><input type="text" name="date"  required="true"><p10>
<br>
<br> 

    <input type="submit" id="button2" value="Submit">

</form>
</div>
    
</body>
    
</html>