<?php
    $product_data = wc_get_product( get_the_ID() );
    $item = get_query_var( 'item' )
?>
<div class="products__box__half <?php if($item % 2 == 0): echo 'products__box__half--borderrnone'; endif;?>">
    <div class="products__box__half__inner">
        <a class="products__box__half__imglink products__box__half__imglink--pizza" href="<?php echo get_permalink($posts['ID']); ?>">
            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID())?>" alt="">
        </a>
        <div class="products__box__half__info">
            <div class="products__box__half__content">
                <a href="<?php echo get_permalink($posts['ID']); ?>"><?php the_title(); ?></a>
                <p><?php the_content(); ?></p>
            </div>
            <div class="products__box__half__price">
                <span><?php echo $product_data->get_price(); ?> BYN</span>
                <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php">
                    <input type="hidden" name="action" value="modalOpen">
                    <input type="hidden" name="productId" value="<?php echo get_the_ID();?>">
                    <button class="put_in_cart" type="submit">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/btn_backet.png" alt="">
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>