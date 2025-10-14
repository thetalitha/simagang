// Smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// Nav background on scroll
window.addEventListener('scroll', function() {
    const nav = document.querySelector('nav');
    if (window.scrollY > 100) {
        nav.style.background = 'rgba(255, 255, 255, 0.98)';
        nav.style.backdropFilter = 'blur(15px)';
    } else {
        nav.style.background = 'rgba(255, 255, 255, 0.95)';
        nav.style.backdropFilter = 'blur(10px)';
    }
});

// Intersection Observer (scroll animation)
const observerOptions = { threshold:0.1, rootMargin:'0px 0px -50px 0px' };
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

document.querySelectorAll('.about, .discover, .overview').forEach(section => {
    section.style.opacity = '0';
    section.style.transform = 'translateY(30px)';
    section.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
    observer.observe(section);
});

// Cards slider
let currentSlide = 0;
function slideCards(direction) {
    const container = document.getElementById('cardsContainer');
    const cards = container.children;
    const containerWidth = container.parentElement.offsetWidth;
    const cardWidth = 348 + 20; // card width + gap
    const cardsPerView = Math.floor(containerWidth / cardWidth);
    const maxSlide = Math.max(0, cards.length - cardsPerView);

    currentSlide += direction;
    if (currentSlide < 0) currentSlide = maxSlide;
    else if (currentSlide > maxSlide) currentSlide = 0;

    container.style.transform = `translateX(-${currentSlide * cardWidth}px)`;
}

