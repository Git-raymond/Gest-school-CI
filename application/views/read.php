<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="<?php echo base_url('https://code.jquery.com/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>Liste Contact</title>
</head>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center text-primary">Liste des contacts</h3>
                <hr />
                <!--- Success Message --->
                <?php if ($this->session->flashdata('success')) { ?>
                    <p class="text-center" style="font-size: 20px; color:green"><?php echo $this->session->flashdata('success'); ?></p>
                <?php } ?>
                <!---- Error Message ---->
                <?php if ($this->session->flashdata('error')) { ?>
                    <p class="text-center" style="font-size: 20px; color:red"><?php echo $this->session->flashdata('error'); ?></p>
                <?php } ?>
                <div class="d-flex justify-content-center">
                    <a href="<?php echo site_url('insert'); ?>">
                        <button class="btn btn-success"> Ajout Contact</button></a>
                </div>
                <br>
                <div class="table-responsive">
                    <table id="mytable" class="table table-dark table-bordred table-hover">
                        <thead class="text-warning">
                            <th>#</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Adresse</th>
                            <th>Posting Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            $cnt = 1;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>
                                    <td><?php echo htmlentities($row->FirstName); ?></td>
                                    <td><?php echo htmlentities($row->LastName); ?></td>
                                    <td><?php echo htmlentities($row->EmailId); ?></td>
                                    <td><?php echo htmlentities($row->ContactNumber); ?></td>
                                    <td><?php echo htmlentities($row->Address); ?></td>
                                    <td><?php echo htmlentities($row->PostingDate); ?></td>
                                    <td>
                                        <?php
                                        //for passing row id to controller
                                        echo  anchor("Read/getdetails/{$row->id}", ' ', '<button class="btn btn-primary btn-sm">Modifier</button') ?>
                                    </td>
                                    <td>
                                        <?php
                                        //for passing row id to controller
                                        echo anchor("Delete/index/{$row->id}", ' ', '<button class="btn btn-danger btn-sm">Supprimer</button') ?>
                                    </td>
                                </tr>
                            <?php
                                // for serial number increment
                                $cnt++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</body>

</html>