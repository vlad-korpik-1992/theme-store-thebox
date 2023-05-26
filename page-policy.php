<?php
/**
  * Template Name: Политика конфиденциальности
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
    <section class="single">
        <div class="wrapper">
            <div class="single__box">
                <article class="policy__box article">
                    <?php echo wpautop(the_content());?>
                </article>
            </div>
        </div>
    </section>
    <section class="map">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/map.jpg" alt="" style="width: 100%;">
    </section>
<?php get_footer();?>