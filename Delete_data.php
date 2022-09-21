<?php
$id=$_POST['id'];

// Make connection


$conn=mysqli_connect('localhost','root','','usera');
$sql="DELETE FROM `user_info` WHERE id={$id}";
$result=mysqli_query($conn,$sql);
if($result){

    echo true;
}
else{
    echo false;
}