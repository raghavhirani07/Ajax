<?php
$conn=mysqli_connect('localhost','root','','usera');
$student_id=$_POST['id'];
$student_name=$_POST['name'];
$sql="UPDATE `user_info` SET  `name` = '$student_name' WHERE `id` = '$student_id' ";
$result=mysqli_query($conn,$sql);
if($result){
echo true;
}
else{
echo false;
}
?>