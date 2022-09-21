<?php
$text=$_POST['text'];
$conn=mysqli_connect('localhost','root','','usera');
$sql="SELECT * FROM `user_info` WHERE `name` LIKE '%{$text}%'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0)
{
    $output='<table class="tab1" border="1" width="100%" cellspacing="0" cellpadding="10px">
                <tr>
                    <th> Id </th>
                    <th> Name </th>
                    <th> Delete </th>
                    <th> update </th>
                </tr>';
    while($row=mysqli_fetch_assoc($result)){
        $output .= "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td><button class='delete-btn' data-id=".$row['id']." > Delete </button><td><button class='update-btn' data-id=".$row['id']." > Update </button> </tr>";
    }
    $output.="</table>";
    echo $output;
}
else{
    echo '<center><div style="margin-top:50px;background:red;width: 500px;line-height: 50px;  border-radius: 30px;    "> Data not Find in table</div></center>';
}
?>