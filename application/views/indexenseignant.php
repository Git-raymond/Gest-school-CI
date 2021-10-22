

<style>
    * {
        font-family: arial;
    }

    body {
        min-height: 500px;
    }

    a {
        color: #EE6600;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .username {
        color: orange;
        font-size: xx-large;
    }
</style>

<body onLoad="document.fo.login.focus()">
<h1 class="text-center text-warning mt-5 mb-5">Bienvenue <?php echo $this->session->userdata('username'); ?>
    <br><br>
    <div class="text-center mt-5">
        <button type="button" class="btn btn-outline-warning btn-lg btn-block"><a href="<?= site_url('page/ajoutcontrole/'); ?>">Ajouter un contrôle</a></button>
    </div>
    <br>
    <h5 class="text-center"> [ <a href="<?= site_url('login/logout/'); ?>">Se déconnecter</a> ] </h5>
    <br><br><br><br>
</body>

</html>
