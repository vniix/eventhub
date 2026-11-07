<?php
/*
 * add_event.php — Add event
 * Owner: Dana (دانه)
 *
 * This is a STARTER file. Replace the yellow box below with your page.
 * Keep the header include at the top and the footer include at the bottom.
 *
 * Main SQL for this page:
 *     INSERT INTO events (title, description, category, event_date, start_time, location, image, seats) VALUES (?, ?, ?, ?, ?, ?, ?, ?)
 */
require_once "db.php";

$pageTitle  = "Add event";
$activePage = "dashboard";
// $extraCss = "css/add_event.css";   // optional: your own CSS file for this page
include "includes/header.php";
?>

<section class="section">
    <div class="container">
        <h1>Add event</h1>

        <!-- ================= START: Dana's work ================= -->
        <div class="todo-box" dir="rtl">
            <p><strong>هذي صفحة دانه 👩🏻‍💻</strong> — الملف: <code>add_event.php</code></p>
            <ul>
                <li>نموذج إضافة فعالية بكل حقول جدول events</li>
                <li>INSERT INTO events ثم: header("Location: dashboard.php?msg=added");</li>
                <li>تحقق إن العنوان والوصف مو فاضيين</li>
            </ul>
        </div>
        <!-- ================= END: Dana's work ================= -->

    </div>
</section>

<?php include "includes/footer.php"; ?>
