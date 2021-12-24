<h2 class="text-center text-warning mt-5 mb-5">Recherche des élèves de la famille</h2>

<!-- <div class="container"> -->
<form action='' method='POST'>
    <div class='container mb-5'>
        <span class='glyphicon glyphicon-search form-control-feedback'></span>
        <input name='recherche' type='text' class='text-center form-control' placeholder="Recherche selon le Nom, l'Email ou le statut (actif=1, nul=0) de l'élève">
    </div>
</form>
<!-- <div> -->

<div class='container bg-light'>
    <h2 class="text-success text-center">Résultat des recherches</h2>
    <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <table class='table table-bordered table-striped table-dark table-hover'>
            <!-- <h3 class="text-center text-danger p-2">Pas de résultat trouvé</h3> -->

            <tr class="text-warning text-center">
                <td>Nom</td>
                <td>Email</td>
                <td width="250px">Statut (1=actif, 0=nul)</td>
            </tr>
            <tbody class="text-center">
                <?php if ($rechercheelevefamille) : ?>
                    <?php foreach ($rechercheelevefamille  as $elevefamille) : ?>
                        <tr>
                            <td><?php echo $elevefamille->username; ?></td>
                            <td><?php echo $elevefamille->email; ?></td>
                            <td><?php echo $elevefamille->status; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="text-center"> [ <a href="<?= site_url('page/indexfamille'); ?>">Retour</a> ] </div>
<br><br>
</body>

</html>