<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/animate.css/animate.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>

<body>
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">Email : gestschool@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>Tél : 06.44.64.90.21</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="<?= base_url('index.php') ?>">GEST-SCHOOL</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <?php
      if (isset($_SESSION['type'])) {

        if($this->session->userdata('type')==='admin') {
          echo "<a href='" . site_url('page/indexadmin/') . "'><i class='fas fa-tools'></i>Espace Admin</a>";
          echo "<a href='" . site_url('page/stats/') . "'><i class='fas fa-database'></i>Statistiques</a>";
        }

        if($this->session->userdata('type')==='famille') {
          echo "<a href='" . site_url("page/indexfamille") . "'><i class='fas fa-users'></i>Espace Famille</a>";

          echo "<nav id='navbar' class='navbar'></i><div class='dropdown'>
			<a class='btn text-primary dropdown-toggle' href='#' role='button' id='dropdownMenuLink1' data-bs-toggle='dropdown' aria-expanded='false'><i class='fas fa-users'></i>
				Comptes des élèves de la famille
			</a><ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/rechercheelevefamille/') . "'>Recherche des élèves de la famille</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/ajoutelevefamille/') . "'>Ajouter un élève à la famille</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/listeeleveattentefamille/') . "'>Liste des élèves en attente de scolarisation</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/listeelevefamille/') . "'>Liste des élèves scolarisés de la famille</a></li></ul></div>";
        }

        if($this->session->userdata('type')==='eleve') {
          echo "<a href='" . site_url('page/indexeleve/') . "'><i class='fas fa-user-graduate'></i>Espace Elève</a>";
          echo " 
			<nav id='navbar' class='navbar'>		
			<a href='" . base_url('index.php') . "'><i class='fas fa-home'></i>Accueil</a>
        	<i class='bi bi-list mobile-nav-toggle'></i>
				<a href='" . site_url("login/logout") . "'>Déconnexion</a>
			</ul>
		</div>
		</nav>
		</div>
		</header>
		";
        }

        if($this->session->userdata('type')==='enseignant') {
          echo "<a href='" . site_url('page/indexenseignant/') . "'><i class='fas fa-chalkboard-teacher'></i>Espace Enseignant</a>";

          echo "<nav id='navbar' class='navbar'></i><div class='dropdown'>
			<a class='btn text-primary dropdown-toggle' href='#' role='button' id='dropdownMenuLink1' data-bs-toggle='dropdown' aria-expanded='false'><i class='fas fa-chalkboard'></i>
				Elèves suivant le cursus de formation de l'enseignant
			</a><ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/rechercheelevecursusprof/') . "'>Recherche des élèves inscrits au cursus</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/listeelevecursusprof/') . "'>Liste des élèves inscrits au cursus</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/listecursusprof/') . "'>Liste des cursus de formation attribués à l'enseignant</a></li></ul></div>";
          echo " 
			<a href='" . base_url('index.php') . "'><i class='fas fa-home'></i>Accueil</a>
        	<i class='bi bi-list mobile-nav-toggle'></i>
				<a href='" . site_url("login/logout") . "'>Déconnexion</a>
			</ul>
			</div>
			</nav>
			</div>
			</header>
			";
        }

        if($this->session->userdata('type')==='admin' or $this->session->userdata('type')==='famille') {
          $idEdit = $this->session->userdata('id');
          echo " 
			<nav id='navbar' class='navbar'>		
			<a href='" . base_url('index.php') . "'><i class='fas fa-home'></i>Accueil</a>
        	<i class='bi bi-list mobile-nav-toggle'></i>
			<div class='dropdown'>
		<a class='btn text-primary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'><i class='fas fa-user'></i>
			Mon Compte
		</a>
		<ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
			<li><a class='dropdown-item' href='" . site_url("page/editcompte/". $idEdit) . "'>Modifier mon compte</a></li>
			<li><a class='dropdown-item' href='" . site_url("login/logout") . "'>Déconnexion</a></li>
			</ul>
		</div>
		</nav>
		</div>
		</header>
		";
        }

        if($this->session->userdata('type')==='admin') {
          echo "<nav id='navbar' class='navbar d-flex justify-content-center'>";
          echo "<div class='dropdown'>
			<a class='btn text-primary dropdown-toggle' href='#' role='button' id='dropdownMenuLink1' data-bs-toggle='dropdown' aria-expanded='false'>
				Comptes des enseignants
			</a><ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/cursusenseignant/') . "'>Attribuer les cursus</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/rechercheprof/') . "'>Recherche des enseignants</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/ajoutprof/') . "'>Nouvel enseignant</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/listeprof/') . "'>Liste des enseignants</a></li></ul></div>";
          echo "<div class='dropdown'>
			<a class='btn text-primary dropdown-toggle' href='#' role='button' id='dropdownMenuLink1' data-bs-toggle='dropdown' aria-expanded='false'>
				Cursus de formation
			</a><ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/recherchecursus/') . "'>Recherche des cursus</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/ajoutcursus/') . "'>Nouveau cursus</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/listecursus/') . "'>Liste des cursus</a></li></ul></div>";
          echo "<div class='dropdown'>
			<a class='btn text-primary dropdown-toggle' href='#' role='button' id='dropdownMenuLink1' data-bs-toggle='dropdown' aria-expanded='false'>
				Comptes des élèves
			</a><ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/cursuseleve/') . "'>Attribuer les cursus</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/rechercheeleve/') . "'>Recherche des élèves</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/listeelevecursus/') . "'>Liste des élèves avec cursus</a></li>";
          echo "<li><a class='dropdown-item' href='" . site_url('page/listeelevesanscursus/') . "'>Liste des élèves sans cursus</a></li></ul></div>";
          echo "</nav>";
        }
      } else {
        echo '
		<nav id="navbar" class="navbar">
        <ul>
          <li><a href="' . base_url('index.php') . '"><i class="fas fa-home"></i>Accueil</a></li>
          <li><a href="' . site_url('navigation/register/') . '"><i class="fas fa-address-book"></i>Inscription</a></li>'
      ?>

        <?php if ($this->session->connected == true) { ?>
          <a href="<?= site_url('login/logout'); ?>"><i class="fas fa-user"></i>Se déconnecter</a>
        <?php } else { ?> <a href="<?= site_url('login/'); ?>"><i class="fas fa-user"></i>Se connecter</a><?php } ?>

      <?php echo '<li><a href="' . site_url('navigation/contact/') . '"><i class="fas fa-envelope"></i>Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
';
      }

      ?>