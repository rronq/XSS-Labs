<?php
$mysqli = new mysqli('localhost', 'root', '', 'dvwa');

$query = "SELECT * FROM guestbook ORDER BY comment_id DESC";
$result = $mysqli->query($query);

$comments = array();
while ($row = $result->fetch_assoc()) {
    // Sanitize and escape comment data before adding it to the array
    $row['name'] = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
    $row['comment'] = htmlspecialchars($row['comment'], ENT_QUOTES, 'UTF-8');
    $comments[] = $row;
}

$response = array('comments' => $comments);
echo json_encode($response);
?>
