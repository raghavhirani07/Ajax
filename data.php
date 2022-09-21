<?php
print_r($_POST);
$fname=$_POST['first_name'].' '.$_POST['last_name'];

// Make connection


$conn=mysqli_connect('localhost','root','','usera');
$sql="INSERT INTO `user_info` ( `name`) VALUES ('$fname');";
$result=mysqli_query($conn,$sql);
if($result){

    echo 1;
}
else{
    echo 0;
}