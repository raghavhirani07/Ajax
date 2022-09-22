<?php
$conn=mysqli_connect('localhost','root','','iforume');
$sql="SELECT * FROM `users`";
$result=mysqli_query($conn,$sql);
$arr=mysqli_fetch_all($result,MYSQLI_ASSOC);
$json_data=json_encode($arr,JSON_PRETTY_PRINT);
$file_name="My-".date("d-m-y").".json";
if(file_put_contents($file_name,$json_data)){
echo "File ".$file_name."Created";

}
else{
    echo "Some Problem accurs";
}

?>