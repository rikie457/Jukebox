<div class="navigator">
    <div class="nav-container">
        <div class="item <?php if (isset($_POST['target']) && $_POST['target'] == 'search') {
            echo 'active';
        } ?>">
            <form method="post" action="index.php">
                <input type="hidden" name="target" value="search">
                <input type="hidden" name="origin" value="nav">
                <input type="submit" value="Zoeken">
            </form>
        </div>
        <div class="item <?php if (isset($_POST['target']) && $_POST['target'] == 'playlist') {
            echo 'active';
        } ?>">
            <form method="post" action="index.php">
                <input type="hidden" name="target" value="playlist">
                <input type="submit" value="Playlist">
            </form>
        </div>
        <div class="item">
            <form method="post" action="index.php">
                <input type="hidden" name="target" value="logout">
                <input type="submit" value="Logout">
            </form>
        </div>
        <div class="item-name">
            <?php
            if ( isset($_SESSION['user']) ) {
                echo $_SESSION['user'][0]->fullname;
           }
           ?>
        </div>
        <div class="item-search">
            <form method="post" action="index.php">
                <input type="search" name="s" placeholder="Lady Gaga" value="<?php if (isset($_POST['s'])) {
                    echo $_POST['s'];
                }; ?>"/>
                <input type="hidden" name="target" value="search">
                <input type="hidden" name="origin" value="nav_search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</div>