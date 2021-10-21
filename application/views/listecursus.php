
<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste des cursus</h2>
    <br>
 
        <table class="table table-bordered table-striped table-dark table-hover bg-light text-center">
            <tr class="text-warning">
                <td>Matière</td>
                <td>Année scolaire</td>
                <td width="300">Montant des frais de scolarité</td>
                <td width="70px">EDIT</td>
            </tr>
            <tbody>
            <?php if ($listecursus) : ?>
                <?php foreach ($listecursus as $cursus) : ?>
                    <tr>
                        <td><?php echo $cursus->matiere; ?></td>
                        <td><?php echo $cursus->annee; ?></td>
                        <td><?php echo $cursus->frais; ?></td>
                        <td><a href='<?= site_url('page/editmatiere/'. $cursus->idCursus);?>' class='btn btn-info'>Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        </table>
</div>
<br><br>

<div class="text-center"> [ <a href="<?= site_url('page/indexadmin'); ?>">Retour</a> ] </div>
<br><br>
</body>
</html>

