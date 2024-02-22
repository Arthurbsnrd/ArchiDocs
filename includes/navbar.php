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
  <ul class="nav flex-column">
      <!-- Logo -->
      <div class="auth-brand text-center text-lg-start logo-div">
        <div class="logo" >
            <span><img src="../../assets/ArchiDocs-Logo.png" alt="logo" height="50"></span>
        </div>
        
        <a href="../clients/monCompte.php" class="logo" style="text-decoration: none; color: black;">
            <small style="font-weight: 600;">Mon compte</small>
            <span><img src="../../assets/navbar/pp.png" alt="logo" height="60" style="border-radius: 360px;"></span>
        </a>
      </div>
      <!-- Logo  -->

      <li class="nav-item">
        <a class="nav-link lienNav <?php echo isPageActive('monEspace.php', $current_page); ?>" href="../clients/monEspace.php">Mon espace <i class="fab fa-squarespace"></i></a>
      </li>
      <li class="nav-item">
          <a class="nav-link lienNav <?php echo isPageActive('offres.php', $current_page); ?>" href="../clients/offres.php"> ArchiDocs + <i class="bi bi-database-up"></i></a>
      </li>
      
      <!-- Toujous à laisser en dernier -->
      <li class="bottom">
          <a class="nav-link lienNav actif" href=""> Déconnexion <i class="bi bi-box-arrow-left"></i></a>
      </li>
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
        <a class="nav-link lienNav" href="../clients/monCompte.php">Mon compte <i class="bi bi-person-circle"></i></a>
        <a class="nav-link lienNav" href="../clients/monEspace.php">Mon espace <i class="fab fa-squarespace"></i></a>
        <a class="nav-link lienNav" href="../clients/offres.php">ArchiDocs + <i class="bi bi-database-up"></i></a>
        
        <!-- Toujours laisser en dernier -->
        <a class="nav-link lienNav actif" href="">Déconnexion <i class="bi bi-box-arrow-left"></i></a>
      </div>
    </div>
</div>
<!-- Nav hambuger -->