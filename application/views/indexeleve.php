
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
<h1 class="text-center text-warning mt-5 mb-5">Bienvenue <?php echo $this->session->userdata('username'); ?></h1>
    <br>
    <div class="text-center">
        <button type="button" class="btn btn-outline-warning btn-lg btn-block"><a href="<?= site_url('page/affichenotes/'); ?>">Afficher mes notes</a></button>
    </div>
    <br><br><br>
    <div class="text-center"> [ <a href="<?= site_url('login/logout//'); ?>">Se déconnecter</a> ] </div>
    <br><br><br><br><br><br>
</body>

</html>

