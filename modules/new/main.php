<?php get_header('new');?>
<div id="content">
    <h1>NEWS</h1>
    <?php
    if (!empty($list_news)) {
        foreach ($list_news as $new) {
            ?>
            <div class="post clearfix">
                <a href="" class="thumb_img"><img src="<?php echo $new['img_news']; ?>"></a>
                <div class="thumb_img_right"><a href="" class="title_news"><strong><?php echo $new['title_news']; ?></strong></a>
                    <p><?php echo $new['desc_news']; ?></p></div>
            </div>
        <?php }
    } ?>
</div>
<?php get_footer(); ?>