/* =====================================================================
   js/main.js — shared JavaScript (loaded on every page by the footer)
   Owner: Durar (درر)

   Page-specific JavaScript goes in its own file, e.g.
   js/slideshow.js (Rania), js/details.js (Lama), js/validation.js (Lana)
   and is added with <script src="js/xxx.js"></script> in that page.
   ===================================================================== */

// Mobile menu: open / close the navigation on small screens
const menuToggle = document.getElementById("menuToggle");
const mainNav = document.getElementById("mainNav");

if (menuToggle && mainNav) {
    menuToggle.addEventListener("click", function () {
        const isOpen = mainNav.classList.toggle("open");
        menuToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    });
}

// Delete buttons: ask before deleting (used on dashboard.php)
document.querySelectorAll(".js-confirm-delete").forEach(function (link) {
    link.addEventListener("click", function (event) {
        const title = link.getAttribute("data-title") || "this event";
        if (!confirm("Delete \"" + title + "\"? This cannot be undone.")) {
            event.preventDefault();
        }
    });
});
