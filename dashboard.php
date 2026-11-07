<?php
/*
 * dashboard.php — show all events from the database
 * Owner: Durar (درر) — page, table, search, statistics
 * Dana (دانه) — the pages behind the buttons:
 *     add_event.php, edit_event.php?id=…, delete_event.php?id=…
 *   After each action Dana's page sends the user back here with:
 *     dashboard.php?msg=added | msg=updated | msg=deleted
 */
require_once "db.php";

// ---- Statistics ----
$totalEvents = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM events"))[0];
$totalRegs   = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM registrations"))[0];
$thisMonth   = mysqli_fetch_row(mysqli_query($conn,
    "SELECT COUNT(*) FROM events
     WHERE YEAR(event_date) = YEAR(CURDATE()) AND MONTH(event_date) = MONTH(CURDATE())"))[0];

// ---- Search inside the dashboard ----
$q = trim($_GET["q"] ?? "");
if ($q !== "") {
    $stmt = mysqli_prepare($conn, "SELECT * FROM events WHERE title LIKE ? OR category LIKE ? ORDER BY id");
    $like = "%" . $q . "%";
    mysqli_stmt_bind_param($stmt, "ss", $like, $like);
    mysqli_stmt_execute($stmt);
    $events = mysqli_stmt_get_result($stmt);
} else {
    $events = mysqli_query($conn, "SELECT * FROM events ORDER BY id");
}

// ---- Message after add / edit / delete ----
$messages = [
    "added"   => "Event added successfully.",
    "updated" => "Event updated successfully.",
    "deleted" => "Event deleted successfully.",
];
$msg = $_GET["msg"] ?? "";

$pageTitle  = "Dashboard";
$activePage = "dashboard";
include "includes/header.php";
?>

<section class="section">
    <div class="container">

        <div class="page-head">
            <h1>Dashboard</h1>
            <a href="add_event.php" class="btn">+ Add new event</a>
        </div>

        <?php if (isset($messages[$msg])): ?>
            <div class="alert alert-success"><?php echo $messages[$msg]; ?></div>
        <?php endif; ?>

        <div class="stats">
            <div class="stat"><div class="muted">Total events</div><div class="num"><?php echo (int) $totalEvents; ?></div></div>
            <div class="stat"><div class="muted">Registrations</div><div class="num"><?php echo (int) $totalRegs; ?></div></div>
            <div class="stat"><div class="muted">Events this month</div><div class="num"><?php echo (int) $thisMonth; ?></div></div>
        </div>

        <form class="search-bar" method="GET" action="dashboard.php">
            <label for="dq" style="position:absolute;left:-9999px">Search events</label>
            <input type="search" id="dq" name="q" placeholder="Search by title or category…" value="<?php echo e($q); ?>">
            <button type="submit" class="btn btn-dark">Search</button>
            <?php if ($q !== ""): ?><a href="dashboard.php" class="btn btn-outline">Clear</a><?php endif; ?>
        </form>

        <div class="table-box">
            <table class="data-table" id="eventsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Seats</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (mysqli_num_rows($events) === 0): ?>
                    <tr><td colspan="7" class="muted" style="text-align:center">No events found.</td></tr>
                <?php endif; ?>
                <?php while ($row = mysqli_fetch_assoc($events)): ?>
                    <tr>
                        <td><?php echo (int) $row["id"]; ?></td>
                        <td><a href="event.php?id=<?php echo (int) $row["id"]; ?>"><?php echo e($row["title"]); ?></a></td>
                        <td><span class="cat cat-<?php echo e(strtolower($row["category"])); ?>"><?php echo e($row["category"]); ?></span></td>
                        <td><?php echo e($row["event_date"]); ?></td>
                        <td><?php echo e($row["location"]); ?></td>
                        <td><?php echo (int) $row["seats"]; ?></td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-dark btn-sm" href="edit_event.php?id=<?php echo (int) $row["id"]; ?>">Edit</a>
                                <a class="btn btn-danger btn-sm js-confirm-delete"
                                   data-title="<?php echo e($row["title"]); ?>"
                                   href="delete_event.php?id=<?php echo (int) $row["id"]; ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </div>
</section>

<?php include "includes/footer.php"; ?>
