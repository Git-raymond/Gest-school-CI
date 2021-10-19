    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h1 class="text-center text-warning mt-5 mb-5">Bienvenue <?php echo $this->session->userdata('username'); ?></h1>
            </div>
            <nav class="navbar navbar-default mt-5">

                <?php if ($this->session->userdata('type') === 'admin') : ?>
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li><a href="#">Posts</a></li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="#">Media</a></li>

                <?php elseif ($this->session->userdata('type') === 'famille') : ?>
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="#">Media</a></li>

                <?php elseif ($this->session->userdata('type') === 'eleve') : ?>
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="#">Media</a></li>

                <?php elseif ($this->session->userdata('type') === 'enseignant') : ?>
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="#">Media</a></li>

                <?php else : ?>
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li><a href="#">Posts</a></li>
                <?php endif; ?>
                </ul>
            </nav>

        </div>
    </div>
    <br><br><br><br>
    </body>

    </html>