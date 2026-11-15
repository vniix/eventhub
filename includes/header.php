<?php
// includes/header.php — shared head, header and navigation menu
// Owner: Durar (درر)
//
// How to use it (top of every page):
//   $pageTitle  = "Events";
//   $activePage = "events";
//   include "includes/header.php";

if (!isset($pageTitle)) {
    $pageTitle = "EventHub";
}
if (!isset($activePage)) {
    $activePage = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> | EventHub</title>
    <link rel="icon" href="images/favicon.svg">
    <link rel="stylesheet" href="css/style.css">
    <?php
    // A page can add its own CSS file, e.g. $extraCss = "css/home.css";
    if (isset($extraCss)) {
        echo '<link rel="stylesheet" href="' . $extraCss . '">';
    }
    ?>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a href="index.php" class="logo">
            <img src="images/logo.svg" alt="EventHub logo" width="38" height="38">
            <span>EventHub</span>
        </a>

        <button class="menu-toggle" onclick="toggleMenu()" aria-label="Open menu">
            <span></span><span></span><span></span>
        </button>

        <nav class="main-nav" id="mainNav">
            <a href="index.php" <?php if ($activePage == "home") { echo 'class="active"'; } ?>>Home</a>
            <a href="events.php" <?php if ($activePage == "events") { echo 'class="active"'; } ?>>Events</a>
            <a href="schedule.php" <?php if ($activePage == "schedule") { echo 'class="active"'; } ?>>Schedule</a>
            <a href="search.php" <?php if ($activePage == "search") { echo 'class="active"'; } ?>>Search</a>
            <a href="dashboard.php" <?php if ($activePage == "dashboard") { echo 'class="active"'; } ?>>Dashboard</a>
            <a href="register.php" class="nav-cta">Register</a>
        </nav>
    </div>
</header>

<main>
