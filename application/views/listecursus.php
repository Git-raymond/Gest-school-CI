<?php
include 'functions.php';
session_start();
?>
<?= template_header('Liste cursus') ?>

<?php
if (!isset($_SESSION['type'])) {
    header('Location:register.php');
    exit();
}
require_once "connexion.php";

$select_stmt = $db->prepare("SELECT * FROM cursus");
$select_stmt->execute();

?>
<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste des cursus</h2>
    <br>
    <?php
    if ($select_stmt->rowCount() > 0) {
    ?>
        <table class="table table-bordered table-striped table-dark table-hover bg-light">
            <tr>
                <td>Matière</td>
                <td>Année scolaire</td>
                <td>Montant des frais de scolarité</td>
                <td width="70px">EDIT</td>
            </tr>
            <?php
            while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<form action='' method='POST'>";
                echo "<input type='hidden' value='" . $row['idCursus'] . "'  />";
                echo "<tr>";
                echo "<td>" . $row['matiere'] . "</td>";
                echo "<td>" . $row['annee'] . "</td>";
                echo "<td>" . $row['frais'] . "</td>";
                echo "<td><a href='editmatiere.php?id=" . $row['idCursus'] . "' class='btn btn-info'>Edit</a></td>";
                echo "</tr>";
                echo "</form>";
            }
            ?>
        </table>
</div>
<br><br>
<?php
    } else {
        echo ".<div class='text-center text-danger'><p>Aucun cursus enregistré !</p></div></div>";
    }
?>
<div class="text-center"> [ <a href="indexadmin.php">Retour</a> ] </div>
<br><br>
</body>
</html>

<?= template_footer() ?>