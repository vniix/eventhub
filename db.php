<?php
// db.php — Database connection
// Owner: Durar (درر)
// Every page that needs the database starts with:  include "db.php";

$conn = mysqli_connect("localhost", "root", "", "eventhub");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// So Arabic text is saved and shown correctly
mysqli_set_charset($conn, "utf8mb4");

// e() prints text safely inside HTML (Rania's pages use it)
// Example: echo e($row["title"]);
function e($text) {
    return htmlspecialchars((string) $text);
}
?>
