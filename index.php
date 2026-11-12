<?php
/*
 * index.php — Home
 * Owner: Rania (رانيا)
 *
 * This is a STARTER file. Replace the yellow box below with your page.
 * Keep the header include at the top and the footer include at the bottom.
 *
 * Main SQL for this page:
 *     SELECT * FROM events WHERE event_date >= CURDATE() ORDER BY event_date LIMIT 3
 */
// ===== Rania: Home page (index.php) =====

// Connect to the database ($conn and e() come from db.php)
require_once "db.php";

// Page settings used by includes/header.php
$pageTitle  = "Home";
$activePage = "home";
$extraCss   = "css/home.css";      // my own CSS file (must match the file name)
include "includes/header.php";

// Get the 3 nearest upcoming events
$result = mysqli_query($conn,
    "SELECT * FROM events WHERE event_date >= CURDATE() ORDER BY event_date LIMIT 3");
?>

<div class="container section home-page">

    <!-- Slideshow: 3 slides, controlled by js/slideshow.js -->
    <div id="slideshow">
        <div class="slide active">
             <img src="images/events/slide1.jpg" alt="AI & Future Tech Summit">
            <div class="slide-text">
                <h1>AI &amp; Future Tech Summit</h1>
                <a href="register.php?event=1" class="btn">Register now</a>
            </div>
        </div>
        <div class="slide">
          <img src="images/events/slide2.jpg" alt="Startup Pitch Day">
            <div class="slide-text"><h2>Startup Pitch Day</h2></div>
        </div>
        <div class="slide">
           <img src="images/events/slide3.jpg" alt="UX Design Workshop">
            <div class="slide-text"><h2>UX Design Workshop</h2></div>
        </div>
        <button class="slide-btn" id="slidePrev">&#8249;</button>
        <button class="slide-btn" id="slideNext">&#8250;</button>
        <div class="dots" id="dots"></div>
    </div>

    <!-- Upcoming events: cards in a Grid -->
    <h2>Upcoming events</h2>
    <div class="card-grid">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card">
            <img src="<?php echo e($row['image']); ?>" alt="<?php echo e($row['title']); ?>">
            <div class="card-body">
                <span class="cat cat-<?php echo strtolower($row['category']); ?>"><?php echo e($row['category']); ?></span>
                <h3><?php echo e($row['title']); ?></h3>
                <div class="meta">
                    <span><?php echo date('d M Y', strtotime($row['event_date'])); ?></span>
                    <span><?php echo e($row['location']); ?></span>
                </div>
                <a class="btn btn-dark btn-sm" href="event.php?id=<?php echo (int)$row['id']; ?>">View details</a>
            </div>
        </div>
    <?php } ?>
    </div>

    <!-- Categories (Flexbox). The style="" is the Inline CSS requirement -->
    <h2 style="margin-top:40px;">Browse by category</h2>
    <div class="categories">
        <a href="events.php?cat=Tech">Tech</a>
        <a href="events.php?cat=Business">Business</a>
        <a href="events.php?cat=Design">Design</a>
        <a href="events.php?cat=Health">Health</a>
    </div>

</div>

<script src="js/slideshow.js"></script>
<?php include "includes/footer.php"; ?>