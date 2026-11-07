<?php
/*
 * delete_event.php — Delete event
 * Owner: Dana (دانه)
 *
 * This is a STARTER file. Replace the yellow box below with your page.
 * Keep the header include at the top and the footer include at the bottom.
 *
 * Main SQL for this page:
 *     DELETE FROM events WHERE id = ?
 */
require_once "db.php";

$pageTitle  = "Delete event";
$activePage = "dashboard";
// $extraCss = "css/delete_event.css";   // optional: your own CSS file for this page
include "includes/header.php";
?>

<section class="section">
    <div class="container">
        <h1>Delete event</h1>

        <!-- ================= START: Dana's work ================= -->
        <div class="todo-box" dir="rtl">
            <p><strong>هذي صفحة دانه 👩🏻‍💻</strong> — الملف: <code>delete_event.php</code></p>
            <ul>
                <li>تاخذ الرقم من delete_event.php?id=</li>
                <li>DELETE FROM events WHERE id = ? ثم: header("Location: dashboard.php?msg=deleted");</li>
                <li>رسالة التأكيد قبل الحذف جاهزة في js/main.js (زر Delete في الداشبورد)</li>
            </ul>
        </div>
        <!-- ================= END: Dana's work ================= -->

    </div>
</section>

<?php include "includes/footer.php"; ?>
