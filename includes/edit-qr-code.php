<?php
include 'dbh.php';

$response = array();

$id = $_GET['id'] ?? '';
$title = $_POST['title'] ?? '';
$content = $_POST['text'] ?? '';
$era = $_POST['tijdperk'] ?? '';
$file = $_FILES['file'] ?? null;

$imgPath = null;

if ($file && $file['size'] > 0) {
    $fileName = $_FILES['file']['name'];
    // Check file size
    if ($file["size"] > 25000000) {
        $response['error'] = 'Bestand is te groot';
        echo json_encode($response);
        exit();
    }

    // Get file extension
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Generate unique filename
    $imgName = generate_uuid_v4();
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/admin-page-museum/images/img/';
    $newFilePath = "$target_dir/$imgName." . $fileExtension;

    // Move the uploaded file
    if (move_uploaded_file($file["tmp_name"], $newFilePath)) {
        $imgPath = "/admin-page-museum/images/img/$imgName." . $fileExtension;
    } else {
        $response['error'] = 'Fout bij het uploaden van het bestand';
        echo json_encode($response);
        exit();
    }
}

// Prepare SQL statement (exclude qr_code from update)
$sql = "UPDATE `andrii_qr_codes` 
        SET 
        `title` = ?,
        `content` = ?,
        `era` = ?" 
        . ($imgPath ? ", `img` = ?" : "") . 
        " WHERE `id` = ?";

$stmt = $conn->prepare($sql);

if ($imgPath) {
    $stmt->bind_param("sssss", $title, $content, $era, $imgPath, $id);
} else {
    $stmt->bind_param("ssss", $title, $content, $era, $id);
}
$stmt->execute();
$response['success'] = 'Record updated successfully';
echo json_encode($response);
?>