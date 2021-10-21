
<form class="box text-center mt-5 mb-5" action="" method="post">
    <h1 class="box-logo box-title text-warning">Ajouter un cursus</h1>
    <div class="text-center">
        <br>
        <input type="text" class="box-input mb-3" name="matiere" placeholder="Matière" required /><br>
        <input type="text" class="box-input mb-3" name="annee" placeholder="Année scolaire" required /><br>
        <input type="text" class="box-input mb-3" name="frais" placeholder="Frais scolarité" required /><br>
        <input type="submit" name="ajouter" value="Ajouter" class="box-button btn-primary btn" />
    </div>
</form>

<div class="text-center"> [ <a href="<?= site_url('page/indexadmin'); ?>">Retour</a> ] </div>
<br><br>
</body>

</html>
