<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style/home-page.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <span class="header-text">Museum</span>
            <?php
            if (!isset($_SESSION) || isset($_SESSION['user'])) {
                echo '<button class="header-btn" onclick="redirectTo(\'admin\')">Admin</button>';
                echo '<button class="header-btn" onclick="redirectTo(\'logout\')">Log out</button>';
            } else {
                echo '<button class="header-btn" onclick="redirectTo(\'login\')">Log in</button>';
            }
            ?>
        </div>
        <div class="tentoonstellingen">
        </div>
    </div>
</body>
<script src="./js/home-page.js"></script>

</html>