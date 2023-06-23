<?php
/**
  * Template Name: Акции
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
    <section class="stocks">
        <?if( have_rows('stocks') ): $item = 1;
            while( have_rows('stocks') ) : the_row();?>
                <div class="stocks__box">
                    <div class="wrapper">
                        <div class="stocks__box__inner <? if($item == 2):?>stocks__box__inner--revers<?endif; ?>" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                            <div class="stocks__box__inner__column">
                                <img class="stocks__img" src="<?the_sub_field('stocks_img')?>" alt="">
                            </div>
                            <div class="stocks__box__inner__column">
                                <h2><?the_sub_field('stocks_title'); echo $item;?></h2>
                                <? if(get_sub_field('stocks_file')):?>
                                    <a href="<? the_sub_field('stocks_file')?> " target="_blank">Правила участия в бонусной программе</a>
                                <? endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?  if($item == 2): $item = 1; else: $item += 1; endif; endwhile;?>
        <?endif;?>
    </section>
    <section class="map">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/map.jpg" alt="" style="width: 100%;">
    </section>
<?php get_footer();?>