<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="./index.php">
    <img src="./ressources/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Instant Café
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav navbar-center">
      <li class="nav-item <?php if ($page == "accueil") {echo "active";} ?>">
        <a class="nav-link" href="./index.php?page=accueil">ACCUEIL </a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php require('./models/m_navbar.php');?>
  </ul>
</div>
