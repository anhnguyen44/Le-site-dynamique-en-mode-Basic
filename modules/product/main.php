<?php get_header('product');?>
<div id="content">
    <h1>PRODUCT - Danh mục <?php if(isset($_GET['cat_id'])) echo $_GET['cat_id'];?></h1>
    <?php
    if (!empty($list_products)) {
        foreach ($list_products as $product) {
            ?>
            <div class="post_pro">
                <a href="" class="thumb_img_pro"><img src="<?php echo $product['img_pro']; ?>"></a>
                <div class="thumb_img_pro_bottom"><a href="" class="name_pro"><strong><?php echo $product['name_pro']; ?></strong></a>
                    <p><?php echo $product['prix_pro']; ?></p></div>
            </div>
    <?php }
}
?>
</div>
<?php get_footer(); ?>