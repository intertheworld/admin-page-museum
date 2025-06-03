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

<body>
    <div class="form-container">
        <form class="form">
            <p class="title">Nieuwe QR-Code maken</p>

            <label>
                <input class="input" id="titel" type="text" value="" required="" placeholder="">
                <span>Titel</span>
            </label>

            <label>
                <span>Text</span>
                <div id="textID" for="text"></div>
            </label>

            <label>
                <input class="input" id="tijdperk" type="text" value="" required="" placeholder="">
                <span>Tijdperk</span>
            </label>

            <label>
                <span>FOTO</span>
                <input class="input" id="fotoid" type="file" value="" >
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
<script src="./js/add-qr-code.js"></script>

</html>