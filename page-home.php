<?php
/**
  * Template Name: Главная страница
*/
?>
<?php get_header();
    $categories = get_categories( [
        'taxonomy'     => 'product_cat',
        'parent' => 0,
        'hide_empty' => 0,
    ]);
?>
    <section class="hero">
        <div class="wrapper">
            <div class="hero__box hero__box--scroll">
                <div class="hero__box__items">
                    <?php
                        foreach ($categories as $category):
                            if( $category->slug == 'pizza' || $category->slug == 'snacks' || $category->slug == 'sushi' || $category->slug == 'drinks'):
                                $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true ); 
                                $image = wp_get_attachment_url( $thumbnail_id );?>
                                <a class="hero__box__link" href="/product-category/<?echo $category->slug;?>">
                                    <div class="hero__box__inner" style="background-image: url(<? echo $image; ?>)">
                                        <div class="hero__box__title"><? echo $category->cat_name; ?></div>
                                    </div>
                                </a>                           
                    <?php
                            endif;
                        endforeach;
                    ?>
                    
                </div>
                <?php
                    if(get_field('stocks', 27)): 
                        $stocks = get_field('stocks', 27);
                        $item = 1;?>
                        <div class="hero__discount">
                        <?php
                            foreach($stocks as $share):
                        ?>
                                <div class="hero__box__discount <?php if( $item == 1 ):?>hero__box__discount--first<?endif;?>">
                                    <a class="hero__box__discount__link" href="<?php echo get_page_link(27)?>" >
                                        <div class="hero__box__discount__inner" style="background-image: url(<?php echo $share['stocks_img_home'];?>)"></div>
                                    </a>
                                </div>
                        <?php
                            $item +=1;
                            endforeach;
                        ?>
                        </div>
                <?php   
                    endif;
                ?>
            </div>
        </div>
    </section>
    <section class="info">
        <div class="wrapper">
            <div class="info__box">
                <div class="info__box__items" data-aos="fade-up" data-aos-duration="800">
                    <?php echo wpautop(the_content());?>
                </div>
                <div class="info__box__items" data-aos="fade-up" data-aos-duration="1200">
                    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>" alt="<?php single_post_title(); ?>">
                </div>
                <div class="info__box__items" data-aos="fade-up" data-aos-duration="1600">
                    <?php echo wpautop( the_field('info-box-right') );?>
                </div>
            </div>
        </div>
        <div class="info__footer">
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="200"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="400"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="600"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="800"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="1000"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="1200"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="1400"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="1600"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="1800"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="2000"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="2200"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="2400"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="2600"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="2800"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="3000"></div>
        </div>
    </section>
    <section class="company">
        <div class="wrapper">
            <h2><?php the_field('company-title')?></h2>
            <?php echo wpautop( the_field('company-content') );?>
            <div class="company__slider">
                <div class="company__slider__items" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/company_slider_01.jpg" alt="">
                </div>
                <div class="company__slider__items company__slider__items--column" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    <img class="company__slider__img" src="<?php bloginfo('template_url'); ?>/assets/img/company_slider_02.jpg" alt="">
                    <img class="company__slider__img" src="<?php bloginfo('template_url'); ?>/assets/img/company_slider_03.jpg" alt="">
                </div>
                <div class="company__slider__items" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    <img class="company__slider__img" src="<?php bloginfo('template_url'); ?>/assets/img/company_slider_04.jpg" alt="">
                </div>
                <div class="company__slider__items company__slider__items--column" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <img class="company__slider__img" src="<?php bloginfo('template_url'); ?>/assets/img/company_slider_02.jpg" alt="">
                    <img class="company__slider__img" src="<?php bloginfo('template_url'); ?>/assets/img/company_slider_03.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="insta">
        <div class="wrapper">
            <div class="insta__box">
                <div class="insta__box__items insta__box__items--first">
                    <h2><?php the_field('insta-title')?></h2>
                    <img class="line" src="<?php bloginfo('template_url'); ?>/assets/img/insta_line.png" alt="">
                    <div class="insta__box__inner">
                        <div class="insta__box__info">
                            <div class="insta__box__info__head">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/insta_img.png" alt="">
                                <p><?php the_field('insta-name')?></p>
                            </div>
                            <p><?php the_field('insta-followers')?></p>
                        </div>
                        <a class="insta__box__link" href="<?php the_field('insta-link')?>">Подписаться</a>
                    </div>
                </div>
                <div class="insta__box__items insta__box__items--row">
                    <img data-aos="fade-up" data-aos-duration="1000" src="<?php bloginfo('template_url'); ?>/assets/img/insta_post_01.png" alt="@thebox.99">
                    <img data-aos="fade-up" data-aos-duration="1400" src="<?php bloginfo('template_url'); ?>/assets/img/insta_post_02.png" alt="instagram.com/thebox.99">
                    <img data-aos="fade-up" data-aos-duration="1800" src="<?php bloginfo('template_url'); ?>/assets/img/insta_post_03.png" alt="instagram">
                    <img data-aos="fade-up" data-aos-duration="3600" src="<?php bloginfo('template_url'); ?>/assets/img/insta_post_04.png" alt="thebox.99">
                </div>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="wrapper">
            <div class="box" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                <div class="box__half">
                    <div class="about__inner">
                        <?php echo wpautop( the_field('about-left') );?>
                    </div>
                </div>
                <div class="box__half">
                    <div class="about__inner">
                        <?php echo wpautop( the_field('about-right') );?>
                    </div>
                </div>
            </div>
        </div>
        <div class="info__footer">
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="200"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="400"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="600"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="800"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="1000"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="1200"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="1400"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="1600"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="1800"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="2000"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="2200"></div>
            <div class="info__footer__items" data-aos="fade-up" data-aos-duration="2400"></div>
        </div>
    </section>
<?php get_footer();?>