<?php
include '../model/connection.php';
if($_POST['logout']){
    session_unset();
    session_destroy();
    $response['message'] = "Logout successful";
    echo json_encode($response);
}
else{
    $response['message'] = "Logout unsuccessful";
    echo json_encode($response);
}
?>