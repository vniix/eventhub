<?php
/*
 * register.php — Register
 * Owner: Lana (لانا)
 *
 * This is a STARTER file. Replace the yellow box below with your page.
 * Keep the header include at the top and the footer include at the bottom.
 *
 * Main SQL for this page:
 *     INSERT INTO registrations (event_id, full_name, email, phone, ticket_type) VALUES (?, ?, ?, ?, ?)
 */
require_once "db.php";

$pageTitle  = "Register";
$activePage = "register";
// $extraCss = "css/register.css";   // optional: your own CSS file for this page
include "includes/header.php";
?>

<section class="section">
    <div class="container">
        <h1>Register</h1>

        <!-- ================= START: Lana's work ================= -->
        <div class="todo-box" dir="rtl">
            <p><strong>هذي صفحة لانا 👩🏻‍💻</strong> — الملف: <code>register.php</code></p>
            <ul>
                <li>نموذج فيه: full_name, email, phone, event_id (قائمة من جدول events), ticket_type</li>
                <li>تحقق JavaScript في js/validation.js: الحقول المطلوبة + صيغة الإيميل</li>
                <li>تحقق PHP مرة ثانية قبل الحفظ (filter_var للإيميل)</li>
                <li>INSERT INTO registrations ثم التحويل إلى success.php?id=رقم التسجيل</li>
                <li>رسائل الخطأ: class="alert alert-error" و class="error-text" و class="input-error" جاهزة في style.css</li>
                <li>إذا جاء الرابط register.php?event=3 خلي الفعالية رقم 3 مختارة تلقائيًا</li>
            </ul>
        </div>
        <!-- ================= END: Lana's work ================= -->

    </div>
</section>

<?php include "includes/footer.php"; ?>
