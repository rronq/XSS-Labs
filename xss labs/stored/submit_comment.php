<?php
$name = $_POST['name'];
$comment = $_POST['comment'];

// Connect to the database (Replace with your database credentials)
$mysqli = new mysqli('localhost', 'dvwa', 'p@ssw0rd', 'dvwa');

// Insert the comment into the database
$query = "INSERT INTO guestbook (name, comment) VALUES ('$name', '$comment')";
$mysqli->query($query);

$fileContent = "Name: $name\nComment: $comment\n"
$fileName = 'output.txt';

file_put_contents($fileName, $fileContent, FILE_APPEND);

$response = array('success' => true);
echo json_encode($response);
?>
