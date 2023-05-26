<?php get_header(); ?>
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
                <article class="single__box__article article">
                    <img src="<?php the_post_thumbnail_url(  )?>" alt="<? echo the_title(); ?>">
                    <? echo wpautop(the_content()) ?>
                </article>
                <div class="single__box__sidebar">
					<?php 
						$args = array (
							'post_type' => 'post',
							'posts_per_page'    => 4,
							'post__not_in' => array (get_the_ID()),
							'orderby'  => 'rand',
							'post_status' => 'publish'
						);
						$result = wp_get_recent_posts($args);
						foreach ($result as $post) :
					?>
							<div class="single__box__sidebar__items">
								<a href="<?php echo get_permalink($post['ID']); ?>">
									<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post['ID'] ) ); ?>" alt="<? echo $post['post_title']?>">
								</a>
								<a class="single__box__sidebar__link" href="<?php echo get_permalink($post['ID']); ?>"><? echo $post['post_title']?></a>
							</div>
					<?php
						endforeach;
					?>
                </div>
            </div>
        </div>
    </section>
	<section class="map">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/map.jpg" alt="Карта кафе thebox99 в Гомеле" style="width: 100%;">
    </section>
<?php get_footer(); ?>
