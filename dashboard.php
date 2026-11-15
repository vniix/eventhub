<?php
// dashboard.php — show all events from the database
// Owner: Durar (درر)
// The Edit / Delete / Add pages are Dana's (دانه):
//   add_event.php , edit_event.php?id=... , delete_event.php?id=...
// After each action Dana's page comes back here with ?msg=added / updated / deleted

include "db.php";

// 1) Numbers at the top
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM events");
$row = mysqli_fetch_assoc($result);
$totalEvents = $row["total"];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM registrations");
$row = mysqli_fetch_assoc($result);
$totalRegistrations = $row["total"];

$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM events WHERE event_date >= CURDATE()");
$row = mysqli_fetch_assoc($result);
$upcomingEvents = $row["total"];

// 2) Search inside the table
$q = "";
if (isset($_GET["q"])) {
    $q = $_GET["q"];
}
$safeQ = mysqli_real_escape_string($conn, $q);

$sql = "SELECT * FROM events WHERE title LIKE '%$safeQ%' OR category LIKE '%$safeQ%' ORDER BY id";
$events = mysqli_query($conn, $sql);

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

        <?php
        // 3) Message after Dana's add / edit / delete pages
        if (isset($_GET["msg"])) {
            if ($_GET["msg"] == "added") {
                echo '<div class="alert alert-success">Event added successfully.</div>';
            } elseif ($_GET["msg"] == "updated") {
                echo '<div class="alert alert-success">Event updated successfully.</div>';
            } elseif ($_GET["msg"] == "deleted") {
                echo '<div class="alert alert-success">Event deleted successfully.</div>';
            }
        }
        ?>

        <div class="stats">
            <div class="stat">
                <div class="muted">Total events</div>
                <div class="num"><?php echo $totalEvents; ?></div>
            </div>
            <div class="stat">
                <div class="muted">Registrations</div>
                <div class="num"><?php echo $totalRegistrations; ?></div>
            </div>
            <div class="stat">
                <div class="muted">Upcoming events</div>
                <div class="num"><?php echo $upcomingEvents; ?></div>
            </div>
        </div>

        <form class="search-bar" method="get" action="dashboard.php">
            <input type="search" name="q" placeholder="Search by title or category" value="<?php echo htmlspecialchars($q); ?>">
            <input type="submit" value="Search" class="btn btn-dark">
        </form>

        <div class="table-box">
            <table class="data-table">
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
                <?php
                // 4) One table row for every event
                if (mysqli_num_rows($events) == 0) {
                    echo '<tr><td colspan="7">No events found.</td></tr>';
                }

                while ($row = mysqli_fetch_assoc($events)) {
                    echo '<tr>';
                    echo '<td>' . $row["id"] . '</td>';
                    echo '<td><a href="event.php?id=' . $row["id"] . '">' . $row["title"] . '</a></td>';
                    echo '<td><span class="cat cat-' . strtolower($row["category"]) . '">' . $row["category"] . '</span></td>';
                    echo '<td>' . $row["event_date"] . '</td>';
                    echo '<td>' . $row["location"] . '</td>';
                    echo '<td>' . $row["seats"] . '</td>';
                    echo '<td><div class="actions">';
                    echo '<a class="btn btn-dark btn-sm" href="edit_event.php?id=' . $row["id"] . '">Edit</a>';
                    echo '<a class="btn btn-danger btn-sm" href="delete_event.php?id=' . $row["id"] . '" onclick="return confirmDelete()">Delete</a>';
                    echo '</div></td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</section>

<?php include "includes/footer.php"; ?>
