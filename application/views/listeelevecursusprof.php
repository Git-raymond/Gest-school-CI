<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste des élèves inscrits au cursus de l'enseignant</h2>
    <br>
    <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <table class="table table-bordered table-striped table-dark table-hover bg-light text-center">
            <tr class="text-warning">
                <td>Prénom</td>
                <td>Email</td>
                <td>Statut (1=actif, 0=nul)</td>
                <td>Matière</td>
                <td>Année scolaire</td>
                <td>Notes et commentaires</td>
            </tr>
            <tbody>
                <?php if ($listeelevecursusprof) : ?>
                    <?php foreach ($listeelevecursusprof as $elevecursusprof) : ?>
                        <tr>
                            <td><?php echo $elevecursusprof->username; ?></td>
                            <td><?php echo $elevecursusprof->email; ?></td>
                            <td><?php echo $elevecursusprof->status; ?></td>
                            <td><?php echo $elevecursusprof->matiere; ?></td>
                            <td><?php echo $elevecursusprof->annee; ?></td>
                            <td><a href='<?= site_url('page/affichenotesprof/' . $elevecursusprof->eleve_id); ?>' class='btn btn-success'>Afficher</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<br><br>

<div class="text-center"> [ <a href="<?= site_url('page/indexenseignant'); ?>">Retour</a> ] </div>
<br><br>
</body>

</html>