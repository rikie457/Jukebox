<?php
include "../includes/declaration.php";

$playlist_id = $_POST['playlist_id'];
$items = Database::select(sprintf("select * from playlist_items pi INNER JOIN song s on s.id = pi.song_id where playlist_id = %d", $playlist_id));
$play_range = '[';
$play_dur = '[';
$playlistDur = 0;
foreach ($items as $item) {
    $play_dur .= '"' . $item->duration . '",';
    $playlistDur += $item->duration;
}
function calculateTimeFromSeconds($seconds)
{

    $hours = floor($seconds / 3600);
    $seconds = $seconds - $hours * 3600;

    $minutes = floor($seconds / 60);
    $seconds = $seconds - $minutes * 60;
    return $hours . ":" . $minutes . ":" . $seconds . "<br>";
}

$playlistDuration = calculateTimeFromSeconds($playlistDur);
if ($playlistDuration != "0:0:0<br>") {
    echo "afspeeltijd: " . $playlistDuration . "<hr/>";
    foreach ($items as $item) {
        $play_range .= '"' . $item->youtubeembed . '",';
        echo "<div class='js-start-music' onclick='getNextSong($(this).children(`input`).val()," . $item->duration . ")'><input type='hidden' value='" . $item->youtubeembed . "'> " . $item->songname . "</div>";
    }
    $play_range = substr($play_range, 0, strlen($play_range) - 1);
    $play_range .= "]";
    $play_dur = substr($play_dur, 0, strlen($play_dur) - 1);
    $play_dur .= "]";

    echo "<i class='fa fa-play' onclick='getNextSong(" . $play_range . "," . $play_dur . ")'></i>";

} else {
    echo "Helaas, Deze playlist heeft nog geen liedjes!";
}