
<?php
include 'dbh.php';
$file = $_FILES['file'] ?? null;
$response = array();
if ($file) {
    $fileName = $_FILES['file']['name'];
    // Check file size
    if ($file["size"] > 25000000) {
        $response[1] = 'Bestand is te groot';
        exit();
    }
    // eventueel andere controle
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    // Valid file extensions
    // $name = basename($file["name"]);
    $imgName = generate_uuid_v4();
    
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/admin-page-museum/images/img/';
    move_uploaded_file($file["tmp_name"], "$target_dir/$imgName." . $fileExtension);
    $imgPath = "/admin-page-museum/images/img/$imgName." . $fileExtension;

    $id = generate_uuid_v4();

    $title = $_POST['title'] ?? '';
    $tijdperk = $_POST['tijdperk'] ?? '';
    $content = $_POST['text'] ?? '';
    
    $qr_code_url = "https://api.qrserver.com/v1/create-qr-code/?data=https://admin-page-museum/template.php?id=$id&size=150x150";
    $sql = "INSERT INTO `andrii_qr_codes` (`id`, `title`, `content`, `era`, `img`, `qr_code`)
        VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $id, $title, $content, $tijdperk, $imgPath, $qr_code_url);
    $stmt->execute();
}
echo json_encode($response);
?>