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
                <div class="delivery__box__items">
                    <?php echo wpautop(the_content());?>
                </div>
                <div class="delivery__box__items">
                    <ul class="delivery__list">
                        <li class="delivery__list__items delivery__list__items--grren">
                            <h3>Зеленая зона: <br/> Сумма минимального заказа - 15 рублей</h3>
                            <p>Время доставки от 45 мин до 65 мин в зависимости от загруженности (прием заказов с 11:00 до 22:50)</p>
                        </li>
                        <li class="delivery__list__items delivery__list__items--yellow">
                            <h3>Желтая зона: <br/> Сумма минимального заказа - 20 рублей</h3>
                            <p>Время доставки от 45 мин до 75 мин в зависимости от загруженности (прием заказов с 11:00 до 22:50)</p>
                        </li>
                        <li class="delivery__list__items delivery__list__items--red">
                            <h3>Красная зона: <br/> Заказ от 35 рублей + платная доставка (4 рубля)</h3>
                            <p>Время доставки от 60 мин до 85 мин в зависимости от загруженности (прием заказов с 11:00 до 22:30)</p>
                        </li>
                        <li class="delivery__list__items delivery__list__items--blue">
                            <h3>Синяя зона: <br/> Заказ от 40 рублей + платная доставка (4 рубля)</h3>
                            <p>Время доставки от 45 мин до 75 мин в зависимости от загруженности (прием заказов с 11:00 до 22:50)</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="map">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/map.jpg" alt="" style="width: 100%;">
    </section>
<?php get_footer();?>