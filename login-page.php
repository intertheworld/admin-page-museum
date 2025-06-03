<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <script src="https://kit.fontawesome.com/7ebc12740b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/login-page.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <a class="go-to-home" href="home-page.php"><i class="fa-solid fa-arrow-left-long"></i>
                <span class="header-text">Home</span>
            </a>
        </div>
        <div class="login-form">
            <h1 class="login-title">Log in</h1>
            <input type="username" placeholder="Username" id="username">
            <input type="password" placeholder="Password" id="password">
            <button class="login-btn" onclick="login()">Log in</button>
            <div class="login-error">Invalid username or password</div>
        </div>
    </div>
</body>
<script src="./js/home-page.js"></script>
<script src="./js/login-page.js"></script>

</html>