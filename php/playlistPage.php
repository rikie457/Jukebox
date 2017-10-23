<div class="container playlistPage">
    <div class='playlist-frame'>
        <?php
        # @playlists = array->objects
        $playlists = Playlist::getPlaylists();
        foreach ($playlists as $playlist) {
            echo "<div class='playlist-item' onclick='PlaylistRequest(".$playlist->id.")'>";
            echo $playlist->name;
            echo "</div>";
        }
        echo "<div class='playlist-item newPlaylist' onclick='newPlaylist()'>";
        echo "<i class='fa fa-plus'></i>";
        echo "</div>";
        /* made by Menno & Tycho */
        ?>
    </div>
    <div class='playlist-item-frame'>
    </div>
</div>
