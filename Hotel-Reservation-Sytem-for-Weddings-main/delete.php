<?php
include 'connect.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "DELETE from 'user' where id=$id";
    
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "deleted successfully";
    }else{
        die(mysqli_error($conn));
    }
    
}




?>