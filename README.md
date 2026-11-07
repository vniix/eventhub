# EventHub – Event & Conference Website

Team Project · Web Development – CS3810T · Umm Al-Qura University

---

## 👩🏻‍💻 توزيع المهام والملفات

كل وحدة تعدّل **ملفاتها هي بس**.

| الاسم | المهمة | الملفات |
|---|---|---|
| **رانيا** | الصفحة الرئيسية والفعاليات، Slideshow، الشعار والصور | `index.php` · `events.php` · `js/slideshow.js` · `images/` |
| **لمى** | تفاصيل الفعالية والجدول، القوائم، الفيديو، تأثيرات CSS | `event.php` · `schedule.php` · `js/details.js` · `media/` |
| **لانا** | التسجيل وصفحة النجاح، التحقق JS + PHP | `register.php` · `success.php` · `js/validation.js` |
| **درر** | الاتصال بقاعدة البيانات، البحث، لوحة البيانات، الروابط، الملفات المشتركة | `db.php` · `search.php` · `dashboard.php` · `includes/` · `css/style.css` · `js/main.js` |
| **دانه** | قاعدة البيانات (15+ سجل)، الإضافة والتعديل والحذف | `database/eventhub.sql` · `add_event.php` · `edit_event.php` · `delete_event.php` |

> كل صفحة فيها مربع أصفر مكتوب فيه اسم صاحبتها والمطلوب منها. امسحيه وحطي شغلك مكانه.

---

## 📁 شكل المشروع

```
eventhub/
├── index.php            رانيا
├── events.php           رانيا
├── event.php            لمى      (event.php?id=1)
├── schedule.php         لمى
├── register.php         لانا
├── success.php          لانا
├── search.php           درر    
├── dashboard.php        درر    
├── add_event.php        دانه
├── edit_event.php       دانه
├── delete_event.php     دانه
├── db.php               درر    
├── includes/
│   ├── header.php       درر    (الهيدر + القائمة)
│   └── footer.php       درر    (الفوتر + الروابط)
├── css/style.css        مشترك  
├── js/main.js           مشترك 
├── images/              الشعار + الأيقونة + صور الفعاليات (images/events/)
├── media/               الفيديو / الصوت
└── database/eventhub.sql   دانه
```

---

## 🧱 كل صفحة تبدأ وتنتهي كذا

```php
<?php
require_once "db.php";                 // إذا الصفحة تقرأ من قاعدة البيانات
$pageTitle  = "Events";                // عنوان التبويب
$activePage = "events";                // home / events / schedule / search / dashboard / register
// $extraCss = "css/events.css";       // اختياري: ملف CSS خاص بصفحتك
include "includes/header.php";
?>

   ... محتوى صفحتك هنا ...

<?php include "includes/footer.php"; ?>
```

- `$conn` هو الاتصال بقاعدة البيانات.
- `e($text)` تطبع النص بأمان داخل HTML، مثلًا: `<?php echo e($row["title"]); ?>`

---

## 🗄️ قاعدة البيانات (لا تغيرون الأسماء)

اسم القاعدة: **eventhub**

**events**
`id` · `title` · `description` · `category` · `event_date` · `start_time` · `location` · `image` · `seats`

**registrations**
`id` · `event_id` · `full_name` · `email` · `phone` · `ticket_type` · `created_at`

التصنيفات: `Tech` · `Business` · `Design` · `Health`
التذاكر: `Student` · `General` · `VIP`

**الاستيراد:** شغلي Apache و MySQL في XAMPP ← افتحي `localhost/phpmyadmin` ← **Import** ← اختاري `database/eventhub.sql` ← **Go**

> الملف فيه الحين 4 سجلات تجريبية بس. دانه تكمّلها لـ 15 سجل أو أكثر، وبعدها كل وحدة تسوي Import مرة ثانية.

---

## 🎨 الألوان والتنسيقات الجاهزة في style.css

| اللون | الكود | الاستخدام |
|---|---|---|
| Navy | `#14213D` | الهيدر والفوتر |
| Amber | `#FCA311` | الأزرار |
| Background | `#F7F6F2` | خلفية الصفحات |
| Text / Grey | `#1F2430` / `#5B6170` | النصوص |
| Tech / Business / Design / Health | `#DCE8F5` / `#F9E7C8` / `#E6E0F3` / `#DDEFE3` | التصنيفات |
| Error / Success | `#B3261E` / `#1E7A46` | الرسائل |

**Classes جاهزة:**
`container` · `section` · `card-grid` · `card` · `card-body` · `meta` · `cat cat-tech` · `btn` · `btn-dark` · `btn-outline` · `btn-danger` · `btn-sm` · `table-box` + `data-table` · `form-card` · `form-grid` · `form-group` · `alert alert-success` · `alert alert-error` · `error-text` · `input-error` · `search-bar` · `empty`

**Media queries جاهزة:** `768px` (تابلت) و `480px` (جوال).

---

## 🔗 الروابط بين الصفحات

| من | إلى |
|---|---|
| كرت فعالية (events / index / search) | `event.php?id=ID` |
| زر Register في التفاصيل | `register.php?event=ID` |
| بعد التسجيل | `success.php?id=REGISTRATION_ID` |
| أزرار الداشبورد | `add_event.php` · `edit_event.php?id=ID` · `delete_event.php?id=ID` |
| بعد الإضافة / التعديل / الحذف | `dashboard.php?msg=added` / `updated` / `deleted` |

---

## 🔁 أوامر Git

**أول مرة بس:**
```
git config --global user.name "اسمك"
git config --global user.email "ايميلك"
cd C:\xampp\htdocs
git clone رابط-المستودع
```

**كل يوم قبل ما تبدين:**
```
git pull
```

**كل ما تخلصين شغل:**
```
git add .
git commit -m "Add register form"
git push
```

⚠️ سوي `git pull` قبل `git push` دايمًا. وإذا طلع خطأ أو conflict لا تحذفين شي، صوّري الشاشة وارسليها في القروب.

الموقع يفتح على: **http://localhost/eventhub**

---

## ✅ متطلبات الدكتورة

| المتطلب | الصفحة |
|---|---|
| 7 صفحات أو أكثر + عناوين + هيدر وفوتر + قائمة تنقل | كل الصفحات |
| 10 صور أو أكثر، شعار + favicon | رانيا |
| Click to view details / Display info on click | events · event |
| نموذج + تحقق (required + email) | register |
| جدولين | schedule |
| قوائم مرتبة وغير مرتبة | event |
| روابط داخلية وخارجية | الهيدر · الفوتر |
| فيديو / صوت | event |
| CSS: inline + internal + external، أكثر من 8 ألوان، class + id، `:hover` | كل الصفحات |
| Flexbox + Grid | الهيدر · الكروت |
| viewport + 2 media queries | style.css  |
| transform · filter · transition | style.css  |
| Slideshow | index |
| MySQL 15+ سجل، 3 حقول أو أكثر | eventhub.sql |
| insert / update / delete | add · edit · delete |
| dashboard.php + بحث | dashboard  · search  |

**للتسليم:** ملف zip للمجلد كامل (مع `database/eventhub.sql`) + PDF صفحتين (الأعضاء والأدوار، المميزات، صور شاشة كمبيوتر وجوال).
