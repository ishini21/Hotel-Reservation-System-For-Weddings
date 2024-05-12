<!DOCTYPE html>
<html>
    <head>
        <title>Crud operation</title>

        <link rel="stylesheet" href="pkg_style.css">

        </head>

    <body>
<div class="container1">

    <a href="reservation.php" id="b1">Add Customer</a>
   
        </div>

<table>
    <thead>
  <tr>

    <th>id</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>NIC</th>
    <th>PType</th>
    <th>Pnumber</th>
    <th>Date</th>
    <th>Action</th>

  </tr>
</thead>
  <tbody>

  <?php

    require 'connect.php';
    
    $sql="SELECT * from user";
    $result=mysqli_query($conn,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
          $id=$row['id'];
          $firstname=$row['FirstName'];
          $lastname=$row['LastName'];
          $email=$row['Email'];
          $nic=$row['NIC'];
          $ptype=$row['Package'];
          $pnumber=$row['PhoneNumber'];
          $rdate=$row['date'];

          echo'<tr>
          <td>'.$id.'</td>
          <td>'.$firstname.'</td>
          <td>'.$lastname.'</td>
          <td>'.$email.'</td>
          <td>'.$nic.'</td>
          <td>'.$ptype.'</td>
          <td>'.$pnumber.'</td>
          <td>'.$rdate.'</td>
          <td>
          <button><a href="update.php?
          updateid='.$id.'">Update</a>
          </button>
          <button><a href="delete.php?
          deleteid='.$id.'">Delete</a>
          </button>  
           
          </td>

        </tr> ';
      
        }
      
    }

    ?>
  
   
        </tbody>

        </table>

</body>

</html>