<div class="container-fluid">

    <div class="col-lg-12">

        <div class="row">
            <div class="col-md-6 col-md-offset-3 mx-auto">
                <div class="box text-center text-primary mb-5">
                    <h3 class="text-warning mt-5">Modification des informations du compte</h3>

                    <br>
                    <form method="post">

                        <div class="form-group mt-3">
                            <div class="col-sm-12">
                                <input required type="hidden" name="username" class="form-control" value="<?php echo $comptes->id; ?>">
                            </div>
                        </div>

                        <label class="col-sm-3 control-label">Statut: 1=actif, 0=nul</label>
                        <div class="col-sm-12">
                            <input required type="text" name="status" class="form-control" value="<?php echo $comptes->status; ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label class="col-sm-3 control-label">Nom</label>
                            <div class="col-sm-12">
                                <input required type="text" name="username" class="form-control" value="<?php echo $comptes->username; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-12">
                                <input required type="text" name="email" class="form-control" value="<?php echo $comptes->email; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Mot de passe</label>
                            <div class="col-sm-12">
                                <input required type="password" name="password" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mt-3">
                                <input type="submit" name="btn_update" class="btn btn-success" value="Modifier">
                                <?php
                                if ($this->session->userdata('type') === 'admin') {
                                    echo "<a href='" . site_url('page/indexadmin/') . "' class='btn btn-primary'>Annuler</a>";
                                }

                                if ($this->session->userdata('type') === 'famille') {
                                    echo "<a href='" . site_url('page/indexfamille/') . "' class='btn btn-primary'>Annuler</a>";
                                }

                                if ($this->session->userdata('type') === 'eleve') {
                                    echo "<a href='" . site_url('page/indexeleve/') . "' class='btn btn-primary'>Annuler</a>";
                                }

                                if ($this->session->userdata('type') === 'enseignant') {
                                    echo "<a href='" . site_url('page/indexenseignant/') . "' class='btn btn-primary'>Annuler</a>";
                                }
                                ?>

                                <!-- suppression -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#smallModal">
                                    Supprimer
                                </button>
                                <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content text-dark">
                                            <div class="">
                                                <h3 class="modal-title mt-3 text-danger" id="myModalLabel">SUPPRIMER</h3>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h4>Veuillez confirmer la suppression du compte</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>

                                                <button type="submit" name='delete_id' value="<?php echo $comptes->id; ?>" class="btn btn-danger">Supprimer définitivement</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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