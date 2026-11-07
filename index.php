<?php
/*
 * index.php — Home
 * Owner: Rania (رانيا)
 *
 * This is a STARTER file. Replace the yellow box below with your page.
 * Keep the header include at the top and the footer include at the bottom.
 *
 * Main SQL for this page:
 *     SELECT * FROM events WHERE event_date >= CURDATE() ORDER BY event_date LIMIT 3
 */
require_once "db.php";

$pageTitle  = "Home";
$activePage = "home";
// $extraCss = "css/index.css";   // optional: your own CSS file for this page
include "includes/header.php";
?>

<section class="section">
    <div class="container">
        <h1>Home</h1>

        <!-- ================= START: Rania's work ================= -->
        <div class="todo-box" dir="rtl">
            <p><strong>هذي صفحة رانيا 👩🏻‍💻</strong> — الملف: <code>index.php</code></p>
            <ul>
                <li>الصفحة الرئيسية: Slideshow للصور (3 صور أو أكثر) بـ JavaScript في ملف js/slideshow.js</li>
                <li>عرض أقرب 3 فعاليات من جدول events على شكل كروت: استخدمي class="card-grid" و class="card" الموجودة في style.css</li>
                <li>قسم التصنيفات (Tech / Business / Design / Health) بـ Flexbox</li>
                <li>الشعار والأيقونة موجودين في images/logo.svg و images/favicon.svg (تقدرين تبدلينهم بتصميمك)</li>
                <li>أضيفي صور الفعاليات في مجلد images/events/ (المطلوب 10 صور أو أكثر في الموقع كله)</li>
            </ul>
        </div>
        <!-- ================= END: Rania's work ================= -->

    </div>
</section>

<?php include "includes/footer.php"; ?>
