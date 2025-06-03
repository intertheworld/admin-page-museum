<?php

include 'dbh.php';
$id = $_POST['id'];
$response = array();

$sql = "SELECT * FROM `andrii_qr_codes` WHERE `id` = ?";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $id);
$statement->execute();
$result = $statement->get_result();

//dupliceren 
if ($row = $result->fetch_assoc()) {
    $newId = generate_uuid_v4();
    $title = $row['title'];
    $content = $row['content'];
    $era = $row['era'];
    $img = $row['img'];
    $qr_code = $row['qr_code'];
    $duplicateSql = "INSERT INTO `andrii_qr_codes` (`id`, `title`, `content`, `era`, `img`, `qr_code`)
                  VALUES (?, ?, ?, ?, ?, ?)";
    $duplicateStatement = $conn->prepare($duplicateSql);
    $duplicateStatement->bind_param('ssssss', $newId, $title, $content, $era, $img , $qr_code);
    $duplicateStatement->execute();
    
    echo json_encode($response);
}




?>