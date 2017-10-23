<?php

/**
 * Class API
 *
 * Deze class regelt de calls met CURL.
 */
class API
{
    /**
     *Dit is de basis van de spotify api url.
     */
    const Spotify_BASE_URL = "https://api.spotify.com/v1/";
    /**
     *Dit is de client id van de spotify app.
     */
    const Spotify_CLIENT_ID = "cd1df663d89d45a0b6582d4fa913f2f3";
    /**
     *Dit is de key van de spotify app.
     */
    const Spotify_CLIENT_SECRET = "fb50721fb4af41c6a9175de4c2903a6c";
    /**
     *Dit is de basis van de youtube api url.
     */
    const Youtube_BASE_URL = "https://www.googleapis.com/youtube/v3/search";
    /**
     *Dit is de autenticatie code van de youtube app.
     */
    const Youtube_AUTH_Key = "AIzaSyBEDmFi737ohRNpxtBAPP8uP9iB9fraJ0E";

    /**
     * Deze functie haalt alle spotify resultaten op.
     *
     * @param $url De url van de call.
     * @param $token De token van de accesstoken call.
     * @return bool|mixed Of de call gelukt is.
     */
    function getSpotifyResult($url, $token)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);

        if ($result == FALSE) {
            echo curl_error($curl);
            curl_close($curl);

            return FALSE;
        }
        curl_close($curl);
        return $result;
    }

    /**
     * Deze functie haalt alle youtube resultaten op.
     *
     * @param $url De url van de call.
     * @return bool|mixed Of de call gelukt is.
     */
    function getYoutubeResult($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);

        if ($result == FALSE) {
            echo curl_error($curl);
            curl_close($curl);

            return FALSE;
        }
        curl_close($curl);

        return $result;
    }
}