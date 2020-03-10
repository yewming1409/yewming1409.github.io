<?php
set_time_limit(0);
ini_set('max_execution_time', 0);
$db = set_connection();
function set_connection(){
    $t_db_user_id = "root";
    $t_db_password = '';
    $db = mysqli_connect("localhost", $t_db_user_id, $t_db_password);
    mysqli_select_db($db, "notify_db");

    mysqli_query($db, "SET NAMES 'utf8'");
    mysqli_query($db, "SET CHARACTER SET utf8");
    mysqli_query($db, "SET CHARACTER_SET_CONNECTION=utf8");
    mysqli_query($db, "SET SQL_MODE = ''");
    return $db;
}
?>