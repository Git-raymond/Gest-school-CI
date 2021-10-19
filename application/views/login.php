<div class="container d-flex justify-content-center">
    <div class="jumbotron text-center">
        <div class="col-md-offset-4">
            <form class="form-signin" action="<?php echo site_url('login/auth'); ?>" method="post">
                <h1 class="form-signin-heading text-primary text-center mt-5 mb-4">Connexion</h1>
                <p class="text-danger pb-1"><?php echo $this->session->flashdata('msg'); ?></p>
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" class="form-control mb-4" placeholder="Email" required autofocus>
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div class="text-center">
                <button class="btn btn-lg btn-primary btn-block mt-4 mb-3" type="submit">Se connecter</button>
            </form>
            <p class="box-register p-3 rounded mx-auto text-center text-primary">Vous êtes nouveau ici ? <a href="<?= site_url('navigation/register') ?>">S'inscrire</a></p>
        </div>
    </div>
</div> <!-- /container -->

<br><br>
</body>

</html>