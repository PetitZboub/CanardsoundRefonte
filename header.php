<header>
  <div class="logo">
    <img src="img/logo.png" alt="Logo">
  </div>

  <nav>
    <ul>
      <li><a href="inscription.php">Inscription</a></li>
      <li><a href="connexion.php">Connexion</a></li>
      <li><a href="#"></a></li>
      <li><button onclick="window.location.href='signalement_admin.php'">Signalements</button></li>
    </ul>
  </nav>
 <? 
if(isset($_SESSION['user_nom'])) {
    echo "Bonjour, " . $_SESSION['user_nom'] . "!";
} 
?>
</header>