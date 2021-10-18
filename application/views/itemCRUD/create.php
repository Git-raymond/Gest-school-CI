<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>Ajout</title>
</head>

<body>
    <br>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Ajout Produit</h2>
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-primary" href="<?php echo site_url('itemCRUD'); ?>"> Retour</a>
            </div>
        </div>
    </div>


    <form class="d-flex justify-content-center" method="post" action="<?php echo site_url('itemCRUDCreate'); ?>">
        <?php

        if ($this->session->flashdata('errors')) {
            echo '<div class="alert alert-danger">';
            echo $this->session->flashdata('errors');
            echo "</div>";
        }

        ?>

        <div class="row container">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" name="nom" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Couleur:</strong>
                    <input name="couleur" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary mt-3 btn-success">Ajouter</button>
            </div>
        </div>

    </form>