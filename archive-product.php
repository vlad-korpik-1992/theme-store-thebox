<?php get_header();
    $term = get_term(get_queried_object()->term_id, get_queried_object()->taxonomy);
    $termParent = ($term->parent == 0) ? $term : get_term($term->parent, get_queried_object()->taxonomy);
    $termchildren = get_term_children($termParent->term_id, $termParent->taxonomy);
?>
    <section class="category category--border">
        <div class="wrapper">
            <div class="category__head <?php if($termchildren == []): echo 'category__head--nocategories'; endif;?>">
                <div class="category__head__items category__head__items--column">
                    <div class="category__head__items category__head__items--column">
                        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs('/'); ?>
                        <h1><?php single_term_title(); ?></h1>
                    </div>
                </div>
                <?php
                    if($termchildren != []):?>
                        <div class="category__head__items category__head__items--end <?php if($term->slug == 'sushi'): echo 'category__head__items--sushi';endif; ?>">
                            <ul class="category__head__list <?php if($term->slug == 'sushi'): echo 'category__head__list--sushi';endif; ?>">
                                <?php 
                                    foreach ($termchildren as $child):
                                        $term = get_term_by( 'id', $child, get_queried_object()->taxonomy );
                                        $thumbId = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                                        $imgSrc = wp_get_attachment_url( $thumbId );?>
                                        <li class="category__head__list__items <?php if($term->slug == 'sushi'): echo 'category__head__list__items--flex';endif; ?>">
                                            <?php
                                                if($termParent->slug == 'pizza'):
                                            ?>
                                                    <form class="filter__form" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php">
                                                        <input type="hidden" name="action" value="myfilter">
                                                        <input type="hidden" name="productCat" value="<?php echo $term->slug;?>">
                                                        <button type="submit" class="category__head__list__link btnPizza">
                                                            <img src="<?php echo $imgSrc;?>" alt="<?php echo $term->name;?>">
                                                            <p><?php echo $term->name;?></p>
                                                        </button>
                                                    </form>
                                            <?php
                                                else:
                                            ?>
                                                <a class="category__head__list__link category__head__list__link--sushi" href="#<?php echo $term->slug;?>">
                                                    <img src="<?php echo $imgSrc;?>" alt="">
                                                    <p><?php echo $term->name;?></p>
                                                </a>
                                            <?php
                                                endif;
                                            ?>
                                        </li>
                                <?php
                                    endforeach
                                ?>
                            </ul>
                        </div>
                <?php
                    endif;
                ?>
            </div>
        </div>
    </section>
    <?php
        if($termParent->slug == 'sushi'):      
    ?>
        <section class="products">
        <?php
            if($termchildren == []):
                $products = true;
            endif;
            foreach ($termchildren as $child):
                $term = get_term_by( 'id', $child, get_queried_object()->taxonomy );
                $thumbId = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                $imgSrc = wp_get_attachment_url( $thumbId );
                $args = array(
                    'post_type' => 'product',
                    'product_cat' => $term->slug,
                    'paged'             => $paged,
                    'posts_per_page'    => 1000,
                    'orderby' => array(
                        'price' => 'DESC'
                    )
                );
                $temp = $wp_query;
                $wp_query= null;
                $query = new WP_Query($args);
                if ( $query->have_posts()) :
        ?>
                    <div class="subcategory" id="<?php echo $term->slug;?>">
                        <div class="wrapper">
                            <div class="subcategory__box">
                                <h2><?php echo $term->name;?></h2>
                                <div class="subcategory__box__inner">
                                    <div class="subcategory__box__inner__items"></div>
                                    <div class="subcategory__box__inner__items"></div>
                                    <div class="subcategory__box__inner__items"></div>
                                    <div class="subcategory__box__inner__items"></div>
                                    <div class="subcategory__box__inner__items"></div>
                                    <div class="subcategory__box__inner__items"></div>
                                    <div class="subcategory__box__inner__items"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper">
                        <div class="products__box">
                            <?php
                                $item = 1;
                                while ( $query->have_posts() ) : $query->the_post();
                                    $product_data = wc_get_product( get_the_ID() );?>
                                    <div class="products__box__half <?php if($item % 2 == 0): echo 'products__box__half--borderrnone'; endif;?>">
                                        <div class="products__box__half__inner">
                                            <a class="products__box__half__imglink products__box__half__imglink--snacks" href="<?php echo get_permalink($posts['ID']); ?>">
                                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID())?>" alt="<?php the_title(); ?>">
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
                            <?php
                                $item += 1;
                                endwhile; wp_reset_postdata();
                                if($item % 2 == 0):?>
                                    <div class="products__box__half products__box__half--borderrnone products__box__half--empty">
                                        <div class="products__box__half__inner"></div>
                                    </div>
                            <?php
                                endif;
                            ?>
                        </div>
                    </div>
        <?php
                endif;
            endforeach;
            if( isset($products) ):
        ?>
            <div class="wrapper">
                <div class="single__box">
                    <article class="policy__box article">
                        <h2>Товар данной категории не добавлен</h2>
                    </article>
                </div>
            </div>
        <?php
            endif;
        ?>
        </section>
    <?php

            else:
    ?>
            <section class="products">
                <div class="wrapper">
                    <?php  
                        $args = array(
                            'post_type' => 'product',
                            'product_cat' => get_queried_object()->slug,
                            'paged'             => $paged,
                            'posts_per_page'    => 1000,
                            'orderby' => array(
                                'price' => 'ASC'
                            )
                        );
                        $temp = $wp_query;
                        $wp_query= null;
                        $query = new WP_Query($args);
                        if ( $query->have_posts()) :
                    ?>
                            <div class="products__box">
                                <?php
                                    $item = 1;
                                    while ( $query->have_posts() ) : $query->the_post();
                                        $product_data = wc_get_product( get_the_ID() );?>
                                        <div class="products__box__half <?php if($item % 2 == 0): echo 'products__box__half--borderrnone'; endif;?>">
                                            <div class="products__box__half__inner">
                                                <a class="products__box__half__imglink <?php if($termParent->slug == 'drinks'): echo 'products__box__half__imglink--drinks'; endif; ?>  <?php if($termParent->slug == 'snacks'): echo 'products__box__half__imglink--snacks'; endif; ?>  <?php if($termParent->slug == 'pizza'): echo 'products__box__half__imglink--pizza'; endif; ?>" href="<?php echo get_permalink($posts['ID']); ?>">
                                                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID())?>" alt="<?php the_title(); ?>">
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
                                <?php
                                    $item += 1;
                                    endwhile; wp_reset_postdata();
                                    if($item % 2 == 0):?>
                                        <div class="products__box__half products__box__half--borderrnone products__box__half--empty">
                                            <div class="products__box__half__inner"></div>
                                        </div>
                                <?php
                                    endif;
                                ?>
                            </div>
                    <?php
                        else: 
                    ?>
                            <div class="products__box">
                                <article class="policy__box article response__box"><h2>Товар данной категории не добавлен</h2></article>
                            </div>
                    <?php
                        endif;
                    ?>
                    <div class="products__box response"></div>
                </div>
            </section>
    <?php
        endif;
    ?>
    <section class="about">
        <div class="wrapper">
            <div class="box">
                <div class="box__half">
                    <div class="about__inner">
                        <?php
                            $term_object = get_queried_object();
                            echo wpautop(get_field('product-cat-about-left','product_cat_'.$term_object->term_id));
                        ?>
                    </div>
                </div>
                <div class="box__half">
                    <div class="about__inner">
                        <div class="info__footer--category">
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                        </div>
                        <?php
                            echo wpautop(get_field('product-cat-about-right','product_cat_'.$term_object->term_id));
                        ?>
                    </div>
                </div>
            </div>
            <div class="about__btn">
                <a class="about__btn__link" href="#">Читать весь текст</a>
            </div>
        </div>
    </section>
    <section class="map">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/map.jpg" alt="" style="width: 100%;">
    </section>
    <section class="modal">
        <div class="wrapper">
            <div class="modal__body">
                <a class="modal__close" href="#">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/modal_close.png" alt="">
                </a>
                <div class="card__box card__box--response"></div>
            </div>
        </div>
    </section>
<?php get_footer();?>