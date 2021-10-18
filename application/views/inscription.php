<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>Inscription</title>
</head>

<body>

    <div class='d-flex flex-row justify-content-center'>
        <div class="row">

            <h2 class="text-primary text-center pt-4">Inscription</h2>

            <div class="col-12 my-3">
                <div class="d-flex justify-content-center">
                    <form action="<?= site_url('Navigation/inscription/') ?>" method="POST">
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
                            <button type="submit" name='btn_inscription' class='btn btn-success mt-3'>S'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>