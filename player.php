<div id="audiobloc">
    <div id="musiclist">
        <!-- FIN CHANSON 1 -->
        <!-- CHANSON XXX -->
        <div class="music_line">
        <span data-music-src="<?=$_SERVER["SERVER_NAME"].'/'.$musique['url_musique'] ?>" class="music_song" id="current_song">
                <?=$musique['titre'] ?> </span>
        </div>
        <!-- FIN CHANSON XXX -->
        <!-- FIN DE TOUTES LES CHANSONS -->
    </div>
    <!-- COMMANDES DU LECTEUR AUDIO -->
    <div id="audiocommands">
        <!-- COMMANDE PLAY -->
        <span onclick="playsong(<?=$musique['id'] ?>)" id="audiocommand_play"><img src="http://www.aht.li/3055457/Play_Gris.png"
                alt="Play" /></span>
        <!-- COMMANDE PAUSE -->
        <span onclick="pausesong(<?=$musique['id'] ?>)" id="audiocommand_pause" style="display: none;"><img
                src="http://www.aht.li/3055456/Pause_gris.png" alt="Pause" /></span>
        <!-- TEMPS DE LA CHANSON -->
        <span id="audio_time">0:00</span>
        <!-- BARRE DE PROGRESSION DE LA CHANSON -->
        <input type="range" id="audiocommand_time" value="0" max=""></input>
        <!-- COMMANDE VOLUME -->
        <span id="audiocommand_volume_bloc">
            <img id="audiocommand_volume_full" src="http://www.aht.li/3055459/Volume_Max_Gris.png"
                alt="Volume Maxumum" />
            <img id="audiocommand_volume_middle" src="http://www.aht.li/3055460/Volume_Middle_Gris.png"
                alt="Volume Middle" style="display: none;" />
            <img id="audiocommand_volume_low" src="http://www.aht.li/3055458/Volume_Low_Gris.png" alt="Volume Minimum"
                style="display: none;" />
            <img id="audiocommand_volume_off" src="http://www.aht.li/3055461/Volume_No_gris.png" alt="Volume Off"
                style="display: none;" />
            <span id="audiocommand_volume_rangebloc">
                <input type="range" id="audiocommand_volume" value="10" max="10"></input>
            </span>
        </span>
        <!-- COMMANDE RÉPÉTER LA CHANSON -->
        <span onclick="loopsongstart(<?=$musique['id'] ?>)" id="audiocommand_loopstart"><img src="http://www.aht.li/3055455/Loop_gris.png"
                alt="Repeat" /></span>
        <!-- COMMANDE ARRÊTER DE RÉPÉTER LA CHANSON -->
        <span onclick="loopsongstop(<?=$musique['id'] ?>)" id="audiocommand_loopstop" style="display: none;"><img
                src="http://www.aht.li/3055455/Loop_gris.png" alt="No Repeat" /></span>
    </div>
    <!-- FIN COMMANDES DU LECTEUR AUDIO -->
    <!-- LECTEUR AUDIO -->
    <audio id="lecteuraudio_<?=$musique['id'] ?>" preload="none" onended="nextsong()" src="<?=$musique['url_musique'] ?>"> Votre
        navigateur ne supporte
        pas ce lecteur audio. </audio>
    <!-- FIN LECTEUR AUDIO -->
</div>