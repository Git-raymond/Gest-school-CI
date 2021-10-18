<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>Liste</title>
</head>

<body>
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2 class="text-primary">Liste des produits - CRUD </h2>
            </div>
            <br>
            <div class="text-center">
                <a class="btn btn-success" href="<?php echo site_url('itemCRUD/create') ?>"> Ajouter un nouveau produit</a>
            </div>
        </div>
    </div>
    <br>
    <div class="container">

        <table class="table table-dark table-hover table-bordered text-center ">

            <thead>
                <tr class="text-warning">
                    <th>Nom</th>
                    <th>Couleur</th>
                    <th width="300px">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $count = 0; ?>
                <?php foreach ($data as $item) { ?>
                    <tr>
                        <td><?php echo $item->nom; ?></td>
                        <td><?php echo $item->couleur; ?></td>
                        <td>
                            <form method="post" action="<?php echo site_url('itemCRUD/delete/' . $item->id); ?>">
                                <!-- <a class="btn btn-info" href="<?php echo base_url('itemCRUD/' . $item->id) ?>"> show</a> -->
                                <a class="btn btn-primary ms-4" href="<?php echo site_url('itemCRUD/edit/' . $item->id) ?>"> Modifier</a>
                                <!-- <button type="submit" class="btn btn-danger ms-5"> Supprimer</button> -->

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger ms-5" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $count ?>">
                                    Supprimer
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $count ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $count ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-primary ms-5" id="exampleModalLabel<?= $count ?>">Supprimer le produit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                Voulez-vous définitivement supprimer le produit?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php $count++;
                } ?>
            </tbody>

        </table>
    </div>