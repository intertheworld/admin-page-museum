<!DOCTYPE html>
<html lang="nl">

<head>
    <?php
    include 'includes/dbh.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `andrii_qr_codes` WHERE `id` = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $id);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();

    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title'] ?></title>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./style/template.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/speech-synthesis@2.0.2/dist/speech-synthesis.min.js"></script>

</head>

<body>
    <div class="main-content">
        <div class="container">
            <h1 class="hoofdText" id="title"><?php echo $row['title'] ?> </h1>
            <div class="row" style="margin-top: 1rem;">
                <div class="col-md-6 col-12" id="foto-col">
                    <img  id="img" src="<?php echo $row['img'] ?>" alt="img">
                </div>
                <div class="col-md-6 col-12 " id="content">
                    <div class="text" id="content-text-p"><?php echo $row['content'] ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="controls-footer">
        <div class="container">
            <div class="controls-wrapper">

                <button id="playBtn" class="btn btn-primary">
                    <i class="fas fa-play"></i>
                </button>

                <button id="backwardBtn" class="btn btn-secondary" style="display: none;">
                    <i class="fas fa-backward"></i> 5
                </button>

                <button id="pauseBtn" class="btn btn-secondary" style="display: none;">
                    <i class="fas fa-pause"></i>
                </button>

                <button id="resumeBtn" class="btn btn-secondary" style="display: none;">
                    <i class="fas fa-play"></i>
                </button>

                <button id="forwardBtn" class="btn btn-secondary" style="display: none;">
                    <i class="fas fa-forward"></i> 5
                </button>


                <div class="btn-group voice-group" role="group">
                    <button type="button" class="btn btn-outline-secondary voice-btn active" data-voice="male">
                        <i class="fas fa-male"></i>
                        <span class="sr-only">Mannelijke stem</span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary voice-btn" data-voice="female">
                        <i class="fas fa-female"></i>
                        <span class="sr-only">Vrouwelijke stem</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="./js/template.js">
</script>

</html>