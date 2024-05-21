<?php
header("Content-Type: application/json");

$servername = "localhost"; 
$username = "vtnsromy_JayTech456";
$password = "#Sunset123";
$dbname = "vtnsromy_Reviews";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(array("error" => "Connection failed: " . $conn->connect_error)));
}

// Function to fetch all reviews
function fetchReviews($conn) {
    $sql = "SELECT * FROM Review";
    $result = $conn->query($sql);

    $reviews = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
    }
    return $reviews;
}

// Function to add a new review
function addReview($name, $review, $conn) {
    $sql = "INSERT INTO Review (Name, Review) VALUES ('$name', '$review')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Handle GET request to fetch all reviews
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $reviews = fetchReviews($conn);
    echo json_encode($reviews);
    exit;
}

// Handle POST request to add a new review
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['name']) && isset($data['review'])) {
        $name = $data['name'];
        $review = $data['review'];
        $success = addReview($name, $review, $conn);
        if ($success) {
            echo json_encode(array("message" => "Review added successfully"));
        } else {
            echo json_encode(array("message" => "Failed to add review"));
        }
    } else {
        echo json_encode(array("message" => "Name and review parameters are required"));
    }
    exit;
}

// Close the database connection
$conn->close();
?>
