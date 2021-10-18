<div class="d-flex justify-content-between">
  <h1 class="p-4 text-secondary">Mon site perso</h1>
  <img class="rounded m-1" src="<?= base_url('assets/images/chat1.png'); ?>" alt="chat" width="170" height="100" />
</div>

<ul class="nav navbar-dark bg-dark justify-content-center">
  <li class="nav-item">
    <a class="nav-link text-light" href="<?= site_url('navigation/welcome_message/'); ?>">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="<?= site_url('itemCRUD/'); ?>">Liste Produits</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="<?= site_url('navigation/images/'); ?>">Mes images</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="<?= site_url('navigation/video/'); ?>">Ma vidéo</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="<?= site_url('read/index/'); ?>">Liste Contacts</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="<?= site_url('navigation/inscription/'); ?>">Inscription</a>
  </li>
  <li class="nav-item">
    <?php if ($this->session->connected == true) { ?>
      <a class="nav-link text-light" href="<?= site_url('navigation/deconnection/'); ?>">Se déconnecter</a>
    <?php } else { ?> <a class="nav-link text-light" href="<?= site_url('navigation/connection/'); ?>">Se connecter</a><?php } ?>
  </li>
</ul>