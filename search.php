<?php
/*
 * search.php — Search events
 * Owner: Durar (درر)
 * Uses: events table (title, description, category, event_date, location, image)
 */
require_once "db.php";

$q        = trim($_GET["q"] ?? "");
$category = trim($_GET["category"] ?? "");
$searched = ($q !== "" || $category !== "");
$results  = [];

if ($searched) {
    $sql    = "SELECT * FROM events WHERE (title LIKE ? OR description LIKE ? OR location LIKE ?)";
    $like   = "%" . $q . "%";
    $types  = "sss";
    $params = [$like, $like, $like];

    if ($category !== "") {
        $sql     .= " AND category = ?";
        $types   .= "s";
        $params[] = $category;
    }
    $sql .= " ORDER BY event_date";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, $types, ...$params);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $results[] = $row;
    }
}

// Category list for the drop-down (taken from the database)
$categories = [];
$catResult = mysqli_query($conn, "SELECT DISTINCT category FROM events WHERE category <> '' ORDER BY category");
while ($c = mysqli_fetch_assoc($catResult)) {
    $categories[] = $c["category"];
}

// Highlight the searched word inside a text
function highlight($text, $word)
{
    $safe = e($text);
    if ($word === "") {
        return $safe;
    }
    return preg_replace("/(" . preg_quote(e($word), "/") . ")/i", "<mark>$1</mark>", $safe);
}

$pageTitle  = "Search";
$activePage = "search";
include "includes/header.php";
?>

<section class="section">
    <div class="container">
        <h1>Search events</h1>
        <p class="page-intro">Search by event name, description or location.</p>

        <form class="search-bar" method="GET" action="search.php">
            <label for="q" class="muted" style="position:absolute;left:-9999px">Search word</label>
            <input type="search" id="q" name="q" placeholder="e.g. workshop" value="<?php echo e($q); ?>">

            <label for="category" class="muted" style="position:absolute;left:-9999px">Category</label>
            <select id="category" name="category">
                <option value="">All categories</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?php echo e($cat); ?>" <?php echo $cat === $category ? "selected" : ""; ?>>
                        <?php echo e($cat); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn">Search</button>
        </form>

        <?php if ($searched): ?>
            <p class="muted">
                <strong style="color:var(--navy)"><?php echo count($results); ?> result<?php echo count($results) === 1 ? "" : "s"; ?></strong>
                <?php if ($q !== ""): ?> for “<?php echo e($q); ?>”<?php endif; ?>
                <?php if ($category !== ""): ?> in <?php echo e($category); ?><?php endif; ?>
            </p>

            <?php if (count($results) === 0): ?>
                <div class="empty">No events match your search. Try another word or category.</div>
            <?php else: ?>
                <div class="result-list">
                    <?php foreach ($results as $event): ?>
                        <article class="result-item">
                            <img src="<?php echo e($event["image"] ?: "images/events/placeholder.svg"); ?>" alt="<?php echo e($event["title"]); ?>">
                            <div class="grow">
                                <h3><?php echo highlight($event["title"], $q); ?></h3>
                                <div class="meta">
                                    <span><?php echo e(date("d M Y", strtotime($event["event_date"]))); ?></span>
                                    <span><?php echo e($event["location"]); ?></span>
                                    <span class="cat cat-<?php echo e(strtolower($event["category"])); ?>"><?php echo e($event["category"]); ?></span>
                                </div>
                            </div>
                            <a class="btn btn-dark btn-sm" href="event.php?id=<?php echo (int) $event["id"]; ?>">View</a>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="empty">Type a word above and press Search.</div>
        <?php endif; ?>
    </div>
</section>

<?php include "includes/footer.php"; ?>
