<?php
include 'connection.php';
$arr_return = array();
$username = "admin";
$password = "admin";
$query = "SELECT * FROM tbl_user where s_username='$username' and s_user_password='$password'";

$result = mysqli_query($db, $query);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    $arr_return["s_user_name"] = $row["s_user_name"];
    $arr_return["user_id"] = $row["user_id"];
}

// $data["s_username"] = $row["s_username"];
// if($data["s_username"]){
//     echo $data["s_username"];
// }
$test["data"][] = $arr_return;

echo json_encode($test);
mysqli_close($db);
?>