// Rania: Slideshow (every 4 seconds + arrows + dots)
(function () {
    var box = document.getElementById('slideshow');
    if (!box) return;   // do nothing if the page has no slideshow

    var slides = box.querySelectorAll('.slide');
    var dotsBox = document.getElementById('dots');
    var current = 0;

    // Create one dot per slide
    slides.forEach(function (_, i) {
        var d = document.createElement('span');
        d.className = 'dot' + (i === 0 ? ' on' : '');
        d.addEventListener('click', function () { show(i); });
        dotsBox.appendChild(d);
    });

    // Show slide number n
    function show(n) {
        current = (n + slides.length) % slides.length;
        var dots = dotsBox.querySelectorAll('.dot');
        slides.forEach(function (s, i) {
            s.classList.toggle('active', i === current);
            dots[i].classList.toggle('on', i === current);
        });
    }

    // Arrows and automatic change
    document.getElementById('slideNext').addEventListener('click', function () { show(current + 1); });
    document.getElementById('slidePrev').addEventListener('click', function () { show(current - 1); });
    setInterval(function () { show(current + 1); }, 4000);
})();