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
        <meta itemprop="latitude" content="52.426011" />
    	<meta itemprop="longitude" content="31.014866" />
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d608.2348353334202!2d31.015279578816273!3d52.42589677873652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46d4696d8a8b1b9d%3A0x4b8d286027ee3479!2sThe%20Box%2099!5e0!3m2!1sen!2sby!4v1589817030941!5m2!1sen!2sby" width="100%" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
<?php get_footer();?>
