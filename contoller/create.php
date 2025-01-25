<?php
include '../model/connection.php';
session_start();

if(isset($_POST['email']) && isset($_POST['password'])) {
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Fetch user data
        $user = mysqli_fetch_assoc($result);
        
        // Save user data to the session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name']; // Assuming there's a 'name' column in your users table

        // Return success message
        $response['message'] = "Login successful";
        $response['user'] = [
            'id' => $user['id'],
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
