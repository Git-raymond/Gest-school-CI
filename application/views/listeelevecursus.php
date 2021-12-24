<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste des élèves avec cursus</h2>
    <br>
    <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <table class="table table-bordered table-striped table-dark table-hover bg-light text-center">
            <tr class="text-warning">
                <td>Prénom</td>
                <td>Email</td>
                <td>Statut (1=actif, 0=nul)</td>
                <td>Matière</td>
                <td>Année scolaire</td>
                <td>Frais de scolarité</td>
                <td width="200px">CHANGER LE CURSUS</td>
                <td width="70px">EDIT</td>
            </tr>
            <tbody>
                <?php if ($listeelevecursus) : ?>
                    <?php foreach ($listeelevecursus as $elevecursus) : ?>
                        <tr>
                            <td><?php echo $elevecursus->username; ?></td>
                            <td><?php echo $elevecursus->email; ?></td>
                            <td><?php echo $elevecursus->status; ?></td>
                            <td><?php echo $elevecursus->matiere; ?></td>
                            <td><?php echo $elevecursus->annee; ?></td>
                            <td><?php echo $elevecursus->frais; ?></td>
                            <td><a href='<?= site_url('page/cursuseleveattribution/' . $elevecursus->id); ?>' class='btn btn-success'>Changer</a></td>
                            <td><a href='<?= site_url('page/editcompte/' . $elevecursus->id); ?>' class='btn btn-info'>Edit</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<br><br>

<div class="text-center"> [ <a href="<?= site_url('page/indexadmin'); ?>">Retour</a> ] </div>
<br><br>
</body>

</html>