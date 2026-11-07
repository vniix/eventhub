<?php
/*
 * success.php — Registration successful
 * Owner: Lana (لانا)
 *
 * This is a STARTER file. Replace the yellow box below with your page.
 * Keep the header include at the top and the footer include at the bottom.
 *
 * Main SQL for this page:
 *     SELECT r.*, e.title, e.event_date FROM registrations r JOIN events e ON r.event_id = e.id WHERE r.id = ?
 */
require_once "db.php";

$pageTitle  = "Registration successful";
$activePage = "register";
// $extraCss = "css/success.css";   // optional: your own CSS file for this page
include "includes/header.php";
?>

<section class="section">
    <div class="container">
        <h1>Registration successful</h1>

        <!-- ================= START: Lana's work ================= -->
        <div class="todo-box" dir="rtl">
            <p><strong>هذي صفحة لانا 👩🏻‍💻</strong> — الملف: <code>success.php</code></p>
            <ul>
                <li>رسالة نجاح واضحة (class="alert alert-success")</li>
                <li>ملخص التسجيل من قاعدة البيانات حسب success.php?id=</li>
                <li>روابط للرجوع للفعاليات وللرئيسية</li>
            </ul>
        </div>
        <!-- ================= END: Lana's work ================= -->

    </div>
</section>

<?php include "includes/footer.php"; ?>
