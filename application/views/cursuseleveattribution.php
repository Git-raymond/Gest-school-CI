<body>

    <div class="container-fluid">

        <div class="col-lg-12">

            <div class="container-fluid">

                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 mx-auto">
                            <div class="box text-center text-primary mb-5">
                                <h3 class="text-warning mt-5">Attribution des cursus de formation</h3>
                                <form method="post">
                                    <div class="text-center form-group mt-3">
                                        <label class="col-sm-3 control-label">Prénom</label>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <input class="text-center" required type="hidden" name="eleve_id" class="form-control" value="<?php echo $comptes->eleve_id; ?>">
                                            </div>
                                            <input class="text-center" required type="text" name="username" class="form-control" value="<?php echo $comptes->username; ?>">
                                        </div>
                                        <br>
                                        <div class="col-sm-12">
                                            <label>Choisissez un cursus à attribuer</label>
                                            <div class="col-sm-12">
                                                <select name="idCursus">
                                                    <tbody>
                                                        <?php if ($listecursus) : ?>
                                                            <?php foreach ($listecursus as $cursus) : ?>
                                                                <option value="<?php echo $cursus->idCursus; ?>"><?php echo $cursus->matiere; ?> (<?php echo $cursus->annee ?>)</option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="mt-3">
                                            <a href='<?= site_url('page/cursuseleve'); ?>' class='btn btn-primary'>Annuler</a>
                                            <input type="submit" name="btn_update" class="btn btn-success" value="Valider">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</body>

</html>