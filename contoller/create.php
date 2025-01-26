<?php
include '../model/connection.php';
session_start();

if(isset($_GET['email']) && isset($_GET['password'])) {
    $password = md5($_GET['password']);
    $email = $_GET['email'];
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Fetch user data
        $user = mysqli_fetch_assoc($result);
        
        // Save user data to the session
        $_SESSION['user_id'] = $user['userID'];
        $_SESSION['user_email'] = $user['email'];
       // Assuming there's a 'name' column in your users table

        // Return success message
        $response['message'] = "Login successful";
        $response['user'] = [
            'id' => $user['userID'],
            'email' => $user['email'],
            'name' => $user['name']
        ];
        echo json_encode($response);
    } else {
        // Return error message
        $response['message'] = "Login not successful: Invalid credentials";
        echo json_encode($response);
    }
} else {
    $response['message'] = "Invalid request";
    echo json_encode($response);
}
?>
