<?php
include 'connection.php';
$user_id = $_POST["user_id"];
$s_device_token = $_POST["device_token"];
$query = "UPDATE tbl_user SET s_device_token = '".$s_device_token."' WHERE user_id = $user_id";
if(mysqli_query($db, $query)){
    echo "success";
}else echo "failed";

?>