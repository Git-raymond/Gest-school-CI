<div class="container">
        <div class="jumbotron text-center">
            <form class="box text-primary" action="" method="post" name="login">
                <h1 class="box-logo box-title mt-5 mb-4">AUTHENTIFICATION</h1>
                <h1 class="box-title mb-3 text-secondary">Connexion</h1>
                <div class="margin-input">
                    <select class="mt-3 mb-3" name="type">
                        <option selected="selected">Choisir votre rôle</option>
                        <option value="admin">Admin</option>
                        <option value="famille">Famille</option>
                        <option value="eleve">Elève</option>
                        <option value="enseignant">Enseignant</option>
                    </select>
                </div>
                <div class="margin-input">
                    <input type="text" class="box-input mb-3 rounded" name="username" required placeholder="Nom">
                </div>
                <div class="margin-input">
                    <input type="password" class="box-input mb-3 rounded" name="password" required placeholder="Mot de passe">
                </div>
                <div class="margin-input">
                    <input type="submit" name="valider" value="Se connecter" name="submit" class="box-button btn-primary mb-3 rounded shadow">
                </div>
                <p class="box-register p-3 rounded mx-auto">Vous êtes nouveau ici ? <a href="register.php">S'inscrire</a></p>
                <?php if (!empty($errorMsg)) { ?>
                    <p class="text-center text-danger"><?php echo $errorMsg; ?></p>
                <?php } ?>
                <?php if (!empty($loginMsg)) { ?>
                    <p class="text-center text-success"><?php echo $loginMsg; ?></p>
                <?php } ?>
            </form>
        </div>
    </div>
    <br><br>
</body>

</html>