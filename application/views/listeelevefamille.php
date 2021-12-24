<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste des élèves scolarisés de la famille</h2>
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
                <td>Notes et commentaires</td>
                <td width="70px">EDIT</td>
            </tr>
            <tbody>
                <?php if ($listeelevefamille) : ?>
                    <?php foreach ($listeelevefamille as $elevefamille) : ?>
                        <tr>
                            <td><?php echo $elevefamille->username; ?></td>
                            <td><?php echo $elevefamille->email; ?></td>
                            <td><?php echo $elevefamille->status; ?></td>
                            <td><?php echo $elevefamille->matiere; ?></td>
                            <td><?php echo $elevefamille->annee; ?></td>
                            <td><?php echo $elevefamille->frais; ?></td>
                            <td><a href='<?= site_url('page/affichenotesfamille/' . $elevefamille->eleve_id); ?>' class='btn btn-success'>Afficher</a></td>
                            <td><a href='<?= site_url('page/editcompte/' . $elevefamille->id); ?>' class='btn btn-info'>Edit</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<br><br>

<div class="text-center"> [ <a href="<?= site_url('page/indexfamille'); ?>">Retour</a> ] </div>
<br><br>
</body>

</html>