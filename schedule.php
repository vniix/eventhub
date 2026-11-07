<?php
/*
 * schedule.php — Schedule
 * Owner: Lama (لمى)
 *
 * This is a STARTER file. Replace the yellow box below with your page.
 * Keep the header include at the top and the footer include at the bottom.
 */
// require_once "db.php";   // add it if this page reads from the database

$pageTitle  = "Schedule";
$activePage = "schedule";
// $extraCss = "css/schedule.css";   // optional: your own CSS file for this page
include "includes/header.php";
?>

<section class="section">
    <div class="container">
        <h1>Schedule</h1>

        <!-- ================= START: Lama's work ================= -->
        <div class="todo-box" dir="rtl">
            <p><strong>هذي صفحة لمى 👩🏻‍💻</strong> — الملف: <code>schedule.php</code></p>
            <ul>
                <li>الجدول الأول: برنامج اليوم (Time / Session / Speaker / Hall)</li>
                <li>الجدول الثاني: أنواع التذاكر (Student / General / VIP)</li>
                <li>استخدمي class="data-table" داخل div class="table-box" عشان يتمرر على الجوال</li>
                <li>تأثير hover على الصفوف جاهز في style.css</li>
            </ul>
        </div>
        <!-- ================= END: Lama's work ================= -->

    </div>
</section>

<?php include "includes/footer.php"; ?>
