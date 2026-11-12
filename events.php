<?php
/*
 * events.php — Events
 * Owner: Rania (رانيا)
 *
 * This is a STARTER file. Replace the yellow box below with your page.
 * Keep the header include at the top and the footer include at the bottom.
 *
 * Main SQL for this page:
 *     SELECT * FROM events ORDER BY event_date
 */
// ===== Rania: Events page (events.php) =====
require_once "db.php";

$pageTitle  = "Events";
$activePage = "events";
include "includes/header.php";

// Category from the link (events.php?cat=Tech), empty if none
$cat  = $_GET['cat'] ?? '';
$cats = ['Tech', 'Business', 'Design', 'Health'];

if (in_array($cat, $cats)) {
    // Valid category: get only its events (prepare = safe SQL)
    $stmt = $conn->prepare("SELECT * FROM events WHERE category = ? ORDER BY event_date");
    $stmt->bind_param("s", $cat);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // No category: show all events
    $cat = '';
    $result = mysqli_query($conn, "SELECT * FROM events ORDER BY event_date");
}
?>

<!-- Internal CSS: filter buttons (Flexbox) -->
<style>
    .filters { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 28px; }
    .filters a { padding: 8px 20px; border: 1px solid #C9C6BC; border-radius: 20px; background: #fff; text-decoration: none; }
    .filters a:hover, .filters a.on { background: #14213D; color: #fff; }
</style>

<div class="container section">
    <h1>All events</h1>

    <!-- Category filter buttons -->
    <div class="filters">
        <a href="events.php" class="<?php echo $cat === '' ? 'on' : ''; ?>">All</a>
        <?php foreach ($cats as $c) { ?>
            <a href="events.php?cat=<?php echo $c; ?>" class="<?php echo $cat === $c ? 'on' : ''; ?>"><?php echo $c; ?></a>
        <?php } ?>
    </div>

    <!-- Event cards in a Grid (grayscale + hover come from style.css) -->
    <div class="card-grid">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card">
            <img src="<?php echo e($row['image']); ?>" alt="<?php echo e($row['title']); ?>">
            <div class="card-body">
                <span class="cat cat-<?php echo strtolower($row['category']); ?>"><?php echo e($row['category']); ?></span>
                <h3><?php echo e($row['title']); ?></h3>
                <div class="meta">
                    <span><?php echo date('d M', strtotime($row['event_date'])); ?></span>
                    <span><?php echo e($row['location']); ?></span>
                    <span><?php echo (int)$row['seats']; ?> seats</span>
                </div>
                <a class="btn btn-dark btn-sm" href="event.php?id=<?php echo (int)$row['id']; ?>">View details</a>
            </div>
        </div>
    <?php } ?>
    </div>
</div>

<?php include "includes/footer.php"; ?>