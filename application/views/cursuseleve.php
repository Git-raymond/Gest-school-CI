<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste de tous les élèves</h2>
    <br>
    <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <table class="text-center table table-bordered table-striped table-dark table-hover bg-light">
            <tr class="text-warning">
                <td>Prénom</td>
                <td>Email</td>
                <td width="200">Statut (1=actif, 0=nul)</td>
                <td width="200px">ATTRIBUER UN CURSUS</td>
            </tr>
            <tbody>
                <?php if ($listeeleves) : ?>
                    <?php foreach ($listeeleves as $eleve) : ?>
                        <tr>
                            <td><?php echo $eleve->username; ?></td>
                            <td><?php echo $eleve->email; ?></td>
                            <td><?php echo $eleve->status; ?></td>
                            <td><a href='<?= site_url('page/cursuseleveattribution/' . $eleve->id); ?>' class='d-grid gap-2 col-6 mx-auto btn btn-info'>Attribuer</a></td>
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