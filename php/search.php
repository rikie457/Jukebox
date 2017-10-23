<?php
if (isset($_POST['amount']) && $_POST['amount']) {
    if ($_POST['amount'] <= 0) {
        $item->setMax(3);
    } else {
        $item->setMax($_POST['amount']);
    }
} else {
    $item->setMax(3);
}
if (isset($_POST['s']) && $_POST['s'] != '') {
    $mainarray = $spotify->search($_POST['s'], $item->getMax());
    $artist = $spotify->searchartist();
}

?>
<div class="container">
    <?php
    include "search_form.php";
    ?>
    <div class="results">
        <div id="artistheader">
            <div id="artistfoto">
                <?php
                if (isset($_POST['s']) && $_POST['s'] != '' && isset($artist->images)) {
                    echo "<img id='artistfotoid' src=" . $artist->images[0]->url . " width='160px' height='160px'>";
                    echo "<h2>" . $artist->name . "</h2>";
                } ?>
            </div>
            <div id="artistinformation">
                <?php if (isset($artist->error)) {
                    echo "<h2 id='foutmelding'>Ik kon helaas niks vinden</h2>";
                }
                ?>
                <div id="artistvolgers">
                    <?php
                    if (!isset($artist->error) && isset($_POST['s']) && $_POST['s'] != '') {
                        echo "<p>Volgers: " . $artist->followers->total . "</p>";
                    }
                    ?>

                </div>
                <div id='artistgenres'>

                    <?php
                    if (!isset($artist->error) && isset($_POST['s']) && $_POST['s'] != '') {
                        echo "<h3>Genres</h3>";
                        $genre = $artist->genres;
                        for ($i = 0; $i < count($artist->genres); $i++) {
                            echo $genre[$i] . "<br>";

                        }
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <div id="artistcontent">
                <?php
                if (!isset($artist->error) && isset($_POST['s']) && $_POST['s'] != '') {
                    $playlists = Database::select(sprintf("select * from playlist where user_id = %d", $_SESSION['user'][0]->id));
                    for ($i = 0, $x = $item->getMax(); $i < $x; $i++) {
                        echo '<div style="float:left; width: 33%;">';
                        if (isset($mainarray[$i][0]->youtubeembed)) {
                            echo '<iframe width="100%" height="200" src="https://www.youtube.com/embed/' . $mainarray[$i][0]->youtubeembed . '" frameborder="1" allowfullscreen style="display:block;"></iframe>';
                        }
                        if (isset($mainarray[$i][0]->spotifyembed)) {
                            echo '<iframe width="100%" height="80" src="https://embed.spotify.com/?uri=' . $mainarray[$i][0]->spotifyembed . '" frameborder="0" style="display:block;"></iframe>';
                        }
                        echo '<i onclick="showPlaylist(this)" class="fa fa-2x fa-plus" id="js-show-playlists"></i>';
                        echo '<div id="playlists">';
                        foreach ($playlists as $playlist) {
                            echo sprintf('<div class="playlist" onclick="addToPlaylist(%d,%d)">', $playlist->id, $mainarray[$i][0]->id);
                            echo $playlist->name;
                            echo "</div>";
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
                <br style="clear:both;">
            </div>
        </div>
    </div>
</div>