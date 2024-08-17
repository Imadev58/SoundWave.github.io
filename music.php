<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .song-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .song-item {
            background-color: #1db954;
            border-radius: 10px;
            padding: 20px;
            width: 200px;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .song-item:hover {
            background-color: #1aa34a;
        }
        .song-item img {
            width: 100%;
            border-radius: 10px;
        }
        .song-item h3 {
            margin: 10px 0;
            font-size: 18px;
        }
        .player-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #282828;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
        }
        .player-bar button {
            background-color: transparent;
            border: none;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>My Music Library</h1>
        <div class="song-list">
            <?php
            $dir = 'songs/';
            $files = array_diff(scandir($dir), array('.', '..'));
            foreach ($files as $file) {
                $file_info = pathinfo($file);
                $song_name = $file_info['filename'];
                $image = $dir . $song_name . '.jpg'; // Assuming the images have the same name as the songs

                echo "<div class='song-item'>";
                echo "<img src='$image' alt='$song_name'>";
                echo "<h3>$song_name</h3>";
                echo "<button onclick='playSong(\"$file\")'>Play</button>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <div class="player-bar">
        <button onclick="prevSong()">⏮️</button>
        <span id="current-song">No song playing</span>
        <button onclick="nextSong()">⏭️</button>
        <span id="duration">0:00 / 0:00</span>
    </div>

    <script>
        let currentSong = null;
        let audio = new Audio();
        let currentIndex = 0;
        const songs = <?php echo json_encode(array_values($files)); ?>;
        
        function playSong(file) {
            if (currentSong === file) {
                if (audio.paused) {
                    audio.play();
                } else {
                    audio.pause();
                }
            } else {
                currentSong = file;
                currentIndex = songs.indexOf(file);
                audio.src = 'songs/' + file;
                audio.play();
                document.getElementById('current-song').innerText = file.replace('.mp3', '');
            }

            audio.ontimeupdate = () => {
                document.getElementById('duration').innerText = `${formatTime(audio.currentTime)} / ${formatTime(audio.duration)}`;
            };
        }

        function prevSong() {
            currentIndex = (currentIndex - 1 + songs.length) % songs.length;
            playSong(songs[currentIndex]);
        }

        function nextSong() {
            currentIndex = (currentIndex + 1) % songs.length;
            playSong(songs[currentIndex]);
        }

        function formatTime(seconds) {
            const min = Math.floor(seconds / 60);
            const sec = Math.floor(seconds % 60);
            return `${min}:${sec < 10 ? '0' : ''}${sec}`;
        }
    </script>
</body>
</html>
