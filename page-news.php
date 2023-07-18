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
                        <div class="blog__box__items" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
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
        <meta itemprop="latitude" content="52.426011" />
    	<meta itemprop="longitude" content="31.014866" />
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d608.2348353334202!2d31.015279578816273!3d52.42589677873652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46d4696d8a8b1b9d%3A0x4b8d286027ee3479!2sThe%20Box%2099!5e0!3m2!1sen!2sby!4v1589817030941!5m2!1sen!2sby" width="100%" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
<?php get_footer(); ?>