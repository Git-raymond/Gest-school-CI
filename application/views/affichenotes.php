<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste des notes de l'élève</h2>
    <br>
    <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <table class="table table-bordered table-striped table-dark table-hover bg-light text-center">
            <tr class="text-warning">
                <td>Intitulé</td>
                <td>Notes</td>
                <td>Commentaires</td>
                <td>Date</td>
            </tr>
            <tbody>
                <?php if ($affichenotes) : ?>
                    <?php foreach ($affichenotes as $notes) : ?>
                        <tr>
                            <td><?php echo $notes->intitule; ?></td>
                            <td><?php echo $notes->note; ?></td>
                            <td><?php echo $notes->commentaire; ?></td>
                            <td><?php echo $notes->date; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<br><br>

<div class="text-center"> [ <a href="<?= site_url('page/indexeleve'); ?>">Retour</a> ] </div>
<br><br>
</body>

</html>