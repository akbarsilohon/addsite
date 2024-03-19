const silo_flex = document.getElementById('silo_flex');
const flex_close = document.getElementById('flex_close');
const header_left = document.getElementById('header_left');
header_left.addEventListener('click', function () {
    silo_flex.classList.remove('flex100');
    silo_flex.style.position = 'fixed';
});
flex_close.addEventListener('click', function () {
    silo_flex.classList.add('flex100');
});

// Lazy Load IMG
const images = document.querySelectorAll("[data-src]");
function preloadImage(e) {
    let t = e.getAttribute("data-src");
    t && (e.src = t)
}
const imgOptions = {
    threshold: 0,
    rootMargin: "0px 0px -200px 0px"
};
imgObserver = new IntersectionObserver(((e, t) => {
    e.forEach((e => {
        e.isIntersecting && (preloadImage(e.target), t.unobserve(e.target))
    }))
}), imgOptions), images.forEach((e => {
    imgObserver.observe(e)
}));