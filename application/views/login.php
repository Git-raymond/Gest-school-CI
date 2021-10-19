<div class="container">
    <div class="jumbotron text-center">

        <div class='d-flex flex-row justify-content-center'>
            <div class="row">

                <h2 class="text-primary text-center pt-4">Connexion</h2>

                <div class="col-12 my-3">
                    <div class="d-flex justify-content-center">
                        <form action="<?= site_url('Navigation/login/') ?>" method="POST">

                            <!-- <div class="margin-input">
                                <select class="mt-3 mb-3" name="type">
                                    <option selected="selected">Choisir votre rôle</option>
                                    <option value="admin">Admin</option>
                                    <option value="famille">Famille</option>
                                    <option value="eleve">Elève</option>
                                    <option value="enseignant">Enseignant</option>
                                </select>
                            </div> -->

                            <div class="d-flex flex-column">
                                <div class="my-2">
                                    <label for="nom">Email</label>
                                    <?php echo form_input(['name' => 'email', 'class' => 'form-control', 'value' => set_value('email')]); ?>
                                    <?php echo form_error('email', "<div style='color:red'>", "</div>"); ?>
                                </div>
                                <div class="my-2">
                                    <label for="password">Mot de passe</label>
                                    <?php echo form_input(['type' => 'password', 'name' => 'password', 'class' => 'form-control', 'value' => set_value('password')]); ?>
                                    <?php echo form_error('password', "<div style='color:red'>", "</div>"); ?>
                                </div>
                                <button type="submit" name='valider' class='btn btn-success mt-3'>Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
</body>

</html>