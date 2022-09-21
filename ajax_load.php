<?php
if(array_key_exists('page',$_POST)){
    $page=$_POST['page'] ;
}
else{
    $page =1;
}
$limit=3;
$offset=($page - 1) * $limit;

$conn=mysqli_connect('localhost','root','','usera');
$sql="SELECT * FROM `user_info` LIMIT {$offset},{$limit}";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
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
    $sql2="SELECT * FROM `user_info` ";
    $result2=mysqli_query($conn,$sql2);
    $total_output=mysqli_num_rows($result2);
    $totalpage=ceil($total_output/$limit);
    $output.='<div class="pagination" >';

    for($i=1;$i<=$totalpage;$i++){
        $output.="<li id='{$i}' >$i</li>";
    }
    $output.='</div>';

    echo $output;

}

?>
