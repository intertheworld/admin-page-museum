<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum admin pagina</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>

    <style>
        * {
            /* debuging */
            /* border: 2px solid green; */
        }

        body,
        html {
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
            height: 100%;
        }

        .section {
            min-height: 100vh;
            color: white;
        }

        .first-section {
            background: linear-gradient(45deg, rgba(0, 201, 255, 1), rgba(146, 254, 157, 1));
            display: flex;
            align-items: center;
            padding: 2rem;
        }

        .second-section {
            background: linear-gradient(135deg, rgba(0, 201, 255, 1), rgba(146, 254, 157, 1));
            display: flex;
            align-items: center;
            padding: 2rem;
        }

        .home-section {
            background: linear-gradient(45deg, rgba(0, 201, 255, 1), rgba(146, 254, 157, 1));
        }

        .navigation-div {
            display: flex;
            justify-content: center;
            padding-top: 2rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 2vw;
        }

        .nav-btn {
            margin-left: 0.5rem;
            margin-right: 0.5rem;
            background-color: unset;
            border: 0;
            color: rgb(59, 90, 141);
        }

        .museumphoto {
            position: relative;
            width: 100% !important;
        }

        .museumphoto {
            position: relative;
            width: 100%;
            /* Ensure the image takes up the full width of its container */
            height: auto;
            /* Maintain the aspect ratio of the image */
            max-width: 100%;
            /* Ensure the image does not exceed the container's width */
            object-fit: cover;
        }

        @media (min-width: 100px) {
            .museumphoto {
                width: 80%;
                /* For smaller screens, reduce the image width */
                height: auto;
            }
        }

        #home-text {
            display: flex;
            align-items: center;
            color: rgb(59, 90, 141);
            font-size: 6vw;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            padding-left: 4vw;
        }

        .headerText {
            text-align: center;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: rgb(59, 90, 141);
            font-size: 4vw;
            padding-top: 2vh;
        }

        .text {
            display: flex;
            align-items: center;
            color: rgb(59, 90, 141);
            font-size: 1vw;
            font-family: 'Montserrat', sans-serif;
            padding-left: 1rem;
        }

        .h3-text {
            display: flex;
            align-items: center;
            color: rgb(59, 90, 141);
            font-size: 2.5vw;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
            padding-left: 1rem;
        }

        /* From Uiverse.io by Creatlydev */
        .btn-github {
            cursor: pointer;
            display: flex;
            gap: 0.5rem;
            border: none;

            transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
            border-radius: 0.5rem;
            font-weight: 800;
            place-content: center;

            padding: 0.75rem 1rem;
            font-size: 0.825rem;
            line-height: 1rem;

            background-color: rgba(0, 0, 0, 0.4);
            box-shadow:
                inset 0 1px 0 0 rgba(255, 255, 255, 0.04),
                inset 0 0 0 1px rgba(255, 255, 255, 0.04);
            color: #fff;
        }

        .btn-github:hover {
            box-shadow:
                inset 0 1px 0 0 rgba(255, 255, 255, 0.08),
                inset 0 0 0 1px rgba(3, 90, 252, 0.08);
            color: #03b1fc;
            transform: translate(0, -0.25rem);
            background-color: rgba(0, 0, 0, 0.5);
        }

        .accordion {
            margin: 2rem 0rem;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .accordion-item {
            border: none;
            margin-bottom: 0.5rem;
            background: transparent;
        }

        .accordion-header {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .accordion-button {
            background: transparent;
            color: rgb(59, 90, 141);
            font-weight: 700;
            font-size: 1.2rem;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            box-shadow: none;
            transition: all 0.3s ease;
        }

        .accordion-button:not(.collapsed) {
            background: rgba(0, 201, 255, 0.2);
            color: rgb(59, 90, 141);
        }

        .accordion-button:hover {
            background: rgba(0, 201, 255, 0.3);
            transform: translateY(-2px);
        }

        .accordion-button img {
            height: 2rem;
            width: 2rem;
            margin-right: 0.5rem;
        }

        .accordion-body {
            background: rgba(255, 255, 255, 0.95);
            color: rgb(59, 90, 141);
            font-size: 1rem;
            line-height: 1.6;
            padding: 1.5rem;
            border-radius: 0.5rem;
        }

        .accordion-button:focus {
            box-shadow: none;
            outline: none;
        }

        @media (max-width: 768px) {
            .accordion {
                margin: 1rem;
            }

            .accordion-button {
                font-size: 1rem;
            }

            .accordion-body {
                font-size: 0.9rem;
            }
        }

        /* modal */
        #museumphoto_modal {
            transition: transform 0.3s ease, opacity 0.3s ease;
            cursor: pointer;
        }

        #museumphoto_modal {
            transform: scale(1.05);
            opacity: 0.9;
        }
        .modal-content{
            background-image: url("./img/modal_background.jpg");
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="section home-section" id="home">
        <div class="container-fluid">
            <div class="navigation-div">
                <button class="nav-btn" data-target="#home">Home</button>
                <button class="nav-btn" data-target="#inleiding">Inleiding</button>
                <button class="nav-btn" data-target="#probleemstelling">Probleemstelling</button>
                <button class="nav-btn" data-target="#plan">Plan</button>
                <button class="nav-btn" data-target="#realisatie">Realisatie</button>
                <button class="nav-btn" data-target="#besluit">Besluit</button>
                <button class="nav-btn" onclick="window.open('')">GitHub</button>
            </div>
            <div class="row" style="margin-top: 4vh;">
                <div class="col-6" id="home-text">
                    Admin Pagina voor Museum
                </div>
                <div class="col-6" id="photo">
                    <img class="museumphoto" src="./img/photo.png" alt="Spel interface">
                </div>
            </div>
        </div>
    </div>

    <div class="section second-section" id="inleiding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <img class="museumphoto" src="./img/photo-2.png" alt="Spel interface">
                </div>
                <div class="col-6">
                    <div class="headerText">
                        <p>Inleiding</p>
                    </div>
                    <p class="text">Musea willen hun bezoekers beter informeren met behulp van nieuwe technologie.
                        Veel mensen vinden het moeilijk om lange beschrijvingen te lezen bij exposities.
                        Een QR-code systeem kan dit probleem oplossen door snelle en eenvoudige toegang tot informatie te bieden via smartphones.
                        Dit project was gemaakt voor “Limburg STEM’t Af”, een idee van dhr. F. Meyers, dat we verder hebben ontwikkeld.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section first-section" id="probleemstelling">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="headerText">
                        <p>Probleemstelling</p>
                    </div>
                    <p class="text">Veel oude musea gebruiken nog geen digitale hulpmiddelen, waardoor bezoekers vaak geen duidelijke uitleg krijgen bij de exposities.
                        Dit maakt het moeilijk om de inhoud te begrijpen en verlaagt de interesse.</p>
                </div>
                <div class="col-6">
                    <img class="museumphoto" src="./img/photo-3.png" alt="Spel interface">
                </div>
            </div>
        </div>
    </div>

    <div class="section second-section" id="plan">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <img class="museumphoto" src="./img/photo-4.png" alt="Spel interface">
                </div>
                <div class="col-6">
                    <div class="headerText">
                        <p>Plan van aanpak</p>
                    </div>
                    <p class="h3-text" style="font-size: 1.5vw;">Website structuur bedenken:</p>
                    <p class="text">Maak een website met een admin-paneel om exposities en qr-codes toe te voegen en te bewerken.
                        Zorg voor een duidelijke indeling met velden voor titel, tekst, foto en tijdperk.</p>
                    <p class="h3-text" style="font-size: 1.5vw;">Bedenk hoe je technologie wilt gebruiken:</p>
                    <p class="text">Ik heb nagedacht over hoe ik de technologieën die ik ken, zoals HTML, CSS, PHP en JavaScript, kan gebruiken en hoe ze met elkaar samenwerken.</p>
                    <p class="h3-text" style="font-size: 1.5vw;">Database plannen:</p>
                    <p class="text">Denk na over hoe de database in MySQL wordt opgezet
                        om gegevens zoals titels, teksten en foto’s goed te ordenen.</p>
                    <p class="h3-text" style="font-size: 1.5vw;">Admin-pagina ontwerpen:</p>
                    <p class="text">Plan een inlogpagina voor beheerders,
                        zodat zij QR-codes kunnen toevoegen, bewerken of verwijderen.</p>

                </div>
            </div>
        </div>
    </div>

    <div class="section first-section" id="realisatie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="headerText">
                        <p>Realisatie</p>
                    </div>
                    <p class="h3-text" style="font-size: 1.5vw;">Website ontwikkelen:</p>
                    <p class="text">
                        Ik heb de website gebouwd met HTML en CSS voor een responsive, mooi ontwerp.
                        PHP en JavaScript zorgen voor dynamische functies en serververbindingen.
                    <p class="h3-text" style="font-size: 1.5vw;">Database vullen:</p>
                    <p class="text">Ik heb de MySQL-database gemaakt en gevuld met expositiegegevens zoals titels en foto’s.
                        Alles is logisch opgeslagen voor snelle toegang.</p>
                    <p class="h3-text" style="font-size: 1.5vw;">Admin-login activeren:</p>
                    <p class="text">De inlogpagina voor beheerders is live met een veilige login.
                        Beheerders kunnen nu QR-codes toevoegen, bewerken of verwijderen.</p>
                    <p class="h3-text" style="font-size: 1.5vw;">Informatiepagina’s koppelen:</p>
                    <p class="text">Elke QR-code is verbonden met een pagina die tekst, foto’s en audio toont.
                        Bezoekers kunnen de informatie eenvoudig bekijken door de QR-code te scannen met hun telefoon.</p>

                </div>
                <div class="col-6" style="display: flex; justify-content: center;">
                    <img class="museumphoto" id="museumphoto_modal" src="./img/photo-5.png" alt="Spel interface"
                        style="height: 85vh; 
                        object-fit: contain;    
                        padding-top: 3rem;"
                        data-bs-toggle="modal" data-bs-target="#videoModal">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="h3-text" style="font-size: 1.5vw;">Technologieën die zijn gebruikt:</p>
                    <div class="accordion" id="accordion">
                        <!-- HTML5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    <img src="https://icon.icepanel.io/Technology/svg/HTML5.svg" alt="htmlicon">Html5
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    Dit is de basis van een website. Het is als het skelet van een huis: het geeft structuur. Met HTML5 maak je de onderdelen van een webpagina, zoals titels, tekst, afbeeldingen en video’s. Het zorgt dat alles op de juiste plek staat.
                                </div>
                            </div>
                        </div>
                        <!-- CSS3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    <img src="https://icon.icepanel.io/Technology/svg/CSS3.svg" alt="cssicon">Css3
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    Dit is de decoratie van een website. Stel je voor: je hebt een huis (HTML) en CSS3 voegt de kleuren, mooie lettertypes en opmaak toe, zoals hoe groot of klein iets is en hoe het eruitziet op je telefoon.
                                </div>
                            </div>
                        </div>
                        <!-- Bootstrap5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    <img src="https://icon.icepanel.io/Technology/svg/Bootstrap.svg" alt="bootstrap5">Bootstrap5
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    Dit is een kant-en-klare gereedschapskist voor het maken van mooie en gebruiksvriendelijke websites. Het is als een set voorgemaakte meubels die je zo in je huis kunt zetten. Bootstrap 5 helpt om knoppen, menu’s en formulieren snel te maken, die er goed uitzien en werken op elk apparaat.
                                </div>
                            </div>
                        </div>
                        <!-- JavaScript -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    <img src="https://icon.icepanel.io/Technology/svg/JavaScript.svg" alt="JavaScript">JavaScript
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    Dit voegt interactie toe aan een website, zoals de elektriciteit in een huis die lampen laat branden of deuren opent. JavaScript zorgt dat knoppen werken, formulieren controleren of een pop-up verschijnt als je ergens op klikt.
                                </div>
                            </div>
                        </div>
                        <!-- jQuery -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    <img src="https://icon.icepanel.io/Technology/svg/jQuery.svg" alt="Jquery">Jquery
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    Dit is een hulpmiddel voor JavaScript. Het maakt het makkelijker om bijvoorbeeld een animatie toe te voegen of een knop te laten reageren, zonder ingewikkelde code te schrijven.
                                </div>
                            </div>
                        </div>
                        <!-- PHP -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                    <img src="https://www.php.net/images/logos/new-php-logo.svg" alt="php" style="width: 2.5rem;">Php
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    Dit werkt op de achtergrond op de server, de computer waar de website staat. PHP zorgt ervoor dat je kunt inloggen, een bericht kunt versturen of dat de website bijvoorbeeld een lijst met producten laat zien.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="section second-section" id="besluit">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <img class="museumphoto" src="./img/photo-6.png" alt="Spel interface" style="object-fit: contain;
        max-height: 70vh;">
                </div>
                <div class="col-6">
                    <div class="headerText">
                        <p>Besluit</p>
                    </div>
                    <p class="text">
                        Dit was mijn eerste keer aan een groot project werken, wat een leuke uitdaging was. Ik heb geleerd hoe je gegevens en afbeeldingen in een database opslaat.
                        Het project helpt het museum moderner te maken en de bezoekerservaring te verbeteren.
                    </p>
                    <br>
                    <div style="display: flex; justify-content: center;">
                        <button class="btn-github"
                            onclick="window.open('https://github.com/intertheworld/admin-page-museum')">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.99992 1.33331C7.12444 1.33331 6.25753 1.50575 5.4487 1.84078C4.63986 2.17581 3.90493 2.66688 3.28587 3.28593C2.03563 4.53618 1.33325 6.23187 1.33325 7.99998C1.33325 10.9466 3.24659 13.4466 5.89325 14.3333C6.22659 14.3866 6.33325 14.18 6.33325 14C6.33325 13.8466 6.33325 13.4266 6.33325 12.8733C4.48659 13.2733 4.09325 11.98 4.09325 11.98C3.78659 11.2066 3.35325 11 3.35325 11C2.74659 10.5866 3.39992 10.6 3.39992 10.6C4.06659 10.6466 4.41992 11.2866 4.41992 11.2866C4.99992 12.3 5.97992 12 6.35992 11.84C6.41992 11.4066 6.59325 11.1133 6.77992 10.9466C5.29992 10.78 3.74659 10.2066 3.74659 7.66665C3.74659 6.92665 3.99992 6.33331 4.43325 5.85998C4.36659 5.69331 4.13325 4.99998 4.49992 4.09998C4.49992 4.09998 5.05992 3.91998 6.33325 4.77998C6.85992 4.63331 7.43325 4.55998 7.99992 4.55998C8.56659 4.55998 9.13992 4.63331 9.66659 4.77998C10.9399 3.91998 11.4999 4.09998 11.4999 4.09998C11.8666 4.99998 11.6333 5.69331 11.5666 5.85998C11.9999 6.33331 12.2533 6.92665 12.2533 7.66665C12.2533 10.2133 10.6933 10.7733 9.20659 10.94C9.44659 11.1466 9.66659 11.5533 9.66659 12.1733C9.66659 13.0666 9.66659 13.7866 9.66659 14C9.66659 14.18 9.77325 14.3933 10.1133 14.3333C12.7599 13.44 14.6666 10.9466 14.6666 7.99998C14.6666 7.1245 14.4941 6.25759 14.1591 5.44876C13.8241 4.63992 13.333 3.90499 12.714 3.28593C12.0949 2.66688 11.36 2.17581 10.5511 1.84078C9.7423 1.50575 8.8754 1.33331 7.99992 1.33331V1.33331Z"
                                    fill="currentcolor"></path>
                            </svg>
                            <span>Bekijk het op Github.</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Script voor modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var videoModal = document.getElementById('videoModal');
            var video = videoModal.querySelector('video');

            videoModal.addEventListener('hide.bs.modal', function() {
                video.pause(); // Pause the video when the modal is closed
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Add smooth scrolling to navigation buttons
            $(".nav-btn").on('click', function(event) {
                // Get the target section from the data-target attribute
                var targetSection = $(this).data('target');

                // Ensure the target section exists
                if ($(targetSection).length) {
                    // Prevent default action for the button
                    event.preventDefault();

                    // Scroll to the target section without any delay (immediate scroll)
                    $('html, body').stop(true, true).animate({
                        scrollTop: $(targetSection).offset().top
                    }, 0);
                }
            });
        });
    </script>
</body>

</html>
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Video van website</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <video controls style="width: 100%;">
                    <source src="./video/museum-1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</div>