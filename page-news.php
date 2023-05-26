<?php
/**
  * Template Name: Блог
*/
?>
<?php get_header();?>
    <section class="category category--border">
        <div class="wrapper">
            <div class="category__head category__head--nocategories">
                <div class="category__head__items category__head__items--column">
                    <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs('/'); ?>
                    <h1><?php single_post_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="blog">
        <div class="wrapper">
            <div class="blog__box">
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status'       => 'publish',
                        'orderby'  => 'DESC'
                    );
                    $temp = $wp_query;
                    $wp_query= null;
                    $wp_query = new WP_Query($args);
                    while ($wp_query -> have_posts()) : $wp_query -> the_post();
                        $preview = get_field('single_preview', $posts['ID']);
                        $short_preview = wp_trim_words( $preview, 18, '...' );
                ?>
                        <div class="blog__box__items">
                            <div class="blog__box__items__inner">
                                <a class="blog__items__link-img" href="<?php echo get_permalink($posts['ID']); ?>">
                                    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $posts['ID'] ) ); ?>" alt="<?php the_title()?>">
                                </a>
                                <a class="blog__items__link" href="<?php echo get_permalink($posts['ID']); ?>"><?php the_title()?></a>
                                <?php echo wpautop($short_preview)?>
                                <a class="blog__items__readme" href="<?php echo get_permalink($posts['ID']); ?>">Подробнее</a>
                            </div>
                        </div>
                <?php
                    endwhile;
                    $wp_query = null;								
                    $wp_query = $temp;	
                    wp_reset_query();
                ?>
            </div>
        </div>
    </section>
    <section class="map">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/map.jpg" alt="" style="width: 100%;">
    </section>
<?php get_footer(); ?>