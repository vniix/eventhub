<?php
/*
 * includes/header.php — shared <head>, header and navigation menu
 * Owner: Durar (درر) — links between pages
 *
 * HOW TO USE (top of every page):
 *     <?php
 *     $pageTitle  = "Events";     // shown in the browser tab
 *     $activePage = "events";     // highlights the menu link
 *     include "includes/header.php";
 *     ?>
 *
 * $activePage values: home, events, schedule, search, dashboard, register
 */
$pageTitle  = $pageTitle  ?? "EventHub";
$activePage = $activePage ?? "";
$extraCss   = $extraCss   ?? "";   // optional: "css/register.css" for a page's own file

function navClass($name, $activePage)
{
    return $name === $activePage ? ' class="active"' : '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> | EventHub</title>
    <link rel="icon" type="image/svg+xml" href="images/favicon.svg">
    <link rel="stylesheet" href="css/style.css">
    <?php if ($extraCss !== ""): ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($extraCss); ?>">
    <?php endif; ?>
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a href="index.php" class="logo">
            <img src="images/logo.svg" alt="EventHub logo" width="38" height="38">
            <span>EventHub</span>
        </a>

        <button class="menu-toggle" id="menuToggle" aria-label="Open menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <nav class="main-nav" id="mainNav">
            <a href="index.php"<?php echo navClass("home", $activePage); ?>>Home</a>
            <a href="events.php"<?php echo navClass("events", $activePage); ?>>Events</a>
            <a href="schedule.php"<?php echo navClass("schedule", $activePage); ?>>Schedule</a>
            <a href="search.php"<?php echo navClass("search", $activePage); ?>>Search</a>
            <a href="dashboard.php"<?php echo navClass("dashboard", $activePage); ?>>Dashboard</a>
            <a href="register.php" class="nav-cta<?php echo $activePage === "register" ? " active" : ""; ?>">Register</a>
        </nav>
    </div>
</header>

<main>
