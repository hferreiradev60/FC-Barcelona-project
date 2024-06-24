<!DOCTYPE html>
<html lang="fr">

<?php include __DIR__ . '../../partials/head.php'; ?>

<body>

    <?php include __DIR__ . '../../partials/header.php'; ?>

    <section class="players-list">
        <h1>Effectif du FC Barcelone</h1>

        <form method="get" action="">
            <select id="posteFilter" name="poste">
                <option value="all">Tous</option>
                <option value="gardien">Gardiens</option>
                <option value="defenseur">Défenseurs</option>
                <option value="milieu de terrain">Milieux de terrain</option>
                <option value="attaquant">Attaquants</option>
                <option value="entraineur">Staff technique</option>
            </select>
            <button class="button-85" type="submit">Filtrer</button>
        </form>

        <?php
        $posteFilter = isset($_GET['poste']) ? $_GET['poste'] : 'all';

        $sql = "SELECT * FROM effectif";
        if ($posteFilter !== 'all') {
            $sql .= " WHERE LOWER(poste) = LOWER(:poste)";
        }
        
        $stmt = $pdo->prepare($sql);
        
        if ($posteFilter !== 'all') {
            $stmt->bindParam(':poste', $posteFilter, PDO::PARAM_STR);
        }
        
        $stmt->execute();
        
        $effectif = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($effectif) {
            echo '<ul>';
            foreach ($effectif as $joueur) {
                echo '<br>';
                echo '<li>';
                echo '<img src="' . $joueur['image'] . '" alt="'. ' ' . $joueur['prenom'] . $joueur['nom']  . '">';
                echo '<br>';
                echo '<strong>'. ' ' . $joueur['numeroMaillot'] . ' - ' . $joueur['prenom'] . ' ' . $joueur['nom'] . '</strong>';
                echo '<br>';
                echo '<a href="/fcb/joueur?id=' . $joueur['idJoueur'] . '"><button class="button-85" role="button">EN SAVOIR PLUS ></button></a>';                
                echo '<br>';
                //echo 'Numéro de maillot : ' . $joueur['numeroMaillot'];
                //echo '<br>';
                //echo 'Description : ' . $joueur['description'];
                //echo '<br>';
                //echo 'Date de Naissance : ' . $joueur['dateNaissance'];
                //echo '<br>';
                //echo 'Lieu de Naissance : ' . $joueur['lieuNaissance'];
                //echo '<br>';
                //echo 'Poids : ' . $joueur['poids'];
                //echo '<br>';
                //echo 'Taille : ' . $joueur['taille'];
                //echo '</li>';
            }
            echo '</ul>';
        } else {
            echo 'Aucun joueur trouvé.';
        }
        ?>

    </section>

    <?php include __DIR__ . '../../partials/footer.php'; ?>

</body>
</html>

<script>
$(document).ready(function () {
    $('#posteFilter').change(function () {
        $('form').submit();
    });
});
</script>