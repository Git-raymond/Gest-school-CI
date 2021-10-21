<br>
<h2 class="text-center text-warning">STATISTIQUES</h2><br>
<h4 class="text-center text-primary">Nombre de familles inscrites sur le site : <span class="text-danger"><?= $nombreFamilles; ?></span></h4>

<div class="container">
    <h4 class="text-center text-primary mt-5 mb-3">Liste des familles</h4>

    <table class="table table-bordered table-striped table-dark table-hover bg-light">
        <tr class="text-warning">
            <td>Nom</td>
            <td>Email</td>
            <td>Rôle</td>
        </tr>

        <tbody>
            <?php if ($listeFamilles) : ?>
                <?php foreach ($listeFamilles  as $famille) : ?>
                    <tr>
                        <td><?php echo $famille->username; ?></td>
                        <td><?php echo $famille->email; ?></td>
                        <td><?php echo $famille->type; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>



<div class="container">
    <h4 class="text-center text-primary mt-5 mb-3">Liste des profils de leurs enfants</h4>

    <table class="table table-bordered table-striped table-dark table-hover bg-light">
        <tr class="text-warning">
            <td>Nom</td>
            <td>Email</td>
            <td>Rôle</td>
            <td>Matière</td>
            <td>Année scolaire</td>
            <td>Frais de scolarité</td>
        </tr>
        <tbody>
            <?php if ($profils) : ?>
                <?php foreach ($profils as $profil) : ?>
                    <tr>
                        <td><?php echo $profil->username; ?></td>
                        <td><?php echo $profil->email; ?></td>
                        <td><?php echo $profil->type; ?></td>
                        <td><?php echo $profil->matiere; ?></td>
                        <td><?php echo $profil->annee; ?></td>
                        <td><?php echo $profil->frais; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>



<div class="container">
    <h4 class="text-primary text-center mt-5 mb-3">Liste des enseignants par cursus</h4>

    <table class="table table-bordered table-striped table-dark table-hover bg-light">
        <tr class="text-warning">
            <td>Matière</td>
            <td>Année</td>
            <td>Nom</td>
            <td>Email</td>
            <td>Rôle</td>
        </tr>
        <tbody>
            <?php if ($profs) : ?>
                <?php foreach ($profs as $prof) : ?>
                    <tr>
                        <td><?php echo $prof->matiere; ?></td>
                        <td><?php echo $prof->annee; ?></td>
                        <td><?php echo $prof->username; ?></td>
                        <td><?php echo $prof->email; ?></td>
                        <td><?php echo $prof->type; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<br><br>

<br><br>
<div class="text-center"> [ <a href="<?= site_url('page/indexadmin'); ?>">Retour</a> ] </div>
<br><br>
</body>

</html>