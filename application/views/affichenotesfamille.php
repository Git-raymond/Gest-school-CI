<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste des notes</h2>
    <br>

    <table class="table table-bordered table-striped table-dark table-hover bg-light text-center">
        <tr class="text-warning">
            <td>Intitulé</td>
            <td>Notes</td>
            <td>Commentaires</td>
            <td>Date</td>
        </tr>
        <tbody>
            <?php if ($affichenotesfamille) : ?>
                <?php foreach ($affichenotesfamille as $notesfamille) : ?>
                    <tr>
                        <td><?php echo $notesfamille->intitule; ?></td>
                        <td><?php echo $notesfamille->note; ?></td>
                        <td><?php echo $notesfamille->commentaire; ?></td>
                        <td><?php echo $notesfamille->date; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<br>

<div class="text-center"> [ <a href="<?= site_url('page/listeelevefamille'); ?>">Retour</a> ] </div>
<br><br>

</body>

</html>