<div class="container">
    <h2 class="text-warning text-center mt-5 mb-3">Liste des élèves sans cursus</h2>
    <br>

    <table class="table table-bordered table-striped table-dark table-hover bg-light text-center">
        <tr class="text-warning">
            <td>Prénom</td>
            <td>Email</td>
            <td>Statut (1=actif, 0=nul)</td>
            <td width="200px">ATTRIBUER UN CURSUS</td>
            <td width="70px">EDIT</td>
        </tr>
        <tbody>
            <?php if ($listeelevesanscursus) : ?>
                <?php foreach ($listeelevesanscursus as $elevesanscursus) : ?>
                    <tr>
                        <td><?php echo $elevesanscursus->username; ?></td>
                        <td><?php echo $elevesanscursus->email; ?></td>
                        <td><?php echo $elevesanscursus->status; ?></td>
                        <td><a href='<?= site_url('page/cursuseleveattribution/' . $elevesanscursus->id); ?>' class='btn btn-success'>Attribuer</a></td>
                        <td><a href='<?= site_url('page/editcompte/' . $elevesanscursus->id); ?>' class='btn btn-info'>Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<br><br>

<div class="text-center"> [ <a href="indexadmin.php">Retour</a> ] </div>
<br><br>
</body>

</html>