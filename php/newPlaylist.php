<?php
include "../includes/declaration.php";
if ($_POST != "") {
    if (Database::insert("playlist", array("name" => $_POST['playlistname'], "user_id" => $_SESSION['user'][0]->id, "date" => date("Y-m-d")))) {
        $playlists = Database::select(sprintf("select * from playlist where user_id = %d", $_SESSION['user'][0]->id));
        foreach ($playlists as $playlist) {
            echo "<div class='playlist-item' onclick='PlaylistRequest(" . $playlist->id . ")'>";
            echo $playlist->name;
            echo "</div>";
        }
        echo "<div class='playlist-item newPlaylist' onclick='newPlaylist()'>";
        echo "<i class='fa fa-plus'></i>";
        echo "</div>";
    } else {
        echo "error";
    }
}