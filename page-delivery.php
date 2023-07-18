<?php
/**
  * Template Name: Доставка и оплата
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
    <section class="delivery">
        <div class="wrapper">
            <div class="delivery__box">
                <div class="delivery__box__items" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    <?php echo wpautop(the_content());?>
                </div>
                <div class="delivery__box__items">
                    <ul class="delivery__list">
                        <li class="delivery__list__items delivery__list__items--grren" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                            <h3>Зеленая зона: <br/> Сумма минимального заказа - 15 рублей</h3>
                            <p>Время доставки от 45 мин до 65 мин в зависимости от загруженности (прием заказов с 11:00 до 22:50)</p>
                        </li>
                        <li class="delivery__list__items delivery__list__items--yellow" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1500">
                            <h3>Желтая зона: <br/> Сумма минимального заказа - 20 рублей</h3>
                            <p>Время доставки от 45 мин до 75 мин в зависимости от загруженности (прием заказов с 11:00 до 22:50)</p>
                        </li>
                        <li class="delivery__list__items delivery__list__items--red" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
                            <h3>Красная зона: <br/> Заказ от 35 рублей + платная доставка (4 рубля)</h3>
                            <p>Время доставки от 60 мин до 85 мин в зависимости от загруженности (прием заказов с 11:00 до 22:30)</p>
                        </li>
                        <li class="delivery__list__items delivery__list__items--blue" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2500">
                            <h3>Синяя зона: <br/> Заказ от 40 рублей + платная доставка (4 рубля)</h3>
                            <p>Время доставки от 45 мин до 75 мин в зависимости от загруженности (прием заказов с 11:00 до 22:50)</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="map">
        <meta itemprop="latitude" content="52.426011" />
    	<meta itemprop="longitude" content="31.014866" />
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d608.2348353334202!2d31.015279578816273!3d52.42589677873652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46d4696d8a8b1b9d%3A0x4b8d286027ee3479!2sThe%20Box%2099!5e0!3m2!1sen!2sby!4v1589817030941!5m2!1sen!2sby" width="100%" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
<?php get_footer();?>