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