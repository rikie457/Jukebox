<?php
include "../includes/declaration.php";
if (!Database::select(sprintf("select * from playlist_items where playlist_id = %d and song_id = %s",$_POST['request'],$_POST['request2']))) {
    Database::insert("playlist_items", array("playlist_id" => $_POST['request'], "song_id" => $_POST['request2']));
    echo "Nummer toegevoegd.";
}else{
    echo "Nummer staat al in deze playlist.";
}