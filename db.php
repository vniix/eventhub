<?php
/*
 * db.php — Database connection
 * Owner: Durar (درر)
 *
 * Every PHP page that needs the database starts with:
 *     require_once "db.php";
 * and then uses the $conn variable.
 *
 * Default XAMPP settings: user "root", empty password.
 * If your MySQL uses a password or a different port, change ONLY your
 * local copy and do not commit it (see README → "db.php settings").
 */

$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "eventhub";

// Show clear errors while we are developing
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    mysqli_set_charset($conn, "utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("<p style='font-family:sans-serif;color:#B3261E;padding:20px'>"
      . "Database connection failed: " . htmlspecialchars($e->getMessage())
      . "<br>Check that MySQL is running in XAMPP and that you imported database/eventhub.sql.</p>");
}

/* Small helper used by all pages: safely print text inside HTML */
function e($text)
{
    return htmlspecialchars((string) $text, ENT_QUOTES, "UTF-8");
}
