<?php
/*
 * edit_event.php — Edit event
 * Owner: Dana (دانه)
 *
 * This is a STARTER file. Replace the yellow box below with your page.
 * Keep the header include at the top and the footer include at the bottom.
 *
 * Main SQL for this page:
 *     UPDATE events SET title=?, description=?, category=?, event_date=?, start_time=?, location=?, image=?, seats=? WHERE id=?
 */
require_once "db.php";

$pageTitle  = "Edit event";
$activePage = "dashboard";
// $extraCss = "css/edit_event.css";   // optional: your own CSS file for this page
include "includes/header.php";
?>

<section class="section">
    <div class="container">
        <h1>Edit event</h1>

        <!-- ================= START: Dana's work ================= -->
        <div class="todo-box" dir="rtl">
            <p><strong>هذي صفحة دانه 👩🏻‍💻</strong> — الملف: <code>edit_event.php</code></p>
            <ul>
                <li>تجيب الفعالية حسب edit_event.php?id= وتعبي الحقول ببياناتها</li>
                <li>UPDATE events ... WHERE id = ? ثم: header("Location: dashboard.php?msg=updated");</li>
            </ul>
        </div>
        <!-- ================= END: Dana's work ================= -->

    </div>
</section>

<?php include "includes/footer.php"; ?>
