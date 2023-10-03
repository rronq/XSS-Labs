<?php
$name = $_POST['name'];
$comment = $_POST['comment'];

$mysqli = new mysqli('localhost', 'root', '', 'dvwa');

$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');

$query = "INSERT INTO guestbook (name, comment) VALUES (?,?)";
$stmt = $mysqli->prepare($query);

// Bind parameters
$stmt->bind_param('ss', $name, $comment);

// Execute the prepared statement
if ($stmt->execute()) {
    $response = array('success' => true);
    echo json_encode($response);
} else {
    $response = array('success' => false, 'error' => $mysqli->error);
    echo json_encode($response);
}

$stmt->close();
$mysqli->close();
?>
