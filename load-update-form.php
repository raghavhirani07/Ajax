<?php
$student_id=$_POST['id'];
$conn=mysqli_connect('localhost','root','','usera');
$sql="SELECT * FROM `user_info` WHERE `id`={$student_id}";
$result=mysqli_query($conn,$sql) or die("Query don't run");
if($result)
{


    while($row=mysqli_fetch_assoc($result)){
        $name=$row['name'];
        $output = "<tr>
        <td> Full Name </td>

        <td> <input type='text' id='edit-fname' value='{$name}'></td>
        <td> <input type='text' id='edit-id' style='display:none;' value='{$row["id"]}'></td>
    </tr>

    <tr>
        <td></td>
        <td> <input type='submit' id='edit-submit' value='save'></td>
    </tr>";
    };
    echo $output;
}

?>
