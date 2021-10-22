
<form class="box text-center mt-5 mb-5" action="" method="post">
    <h1 class="box-logo box-title text-warning">Ajouter un élève à la famille</h1>
    <div class="text-center mt-5">
        <input type="text" class="box-input mb-3" name="username" placeholder="Prénom de l'élève" required /><br>
        <input type="text" class="box-input mb-3" name="email" placeholder="Email" required /><br>
        <input type="password" class="box-input mb-3" name="password" placeholder="Mot de passe" required /><br>
        <input type="hidden" class="box-input mb-3" name="type" value="eleve" /><br>
        <input type="submit" name="ajouter" value="Ajouter" class="box-button btn-primary btn" />
    </div>
</form>

<div class="text-center"> [ <a href="<?= site_url('page/indexfamille'); ?>">Retour</a> ] </div>
<br><br>
</body>

</html>