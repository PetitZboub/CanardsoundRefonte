<footer>
<div class="footer">
  <audio id="audioPlayer" src=""></audio>
  <div class="player-controls">
    <button class="previous-button" onclick="previousTrack()">Précédent</button>
    <button class="play-pause-button" onclick="playPauseTrack()">Lecture</button>
    <button class="next-button" onclick="nextTrack()">Suivant</button>
  </div>
  <div class="coup-de-coeur-controls">
    <?php
    if (isset($_SESSION['utilisateur'])) {
      echo '<button id="coup-de-coeur-button" onclick="addCoupDeCoeur()">Ajouter aux coups de cœur</button>';
      echo '<a href="signalement.php?id=' . $_SESSION['musiqueEnCours']['id'] . '">Signaler une musique</a>';
    }
    ?>
  </div>
</div>

<!--
  <div class="footer">
    <script>
      
  </script>
  </div>
-->  
</footer>