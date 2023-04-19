// JavaScript pour l'affichage aléatoire de 5 musiques sur la page d'accueil (acceuil.html)
function displayRandomSongs() {
    const container = document.getElementById('random-songs-container');
    // Remplacez cette liste par les données récupérées de la base de données
    const songs = [
        { id: 1, title: 'Song 1', artist: 'Artist 1', album: 'Album 1', cover: 'cover1.jpg' },
        { id: 2, title: 'Song 2', artist: 'Artist 2', album: 'Album 2', cover: 'cover2.jpg' },
        { id: 3, title: 'Song 3', artist: 'Artist 3', album: 'Album 3', cover: 'cover3.jpg' },
        { id: 4, title: 'Song 4', artist: 'Artist 4', album: 'Album 4', cover: 'cover4.jpg' },
        { id: 5, title: 'Song 5', artist: 'Artist 5', album: 'Album 5', cover: 'cover5.jpg' },
    ];

    const randomSongs = [];
    while (randomSongs.length < 5) {
        const randomIndex = Math.floor(Math.random() * songs.length);
        if (!randomSongs.includes(songs[randomIndex])) {
            randomSongs.push(songs[randomIndex]);
        }
    }

    randomSongs.forEach(song => {
        const songElement = document.createElement('div');
        songElement.classList.add('song');
        songElement.innerHTML = `
            <img src="${song.cover}" alt="${song.title} - ${song.artist}" />
            <h3>${song.title}</h3>
            <h4>${song.artist}</h4>
            <p>${song.album}</p>
        `;
        container.appendChild(songElement);
    });
}

displayRandomSongs();
let audio = '/mp3/Californication.mp3'; //document.getElementById('/mp3/Californication.mp3');
console.log(audio);
let playPauseButton = document.getElementById('play-pause');
let isPlaying = false;

function togglePlayPause() {
    if (isPlaying) {
        audio.pause();
        playPauseButton.innerText = 'Play';
    } else {
        audio.play();
        playPauseButton.innerText = 'Pause';
    }
    isPlaying = !isPlaying;
}

function previousTrack() {
    currentTrackIndex--;
    if (currentTrackIndex < 0) {
        currentTrackIndex = playlist.length - 1;
    }
    loadTrack(currentTrackIndex);
    playTrack();
}

function nextTrack() {
    currentTrackIndex++;
    if (currentTrackIndex >= playlist.length) {
        currentTrackIndex = 0;
    }
    loadTrack(currentTrackIndex);
    playTrack();
}

audio.addEventListener('ended', function () {
    nextTrack();
});

function addCoupDeCoeur() {
    let musique_id = document.getElementById('audioPlayer').dataset.musiqueId;
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajouter_coup_de_coeur.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          alert('La musique a été ajoutée aux coups de cœur !');
        } else {
          alert('Une erreur est survenue lors de l\'ajout de la musique aux coups de cœur.');
        }
      }
    };
    xhr.send('musique_id=' + musique_id);
  }
  
  function Play_Pause(){
    $("#player4").MusicPlayer({
        type: "audio",
        title: "Black Beatles",
        artist: "Rae Sremmurd ft. Gucci Mane",
        track_URL: "mp3/Lucy_In_The_Sky_With_Diamonds.mp3",
        downloadable: "true",
        apple_music: "https://itunes.apple.com/us/music-video/black-beatles-feat.-gucci/id1157185228",
        amazon_music: "https://www.amazon.com/Black-Beatles-feat-Gucci-Clean/dp/B01E7RX5QW",
        extra_purchase: "https://play.spotify.com/track/21xJVN5wEbJogczYxfZhqR"
      });
  }