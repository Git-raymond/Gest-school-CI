

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
    <br><br><br>
    <h2 class="text-center mt-5 mb-5">Bienvenue Admin</h2>
   
    <div class="text-center"> [ <a href="<?= site_url('navigation/deconnection/'); ?>">Se déconnecter</a> ] </div>
    <br><br><br><br><br>
</body>

</html>
