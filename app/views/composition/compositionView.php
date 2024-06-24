<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '../../partials/head.php'; ?>

<body>

    <?php include __DIR__ . '../../partials/header.php'; ?>

    <section class="composition-section">
        <div id="terrain" class="composition-section">
            <img src="/fcb/public/img/terrain.jpg" alt="Terrain du FC Barcelone">
        </div>

        <?php foreach ($effectif as $joueur) : ?>
            <div class="player-card" draggable="true" data-player="<?= htmlspecialchars($joueur['nom']) ?>">
                <img src="<?= htmlspecialchars($joueur['image']) ?>" alt="<?= htmlspecialchars($joueur['nom']) ?>">
                <p><?= htmlspecialchars($joueur['nom']) ?></p>
            </div>
        <?php endforeach; ?>

    </section>

    <?php include __DIR__ . '../../partials/footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const playerCards = document.querySelectorAll('.player-card');
            const terrain = document.getElementById('terrain');

            playerCards.forEach(card => {
                card.addEventListener('dragstart', dragStart);
                card.addEventListener('dragend', dragEnd);
            });

            terrain.addEventListener('dragover', dragOver);
            terrain.addEventListener('dragenter', dragEnter);
            terrain.addEventListener('dragleave', dragLeave);
            terrain.addEventListener('drop', drop);

            function dragStart(e) {
                e.dataTransfer.setData('text/plain', e.target.dataset.player);
            }

            function dragEnd() {
                const draggedCard = document.querySelector('.player-card.dragging');
                if (draggedCard) {
                    draggedCard.classList.remove('dragging');
                    draggedCard.style.left = '0';
                    draggedCard.style.top = '0';
                }
            }

            function dragOver(e) {
                e.preventDefault();
            }

            function dragEnter(e) {
                e.preventDefault();
            }

            function dragLeave() {
                const dropZone = document.querySelector('.drop-zone');
                if (dropZone) {
                    dropZone.style.backgroundColor = '';
                }
            }

            function drop(e) {
                e.preventDefault();
                const playerName = e.dataTransfer.getData('text/plain');
                const draggedCard = document.querySelector('.player-card.dragging');

                if (draggedCard) {
                    const terrainRect = terrain.getBoundingClientRect();
                    draggedCard.style.left = e.offsetX - draggedCard.offsetWidth / 2 + 'px';
                    draggedCard.style.top = e.offsetY - draggedCard.offsetHeight / 2 + 'px';

                    alert('Joueur déposé sur le terrain : ' + playerName);
                }
            }
        });
    </script>

</body>
</html>