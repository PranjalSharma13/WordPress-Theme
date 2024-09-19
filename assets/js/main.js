
        const menuToggle = document.getElementById('menu-toggle');
        const mobileNav = document.getElementById('mobile-nav');
        const mainHeader = document.getElementById('main-header');

        menuToggle.addEventListener('click', function() {
            if (mobileNav.classList.contains('mobile-menu-hidden')) {
                mobileNav.classList.remove('mobile-menu-hidden');
            } else {
                mobileNav.classList.add('mobile-menu-hidden');
            }
        });

        // Hide the header when a menu item is clicked on mobile
        const menuLinks = document.querySelectorAll('#mobile-nav a');
        menuLinks.forEach(link => { link.addEventListener('click', function() {
                mobileNav.classList.add('mobile-menu-hidden');
            });
        });