<div class="item-search">
    <form method="post" action="index.php">
        <input type="search" name="s" value="<?php if (isset($_POST['s'])) {echo $_POST['s'];}; ?>" placeholder="Lady Gaga"/>
        <input type="hidden" name="target" value="search">
        <input type="hidden" name="origin" value="page">
        <input type="number" max="25" value="<?php echo $item->getMax();?>" name="amount" />
        <button type="submit"><i class="fa fa-search"></i> </button>
    </form>
</div>
<!-- made by Menno & Tycho -->
