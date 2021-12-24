<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste des notes</h2>
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
                <?php if ($affichenotesprof) : ?>
                    <?php foreach ($affichenotesprof as $notesprof) : ?>
                        <tr>
                            <td><?php echo $notesprof->intitule; ?></td>
                            <td><?php echo $notesprof->note; ?></td>
                            <td><?php echo $notesprof->commentaire; ?></td>
                            <td><?php echo $notesprof->date; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<br>

<div class="text-center"> [ <a href="<?= site_url('page/listeelevecursusprof'); ?>">Retour</a> ] </div>
<br><br>

</body>

</html>