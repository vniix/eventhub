<?php
// search.php — Search events
// Owner: Durar (درر)

include "db.php";

// 1) Read what the user typed (form uses method="get")
$q = "";
$category = "";

if (isset($_GET["q"])) {
    $q = $_GET["q"];
}
if (isset($_GET["category"])) {
    $category = $_GET["category"];
}

// 2) Search only after the user pressed the Search button
$searched = false;

if (isset($_GET["q"])) {
    $searched = true;

    // Make the text safe before putting it inside SQL
    $safeQ = mysqli_real_escape_string($conn, $q);
    $safeCategory = mysqli_real_escape_string($conn, $category);

    $sql = "SELECT * FROM events WHERE (title LIKE '%$safeQ%' OR description LIKE '%$safeQ%')";

    if ($category != "") {
        $sql = $sql . " AND category = '$safeCategory'";
    }

    $sql = $sql . " ORDER BY event_date";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
}

$pageTitle  = "Search";
$activePage = "search";
include "includes/header.php";
?>

<section class="section">
    <div class="container">
        <h1>Search events</h1>
        <p class="page-intro">Search by event name or description.</p>

        <form class="search-bar" method="get" action="search.php">
            <input type="search" name="q" placeholder="e.g. workshop" value="<?php echo htmlspecialchars($q); ?>">

            <select name="category">
                <option value="">All categories</option>
                <option value="Tech" <?php if ($category == "Tech") { echo "selected"; } ?>>Tech</option>
                <option value="Business" <?php if ($category == "Business") { echo "selected"; } ?>>Business</option>
                <option value="Design" <?php if ($category == "Design") { echo "selected"; } ?>>Design</option>
                <option value="Health" <?php if ($category == "Health") { echo "selected"; } ?>>Health</option>
            </select>

            <input type="submit" value="Search" class="btn">
        </form>

        <?php
        if ($searched == false) {
            echo '<div class="empty">Type a word above and press Search.</div>';
        } elseif ($count == 0) {
            echo '<div class="empty">No events match your search. Try another word.</div>';
        } else {
            echo '<p class="muted"><strong>' . $count . ' result(s)</strong> found.</p>';
            echo '<div class="result-list">';

            while ($row = mysqli_fetch_assoc($result)) {
                $image = $row["image"];
                if ($image == "") {
                    $image = "images/events/placeholder.svg";
                }

                echo '<div class="result-item">';
                echo '  <img src="' . $image . '" alt="' . $row["title"] . '">';
                echo '  <div class="grow">';
                echo '    <h3>' . $row["title"] . '</h3>';
                echo '    <div class="meta">';
                echo '      <span>' . $row["event_date"] . '</span>';
                echo '      <span>' . $row["location"] . '</span>';
                echo '      <span class="cat cat-' . strtolower($row["category"]) . '">' . $row["category"] . '</span>';
                echo '    </div>';
                echo '  </div>';
                echo '  <a class="btn btn-dark btn-sm" href="event.php?id=' . $row["id"] . '">View</a>';
                echo '</div>';
            }

            echo '</div>';
        }
        ?>
    </div>
</section>

<?php include "includes/footer.php"; ?>
