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
require_once "db.php";

$pageTitle  = "Events";
$activePage = "events";
// $extraCss = "css/events.css";   // optional: your own CSS file for this page
include "includes/header.php";
?>

<section class="section">
    <div class="container">
        <h1>Events</h1>

        <!-- ================= START: Rania's work ================= -->
        <div class="todo-box" dir="rtl">
            <p><strong>هذي صفحة رانيا 👩🏻‍💻</strong> — الملف: <code>events.php</code></p>
            <ul>
                <li>عرض كل الفعاليات من جدول events بحلقة while على شكل كروت (card-grid)</li>
                <li>أزرار تصنيف تفلتر الكروت: events.php?cat=Tech</li>
                <li>تأثير filter: grayscale على الصور جاهز في style.css داخل .card img</li>
                <li>زر View details في كل كرت يودي على event.php?id=رقم الفعالية</li>
                <li>تأكدي إن الصفحة تشتغل على الجوال والكمبيوتر</li>
            </ul>
        </div>
        <!-- ================= END: Rania's work ================= -->

    </div>
</section>

<?php include "includes/footer.php"; ?>
