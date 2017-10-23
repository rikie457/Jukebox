<?php
include "../includes/functions.php";
$youtube = new youtube;
$spotify = new Spotify;
$item = new Item();
new Database('www.tychoengberink.nl', 'jukebox', '1234', 'Jukebox');

session_start();

new user();
/* made by Menno & Tycho */

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");