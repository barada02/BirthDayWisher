<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'signup') {
            $name = $conn->real_escape_string(trim($_POST['name']));
            $email = $conn->real_escape_string(trim($_POST['email']));
            $password = $_POST['password'];
            
            // Basic validation
            if (empty($name) || empty($email) || empty($password)) {
                echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
                exit;
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(['status' => 'error', 'message' => 'Invalid email format']);
                exit;
            }
            
            // Check if email already exists
            $check_email = $conn->query("SELECT id FROM users WHERE email = '$email'");
            
            if ($check_email->num_rows > 0) {
                echo json_encode(['status' => 'error', 'message' => 'Email already exists']);
                exit;
            }
            
            // Hash password and insert user
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
            
            if ($conn->query($sql)) {
                $_SESSION['user_id'] = $conn->insert_id;
                $_SESSION['user_name'] = $name;
                $_SESSION['user_email'] = $email;
                
                echo json_encode(['status' => 'success', 'message' => 'Signup successful']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $conn->error]);
            }
        }
        else if ($_POST['action'] === 'login') {
            $email = $conn->real_escape_string(trim($_POST['email']));
            $password = $_POST['password'];
            
            if (empty($email) || empty($password)) {
                echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
                exit;
            }
            
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_email'] = $user['email'];
                    echo json_encode(['status' => 'success', 'message' => 'Login successful']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
            }
        }
        else if ($_POST['action'] === 'logout') {
            session_destroy();
            echo json_encode(['status' => 'success', 'message' => 'Logged out successfully']);
        }
    }
    exit;
}

// Close the connection when the script ends
$conn->close();
?>
