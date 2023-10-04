<?php
// Connect to the database (Replace with your database credentials)
$mysqli = new mysqli('localhost', 'dvwa', 'p@ssw0rd', 'dvwa');

// Fetch comments from the database
$query = "SELECT * FROM guestbook ORDER BY comment_id DESC";
$result = $mysqli->query($query);

$comments = array();
while ($row = $result->fetch_assoc()) {
    $comments[] = $row;
}

$response = array('comments' => $comments);
echo json_encode($response);
?>
