<?php
header("Content-Type: application/json");

$servername = "localhost"; 
$username = "vtnsromy_JayTech456";
$password = "#Sunset123";
$dbname = "vtnsromy_Espresso_User_DataBase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(array("error" => "Connection failed: " . $conn->connect_error)));
}


function validateCredentials($username, $password, $conn) {
    $sql = "SELECT * FROM Users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

// Handle GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['username']) && isset($_GET['password'])) {
        $username = $_GET['username'];
        $password = $_GET['password'];
        
        $isValid = validateCredentials($username, $password, $conn);
        
        if($isValid) {
            echo json_encode(array("message" => "Login successful"));
        } else {
            echo json_encode(array("message" => "Invalid username or password"));
        }
    } else {
        echo json_encode(array("message" => "Username and password parameters are required"));
    }
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $isValid = validateCredentials($username, $password, $conn);
        
        if($isValid) {
            echo json_encode(array("message" => "Login successful"));
        } else {
            echo json_encode(array("message" => "Invalid username or password"));
        }
    } else {
        echo json_encode(array("message" => "Username and password parameters are required"));
    }
}

// Close the database connection
$conn->close();
?>
