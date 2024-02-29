<?php
// Obtenez le nom de la page actuelle
$current_page = basename($_SERVER['PHP_SELF']);

// Fonction pour vérifier et ajouter la classe "active"
function isPageActive($page_name, $current_page) {
    if($page_name == $current_page) {
        return "actif";
    }
    return "";
}
?>

<div class="nav-border">  
  <ul class="nav">
    <div class="left-links">
      <li class="nav-item">
        <a class="nav-link lienNav <?php echo isPageActive('monEspace.php', $current_page); ?>" href="../clients/monEspace.php">Mon espace <i class="fab fa-squarespace"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link lienNav <?php echo isPageActive('offres.php', $current_page); ?>" href="../clients/offres.php"> ArchiDocs + <i class="bi bi-database-up"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link lienNav <?php echo isPageActive('nosClients.php', $current_page); ?>" href="../admin/nosClients.php">Nos clients <i class="badge rounded-pill bg-danger">Admin</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link lienNav <?php echo isPageActive('dashboard.php', $current_page); ?>" href="../admin/dashboard.php">Dashboard <i class="badge rounded-pill bg-danger">Admin</i></a>
      </li>
    </div>

      <!-- Toujous à laisser en dernier -->
      <div class="right-link">
        <span class="nav-item">
          <a class="nav-link lienNav <?php echo isPageActive('monCompte.php', $current_page); ?>" href="../clients/monCompte.php">Mon compte <i class="bi bi-person-circle" ></i></a>
        </span>
        <span class="nav-item">
          <a class="nav-link lienNav btn-deco" href=""> Déconnexion <i class="bi bi-box-arrow-left"></i></a>
        </span>
      </div>
      
    </ul>
</div>

<!-- Nav hamburger -->
<div class="nav-hamburger">
    <div class="btn-hamburger" id="btn-hamburger">
      <i class="bi bi-list" id="open_nav_hamburger"></i>
      <i class="bi bi-x-lg" id="close_nav_hamburger"></i>
    </div>
    <div class="hamburger">
      <div class="hamburger__item">
        <a class="nav-link lienNav <?php echo isPageActive('monCompte.php', $current_page); ?>" href="../clients/monCompte.php">Mon compte <i class="bi bi-person-circle"></i></a>
        <a class="nav-link lienNav <?php echo isPageActive('monEspace.php', $current_page); ?>" href="../clients/monEspace.php">Mon espace <i class="fab fa-squarespace"></i></a>
        <a class="nav-link lienNav <?php echo isPageActive('offres.php', $current_page); ?>" href="../clients/offres.php">ArchiDocs + <i class="bi bi-database-up"></i></a>
        <a class="nav-link lienNav <?php echo isPageActive('nosClients.php', $current_page); ?>" href="../admin/nosClients.php">Nos clients <i class="badge rounded-pill bg-danger">Admin</i></a>
        <a class="nav-link lienNav <?php echo isPageActive('dashboard.php', $current_page); ?>" href="../admin/dashboard.php">Dashboard <i class="badge rounded-pill bg-danger">Admin</i></a>
        
        <!-- Toujours laisser en dernier -->
        <a class="nav-link lienNav btn-deco" href="">Déconnexion <i class="bi bi-box-arrow-left"></i></a>
      </div>
    </div>
</div>
<!-- Nav hambuger -->