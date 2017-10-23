<?php

/**
 * Class Playlist
 *
 * De class die de playlisten beheerd.
 */
class Playlist extends Item
{
    /**
     * Dit is de functie de een nummer bij een playlist koppelt.
     *
     * @param $song_id Het id van het desbetreffende nummer
     * @param $playlist_id Het id van de desbetreffende playlist
     * @return bool true bij een succes false bij een fail.
     */
    public static function addSongToPlaylist($song_id, $playlist_id)
    {
        if (!Database::insert(sprintf('INSERT INTO playlist_items (playlist_id, song_id) values (%d, %d)', $playlist_id, $song_id))) {
            return false;
        }
        return true;
    }

    /**
     * De functie die alle playlisten ophaald van de gebruiker.
     *
     * @return array|null|object alle playlisten van een gebruiker.
     */
    public static function getPlaylists()
    {
        return Database::select(sprintf("select p.*, i.src from playlist as p left JOIN images as i on i.playlist_id = p.id where p.user_id = %d", user::getId()));
    }

    /**
     * Deze functie haalt alle nummers op van een playlist.
     *
     * @param $playlist_id Het id van de desbetreffende playlist.
     * @return array|null|object alle nummers van een beplaade playlist.
     */
    public static function getItems($playlist_id)
    {
        if ($playlist_id) {
            return Database::select(sprintf("select * from playlist_items where playlist_id = %d", $playlist_id));
        }
    }
}