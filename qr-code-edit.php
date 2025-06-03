<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qr Code Edit</title>
    <link rel="stylesheet" href="./style/qr-code-edit.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="trumbowyg/dist/ui/trumbowyg.min.css">
    <!-- Trumbowyg core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css">
    <!-- Trumbowyg plugins CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/colors/ui/trumbowyg.colors.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/table/ui/trumbowyg.table.min.css">

    <!-- Trumbowyg core JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"></script>
    <!-- Trumbowyg plugins -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/colors/trumbowyg.colors.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/table/trumbowyg.table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/langs/nl.min.js"></script>

</head>

<?php
include 'includes/dbh.php';
$id = $_GET['id'];
$sql = "SELECT * FROM `andrii_qr_codes` WHERE `id` = ?";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $id);
$statement->execute();
$result = $statement->get_result();
$row = $result->fetch_assoc();
$link = '/admin-page-museum/template.php?id=' . $id;
?>

<body>
    <input type="hidden" id="id" value="<?= $row['id'] ?>">
    <div class="form-container">
        <form class="form">
            <p class="title">Nieuwe QR-Code maken</p>

            <label>
                <input class="input" id="titel" type="text" value="<?php echo $row['title'] ?>" required="" placeholder="<?php echo $row['title'] ?>">
                <span>Titel</span>
            </label>

            <label>
                <span>QR-code</span>
                <div id="qrcode">
                    <img id="qr-code"src="https://api.qrserver.com/v1/create-qr-code/?data=<?= urlencode($link) ?>&size=150x150" alt="QR Code" title="QR Code" />
                </div>
            </label>

            <label>
                <span>Text</span>
                <div id="textID" for="text"><?php echo $row['content'] ?></div>
            </label>

            <label>
                <input class="input" id="tijdperk" type="text" value="<?php echo $row['era'] ?>" required="" placeholder="<?php echo $row['era'] ?>">
                <span>Tijdperk</span>
            </label>

            <label>
                <span>FOTO</span>
                <input class="input" id="fileId" type="file" value="" >
            </label>
        </form>
        <button type="button" class="btn btn-primary submitBTN" onclick="submit()">Opslaan</button>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#textID').trumbowyg({
            btns: [
                ['undo'],
                ['formatting'],
                ['strong', 'em', 'underline', 'del'],
                ['foreColor', 'backColor'],
                ['superscript', 'subscript'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['mathml'],
                ['highlight'],

            ],
        });
    });
</script>
<script src="./js/get-content.js"></script>
<script src="./js/qr-code-edit.js"></script>

</html>