<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="<?php echo base_url('https://code.jquery.com/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>Insert</title>
    <style>
        .container {
            width: 800px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center text-primary">Ajouter un contact</h3>
                <hr />
            </div>
        </div>

        <?php echo form_open('', ['name' => 'insertdata', 'autocomplete' => 'off']); ?>
        <div class="row">
            <div class="col-md-12 text-center text-secondary"><b>Prénom</b>
                <?php echo form_input(['name' => 'firstname', 'class' => 'form-control', 'value' => set_value('firstname')]); ?>
                <?php echo form_error('firstname', "<div style='color:red'>", "</div>"); ?>
            </div>
            <div class="col-md-12 text-center text-secondary"><b>Nom</b>
                <?php echo form_input(['name' => 'lastname', 'class' => 'form-control', 'value' => set_value('lastname')]); ?>
                <?php echo form_error('lastname', "<div style='color:red'>", "</div>"); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center text-secondary"><b>Email</b>
                <?php echo form_input(['name' => 'emailid', 'class' => 'form-control', 'value' => set_value('emailid')]); ?>
                <?php echo form_error('emailid', "<div style='color:red'>", "</div>"); ?>
            </div>
            <div class="col-md-12 text-center text-secondary"><b>N° Tél</b>
                <?php echo form_input(['name' => 'contactno', 'class' => 'form-control', 'value' => set_value('contactno')]); ?>
                <?php echo form_error('contactno', "<div style='color:red'>", "</div>"); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center text-secondary"><b>Adresse</b>
                <?php echo form_textarea(['name' => 'address', 'class' => 'form-control', 'value' => set_value('address')]); ?>
                <?php echo form_error('address', "<div style='color:red'>", "</div>"); ?>
            </div>
        </div>

        <div class="row" style="margin-top:1%">
            <div class="col-md-12 text-center text-secondary">
                <?php echo form_submit(['name' => 'insert', 'value' => 'Submit']); ?>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
    </div>
</body>

</html>