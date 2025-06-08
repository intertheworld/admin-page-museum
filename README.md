# Admin-page-museum
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

Dit is een webapplicatie voor een museum. Beheerders kunnen QR-codes aanmaken, bewerken en verwijderen om informatie over tentoonstellingen te tonen. Gebruikers kunnen QR-codes scannen om details te zien, zoals titel, tekst, tijdperk en afbeeldingen. De applicatie heeft een inlogpagina, een adminpaneel en een tekst-naar-spraak functie om informatie voor te lezen.

## Inhoud
- [Hoe werkt het?](#hoe-werkt-het)
- [Installatie](#installatie)
- [Gebruik](#gebruik)
- [Projectstructuur](#projectstructuur)
- [Vereisten](#vereisten)
- [Licentie](#licentie)

## Hoe werkt het?
- Beheerders loggen in via een inlogpagina.
- In het adminpaneel kunnen ze QR-codes toevoegen, bewerken, dupliceren of verwijderen.
- Elke QR-code bevat informatie zoals een titel, tekst, tijdperk en een afbeelding.
- Bezoekers scannen een QR-code en zien de tentoonstellingsinformatie op een speciale pagina.
- Met de tekst-naar-spraak functie kun je de tekst laten voorlezen, met opties om te pauzeren, hervatten, vooruit of achteruit te gaan.
- De interface gebruikt Bootstrap en Font Awesome voor een moderne uitstraling.

## Installatie
Volg deze stappen om het project lokaal te draaien:

1. **Kloon de repository**:  
   ```
   git clone https://github.com/intertheworld/admin-page-museum.git
   ```
2. **Ga naar de projectmap**:  
   ```
   cd admin-page-museum
   ```
3. **Installeer een lokale server**:  
   - Gebruik een webserver zoals XAMPP, WAMP of MAMP om PHP te draaien.
   - Plaats de projectmap in de webservermap (bijvoorbeeld `htdocs` voor XAMPP).
4. **Configureer de database**:  
   - Maak een MySQL-database aan met de naam `museum`.
   - Maak een tabel `andrii_qr_codes` met kolommen: `id` (varchar), `title` (varchar), `content` (text), `era` (varchar), `img` (varchar), `qr_code` (varchar).
   - Maak een tabel `andrii_users` met kolommen: `id` (varchar), `username` (varchar), `password` (varchar), `admin` (tinyint).
   - Werk de databaseverbinding bij in `includes/dbh.php` (gebruik de juiste `$hostname`, `$username`, `$password`, `$database`).
5. **Start de server**:  
   - Open de applicatie in je browser via `http://localhost/admin-page-museum/home-page.php`.
6. **Let op**: Zorg dat de map `images/img/` bestaat voor het opslaan van afbeeldingen.

## Gebruik
1. Open `home-page.php` in je browser.
2. Log in als beheerder via de inlogpagina (`login-page.php`).
3. In het adminpaneel (`admin-museum.php`):
   - Klik op "Nieuwe QR-code" om een QR-code toe te voegen.
   - Vul titel, tekst, tijdperk en een afbeelding in.
   - Bewerk of verwijder bestaande QR-codes via de tabel.
4. Bezoekers kunnen QR-codes scannen om tentoonstellingsinformatie te zien (`template.php`).
5. Gebruik de tekst-naar-spraak functie om de tekst te laten voorlezen.
6. Klik op "Log out" om uit te loggen.

## Projectstructuur

Hier is een overzicht van de belangrijkste bestanden en mappen:
```
Museum-QR-Code/
├── includes/                    # Back-end PHP-bestanden
│   ├── add-qr-code.php          # Voegt nieuwe QR-codes toe
│   ├── dbh.php                  # Databaseverbinding en UUID-generatie
│   ├── duplicate-qr-code.php    # Dupliceert een QR-code
│   ├── log-out.php              # Behandelt uitloggen
│   ├── get-content.php          # Haalt tentoonstellingsinformatie op
│   ├── edit-qr-code.php         # Bewerk QR-codes
│   ├── login-page.php           # Verwerkt inlogverzoeken
│   └── delete-qr-code.php       # Verwijder QR-codes en afbeeldingen
├── js/                          # Front-end JavaScript-bestanden
│   ├── add-qr-code.js           # Verstuurt formulier voor nieuwe QR-codes
│   ├── template.js              # Tekst-naar-spraak functionaliteit
│   ├── home-page.js             # Laadt tentoonstellingen en navigatie
│   ├── get-content.js           # Beheert QR-codegegevens in adminpaneel
│   ├── qr-code-edit.js          # Verstuurt formulier voor bewerken QR-codes
│   └── login-page.js            # Verwerkt inlogformulier
├── style/                       # CSS-bestanden
│   ├── home-page.css            # Stijlen voor startpagina
│   └── museum.css               # Stijlen voor adminpaneel
├── images/img/                  # Map voor geüploade afbeeldingen
├── home-page.php                # Startpagina met lijst van tentoonstellingen
├── admin-museum.php             # Adminpaneel voor QR-codebeheer
├── add-qr-code.php              # Formulier voor toevoegen QR-codes
├── qr-code-edit.php             # Formulier voor bewerken QR-codes
├── template.php                 # Toont tentoonstellingsdetails via QR-code
├── LICENSE                      # MIT-licentie
└── README.md                    # Dit bestand
```

## Vereisten
- **Back-end**:
  - PHP 7.4 of hoger
  - MySQL-database
  - Webserver (bijvoorbeeld XAMPP, WAMP of MAMP)
- **Front-end**:
  - Een moderne webbrowser (zoals Chrome, Firefox of Edge)
  - Internetverbinding voor externe bibliotheken (Bootstrap, jQuery, Font Awesome, Trumbowyg)
- **Afhankelijkheden**:
  - Bootstrap 5.0.2
  - jQuery 3.7.1
  - Font Awesome
  - Trumbowyg (voor tekstbewerking)

## Licentie
Dit project heeft een MIT-licentie. Zie het bestand `LICENSE` voor meer informatie.

