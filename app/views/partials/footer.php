<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '/head.php'; ?>

<body>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Hugo Ferreira. Tous droits réservés.</p>
        <button class="button-85"><a href="#" id="scrollToTop">&#8593;</a></button>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const scrollToTopBtn = document.getElementById('scrollToTop');

            window.addEventListener('scroll', function () {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    scrollToTopBtn.style.display = 'block';
                } else {
                    scrollToTopBtn.style.display = 'none';
                }
            });

            scrollToTopBtn.addEventListener('click', function () {
                scrollToTop(1000);
            });

            function scrollToTop(duration) {
                const start = window.pageYOffset;
                const startTime = 'now' in window.performance ? performance.now() : new Date().getTime();

                function animateScroll() {
                    const now = 'now' in window.performance ? performance.now() : new Date().getTime();
                    const elapsed = now - startTime;

                    window.scrollTo(0, easeInOutCubic(elapsed, start, -start, duration));

                    if (elapsed < duration) {
                        requestAnimationFrame(animateScroll);
                    }
                }

                function easeInOutCubic(t, b, c, d) {
                    t /= d / 2;
                    if (t < 1) return c / 2 * t * t * t + b;
                    t -= 2;
                    return c / 2 * (t * t * t + 2) + b;
                }

                requestAnimationFrame(animateScroll);
            }
        });
    </script>
</body>

</html>