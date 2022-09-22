<?php
$id=$_POST['id'];
$conn=mysqli_connect('localhost','root','','contact');
$sql="SELECT * FROM `contact_us` WHERE `S_no`=$id ";
$result=mysqli_query($conn,$sql) or die("Sql query failed");
$output=mysqli_fetch_all($result,MYSQLI_ASSOC);;
echo json_encode($output);

?>