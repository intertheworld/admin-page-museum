<?php
include './dbh.php';
$html = '';

$admin = $_POST['admin'];

$sql = "SELECT * FROM `andrii_qr_codes`";
$statement = $conn->prepare($sql);
$statement->execute();
$result = $statement->get_result();

if ($admin == 'true') {
    $html .= '<table class="table table-striped table-bordered">
        <tr>
            <th>Qr-code</th>
            <th>Foto</th>
            <th>Titel</th>
            <th>Content</th>
            <th>Era</th>
            <th>Bewerken</th>
            <th>Dupliceren</th>
            <th>Verwijderen</th>
        </tr>';
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>
        <td><img class="qr-code" src="' . htmlspecialchars($row['qr_code']) . '" alt="QR Code" onclick="template(\'' . $row['id'] . '\')"></td>
        <td><img class="qr-code" src="' . htmlspecialchars($row['img']) . '" alt="img"></td></td> 
        <td>' .  htmlspecialchars($row['title']) . '</td>
        <td>' . htmlspecialchars($row['content']) . '</td>
        <td>' . htmlspecialchars($row['era']) . '</td>
        <td><button class="overzicht-btns fa-solid fa-pen-to-square" onclick="bewerken(\'' . $row['id'] . '\')"></button></td>
        <td><button class="overzicht-btns fa-solid fa-copy" onclick="dupliceren(\'' . $row['id'] . '\')"></button></td>
        <td><button class="overzicht-btns fa-solid fa-trash" onclick="verwijderen(\'' . $row['id'] . '\')"></button></td>
        </tr>';
    }
    $html .= '</table>';
} else if ($admin == 'false') {
    while ($row = $result->fetch_assoc()) {
        $html .= '<div class="alert"><a href="./template.php?id=' . $row['id'] . '"> ' .htmlspecialchars($row['title']) . '</a></div>';
    }
}

$response['html'] = $html;
echo json_encode($response);
