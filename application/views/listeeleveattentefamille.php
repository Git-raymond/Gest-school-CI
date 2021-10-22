<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste des élèves en attente de scolarisation</h2>
    <br>

    <table class="table table-bordered table-striped table-dark table-hover bg-light text-center">
        <tr class="text-warning">
            <td>Prénom</td>
            <td>Email</td>
            <td width="200px">Statut (1=actif, 0=nul)</td>
            <td width="70px">EDIT</td>
        </tr>
        <tbody>
            <?php if ($listeeleveattentefamille) : ?>
                <?php foreach ($listeeleveattentefamille as $eleveattentefamille) : ?>
                    <tr>
                        <td><?php echo $eleveattentefamille->username; ?></td>
                        <td><?php echo $eleveattentefamille->email; ?></td>
                        <td><?php echo $eleveattentefamille->status; ?></td>
                        <td><a href='<?= site_url('page/editcompte/' . $eleveattentefamille->id); ?>' class='btn btn-info'>Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<br><br>

<div class="text-center"> [ <a href="<?= site_url('page/indexfamille'); ?>">Retour</a> ] </div>
<br><br>
</body>

</html>