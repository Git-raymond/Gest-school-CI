<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste des cursus de formation attribués à l'enseignant</h2>
    <br>

    <table class="table table-bordered table-striped table-dark table-hover bg-light text-center">
        <tr class="text-warning">
            <td>Matière</td>
            <td>Année scolaire</td>
        </tr>
        <tbody>
            <?php if ($listecursusprof) : ?>
                <?php foreach ($listecursusprof as $cursusprof) : ?>
                    <tr>
                        <td><?php echo $cursusprof->matiere; ?></td>
                        <td><?php echo $cursusprof->annee; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<br><br>

<div class="text-center"> [ <a href="<?= site_url('page/indexenseignant'); ?>">Retour</a> ] </div>
<br><br>
</body>

</html>