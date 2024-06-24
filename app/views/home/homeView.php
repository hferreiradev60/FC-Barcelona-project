<!DOCTYPE html>
<html lang="fr">

<?php
include __DIR__ . '../../partials/head.php';
include __DIR__ . '../../partials/header.php';
?>

<body>
    <section id="carouselSection">
        <div id="carousel">
            <div class="carousel-container">
                <div class="carousel-item active">
                    <img src="/fcb/public/img/slide1.png" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="/fcb/public/img/slide2.jpg" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="/fcb/public/img/slide3.jpg" alt="Slide 3">
                </div>
            </div>
            <button id="prevBtn">&lt;</button>
            <button id="nextBtn">&gt;</button>
        </div>
    </section>

    <section id="prochainsMatchs">
        <?php
        $prochainsMatchs = isset($prochainsMatchs) ? $prochainsMatchs : [];

        if ($prochainsMatchs) {
            echo '<ul id="matchsList">';

            for ($i = 0; $i < count($prochainsMatchs); $i++) {
                echo '<li>';
                if ($i === 0) {
                    echo '<div id="compteReboursSection">';
                    echo '<h2>Prochain match</h2>';
                    echo '<p id="compteRebours"></p>';
                    echo '</div>';
                } else {
                    echo '<span>' . $prochainsMatchs[$i]['dateMatch'] . ' - ' . substr($prochainsMatchs[$i]['heureMatch'], 0, 5) . '</span>';
                }
                echo '<br>';
                echo '<span>' . '<img src="' . $prochainsMatchs[$i]['logoDomicile'] . '" alt="Logo domicile" style="transform: scale(2);"></span>';
                echo '<br>';
                echo '<h1> VS </h1>';
                echo '<br>';
                echo '<span>' . '<img src="' . $prochainsMatchs[$i]['logoExterieur'] . '" alt="Logo extérieur" style="transform: scale(2);"></span>';
                echo '</li>';
            }

            echo '</ul>';
        } else {
            echo 'Aucun prochain match trouvé.';
        }
        ?>
    </section>

    <?php include __DIR__ . '../../partials/footer.php'; ?>

</body>
</html>

<script>
    //slide
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.getElementById('carousel');
        const container = document.querySelector('.carousel-container');
        const items = document.querySelectorAll('.carousel-item');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const totalItems = items.length;
        let currentIndex = 0;

        nextBtn.addEventListener('click', showNext);
        prevBtn.addEventListener('click', showPrev);

        function showNext() {
            if (currentIndex < totalItems - 1) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }
            updateCarousel();
        }

        function showPrev() {
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = totalItems - 1;
            }
            updateCarousel();
        }

        function updateCarousel() {
            const newPosition = -currentIndex * 100 + '%';
            container.style.transform = 'translateX(' + newPosition + ')';
        }

        setInterval(function () {
            showNext();
        }, 5000);
    });

    // Compte à rebours prochain match
    document.addEventListener('DOMContentLoaded', function () {
        var now = new Date();

        var prochainMatchDate = new Date('<?= $prochainMatch['dateMatch'] . ' ' . $prochainMatch['heureMatch'] ?>');

        var difference = prochainMatchDate - now;

        setInterval(function () {
            difference = prochainMatchDate - new Date();

            var jours = Math.floor(difference / (1000 * 60 * 60 * 24));
            var heures = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            var secondes = Math.floor((difference % (1000 * 60)) / 1000);

            document.getElementById('compteRebours').innerHTML =
                jours + ' JOUR(S) ' + heures + ' H ' + minutes + ' MIN ' + secondes + ' SEC';
        }, 1000);
    });
</script>
