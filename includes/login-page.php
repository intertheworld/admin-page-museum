<?php
session_start();
include './dbh.php';
$response = array();

$username = $_POST['username'];
$password = $_POST['password'];
$userExist = false;

$sql = "SELECT `id`,`username`, `password`,`admin` FROM `andrii_users` WHERE `username` = ? AND `password` =?";
$statement = $conn->prepare($sql);
$statement->bind_param('ss', $username, $password);
$statement->execute();
$result = $statement->get_result();
$row = $result->fetch_assoc();

if ($row != null) {
    $response['status'] = 'success';
    if ($row['admin'] == 1) {
        $response['admin'] = true;
    } elseif ($row['admin'] == 0) {
        $response['admin'] = false;
    }
    $_SESSION['user'] = $row['username'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['admin'] = $row['admin'];
} elseif ($row == null) {
    $response['status'] = 'error';
    $response['message'] = 'Invalid username or password';
}


echo json_encode($response)
?>