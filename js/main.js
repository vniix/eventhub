// js/main.js — shared JavaScript (loaded on every page by the footer)
// Owner: Durar (درر)

// Opens and closes the menu on the phone (the ☰ button in the header)
function toggleMenu() {
    const nav = document.querySelector("#mainNav");

    if (nav.className == "main-nav") {
        nav.className = "main-nav open";
    } else {
        nav.className = "main-nav";
    }
}

// Asks before deleting an event (the Delete buttons in dashboard.php)
// OK = delete, Cancel = stay on the page
function confirmDelete() {
    return confirm("Are you sure you want to delete this event?");
}
