window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    const navbarOffset = navbar.offsetTop;

    if (window.pageYOffset >= navbarOffset) {
        navbar.classList.add('fixed');
    } else {
        navbar.classList.remove('fixed');
    }
});