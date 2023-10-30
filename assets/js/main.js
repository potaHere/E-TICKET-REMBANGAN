    // Menutup navbar setelah mengklik item menu
    document.querySelectorAll(".nav-link").forEach(function (element) {
        element.addEventListener("click", function () {
            var navbar = document.querySelector(".navbar-collapse");
            if (navbar.classList.contains("show")) {
                var toggler = document.querySelector(".navbar-toggler");
                toggler.click(); // Menutup navbar
            }
        });
    });

    // go to up button
    const goToTopButton = document.getElementById('go-to-top-button');

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 100) {
        goToTopButton.style.display = 'block';
        } else {
        goToTopButton.style.display = 'none';
        }
    });

    goToTopButton.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });