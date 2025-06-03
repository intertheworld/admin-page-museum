<?php
session_start();
if (!isset($_SESSION) || !isset($_SESSION['user'])) {
    header("Location: login-page.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Museum</title>
    <link rel="stylesheet" href="./style/museum.css">
    <script src="https://kit.fontawesome.com/7ebc12740b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="body-container">
        <div class="overzicht">
        </div>
        <div class="footer-container">
            <div class="main">
                <a class="go-to-home" href="home-page.php"><i class="fa-solid fa-arrow-left-long"></i>
                    <span class="header-text">Home</span>
                </a>
                <a href="add-qr-code.php" class="custom-btn" style="margin-right: 2rem;">Nieuwe QR-code</a>
            </div>
        </div>
    </div>

</body>
<script src="./js/get-content.js"></script>

</html>