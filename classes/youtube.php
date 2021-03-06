<?php


/**
 * Class youtube
 *
 * Regeld de youtube API.
 */
class youtube extends API
{
    /**
     *Dit is de authenticatie code voor de youtube api.
     */
    const authenticationKey = "AIzaSyBEDmFi737ohRNpxtBAPP8uP9iB9fraJ0E";


    /**
     * Dit is de functie die zoekt in youtube.
     *
     * @param $s Het trefwoord waarop gezocht moet worden.
     * @param $max Het aantal items die terug gegeven worden.
     * @return array Een array met items die in spotify worden verwerkt.
     */
    function youtubesearch($s, $max)
    {
        if (!empty($s)) {
            $url = sprintf(API::Youtube_BASE_URL . '?part=snippet&part=contentDetails&maxResults=%d&q=%s&key=%s&type=video', $max, urlencode($s), self::authenticationKey);
            $results = $this->getYoutubeResult($url);
            $temp_result = json_decode($results, true);
            $items = array();
            if (isset($temp_result['items'])) {
                foreach ($temp_result['items'] as $item) {
                    $video_details = json_decode(file_get_contents(sprintf("https://www.googleapis.com/youtube/v3/videos?id=%s&part=contentDetails&key=%s", $item['id']['videoId'], self::authenticationKey)));
                    $dur = $video_details->items[0]->contentDetails->duration;
                    preg_match_all('/(\d+)/', $dur, $parts);
                    if (isset($parts[0][2])) {
                        $parts = $parts[0][0] * 3600 + $parts[0][1] * 60 + $parts[0][2];
                    } else if (isset($parts[0][1])) {
                        $parts = $parts[0][0] * 60 + $parts[0][1];
                    } else {
                        $parts = $parts[0][0];
                    }
                    array_push($items, $item['id']['videoId']);
                    array_push($items, $parts);
                }
                return $items;
            }
        }
    }
}