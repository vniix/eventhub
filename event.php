<?php
/*
 * event.php — Event details
 * Owner: Lama (لمى)
 *
 * This is a STARTER file. Replace the yellow box below with your page.
 * Keep the header include at the top and the footer include at the bottom.
 *
 * Main SQL for this page:
 *     SELECT * FROM events WHERE id = ?
 */
require_once "db.php";

$pageTitle  = "Event details";
$activePage = "events";
// $extraCss = "css/event.css";   // optional: your own CSS file for this page
include "includes/header.php";
?>

<section class="section">
    <div class="container">
        <h1>Event details</h1>

        <!-- ================= START: Lama's work ================= -->
        <div class="todo-box" dir="rtl">
            <p><strong>هذي صفحة لمى 👩🏻‍💻</strong> — الملف: <code>event.php</code></p>
            <ul>
                <li>تجيب الفعالية حسب الرقم: $id = (int) $_GET["id"];</li>
                <li>زر Show more يظهر ويخفي التفاصيل الكاملة بـ JavaScript (ملف js/details.js)</li>
                <li>قائمة مرتبة &lt;ol&gt; (خطوات الحضور) وقائمة غير مرتبة &lt;ul&gt; (المميزات)</li>
                <li>فيديو &lt;video controls&gt; أو صوت &lt;audio controls&gt; من مجلد media/</li>
                <li>زر Register يودي على register.php?event=رقم الفعالية</li>
                <li>تأثيرات CSS (transform / filter / transition) + التأكد من التجاوب</li>
            </ul>
        </div>
        <!-- ================= END: Lama's work ================= -->

    </div>
</section>

<?php include "includes/footer.php"; ?>
