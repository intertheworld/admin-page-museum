<?php

include 'dbh.php';
$id = $_POST['id'];

$response = array();

$sql = "SELECT `img` FROM `andrii_qr_codes` WHERE id = ?";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $id);
$statement->execute();
$result = $statement->get_result();
if ($row = $result->fetch_assoc()) {
    $imgPath = $row['img'];
    if ($imgPath) {
        // Normalize path: remove leading slashes and invalid prefixes like 'localhost//'
        $imgPath = preg_replace('#^(https?://)?localhost/?#i', '', $imgPath); // Remove localhost
        $imgPath = ltrim($imgPath, '/\\'); // Remove leading slashes
        $fullPath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $imgPath;
        error_log("Attempting to delete image: $fullPath"); // Log for debugging
        if (file_exists($fullPath)) {
            if (unlink($fullPath)) {
                $response['image_deleted'] = 'Afbeelding succesvol verwijderd';
            } 
        } else {
            $response['warning'] = 'Afbeelding bestaat niet: ' . $fullPath;
            error_log("Image does not exist: $fullPath");
        }
    }
};
// Delete  texpositie   
$sql = "DELETE FROM `andrii_qr_codes` WHERE id = ?";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $id);
$statement->execute();

echo json_encode($response);
