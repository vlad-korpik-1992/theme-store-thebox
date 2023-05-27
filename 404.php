<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package TheBox
 */

get_header(); ?>

	<section class="category category--border">
        <div class="wrapper">
            <div class="category__head category__head--nocategories">
                <div class="category__head__items category__head__items--column">
                    <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs('/'); ?>
                    <h1>Страница не найдена</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="single">
        <div class="wrapper">
            <div class="single__box">
                <article class="policy__box article">
                    <h2>404</h2>
					<p>Упс... Данная ошибка означает, что вы пытаетесь перейти по адресу, которого не существует.</p>
					<p>Страница по этому адресу недоступна.</p>
					<a class="card__box__btn__add error-404--btn" href="<?php echo site_url(); ?>">Вернуться домой</a>
                </article>
            </div>
        </div>
    </section>
	<section class="map">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/map.jpg" alt="" style="width: 100%;">
    </section>
<?php get_footer();?>
