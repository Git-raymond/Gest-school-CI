<h2 class="text-center text-warning mt-5 mb-5">Recherche des cursus</h2>

<!-- <div class="container"> -->
<form action='' method='POST'>
    <div class='container mx-5 px-5 mb-5'>
        <span class='glyphicon glyphicon-search form-control-feedback'></span>
        <input name='recherche' type='text' class='text-center form-control' placeholder="Tapez votre recherche selon le Nom ou l'Année du cursus">
    </div>
</form>

<div class='container bg-light'>
    <h2 class="text-success text-center">Résultat des recherches</h2>
    <table class='table table-bordered table-striped table-dark table-hover'>

        <tr class="text-warning text-center">
            <td>Matière</td>
            <td>Année scolaire</td>
            <td width="400">Montant des frais de scolarité</td>
        </tr>
        <tbody class="text-center">
            <?php if ($recherchecursus) : ?>
                <?php foreach ($recherchecursus  as $cursus) : ?>
                    <tr>
                        <td><?php echo $cursus->matiere; ?></td>
                        <td><?php echo $cursus->annee; ?></td>
                        <td><?php echo $cursus->frais; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="text-center"> [ <a href="<?= site_url('page/indexadmin'); ?>">Retour</a> ] </div>
<br><br>
</body>

</html>