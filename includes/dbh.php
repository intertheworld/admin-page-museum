<?php
// $hostname = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'museum';

$hostname = '160.153.132.203';
$username = 'gip_museum';
$password = '9&b-AZ.JWMCo(oz';
$database = 'gip_museum';

$conn = mysqli_connect($hostname, $username, $password, $database);
function generate_uuid_v4()
{
    // Generate 16 random bytes
    $data = random_bytes(16);

    // Set the version to 0100 (UUID v4)
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set the variant to 10xx (RFC 4122 variant)
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Convert binary data to hexadecimal representation and format it as a UUID
    return sprintf(
        '%08s-%04s-%04s-%04s-%12s',
        bin2hex(substr($data, 0, 4)),
        bin2hex(substr($data, 4, 2)),
        bin2hex(substr($data, 6, 2)),
        bin2hex(substr($data, 8, 2)),
        bin2hex(substr($data, 10, 6))
    );
}

?>