<?php

/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;
?>
<div class="single__box">
	<article class="policy__box article">
		<h2>Ваш заказ принят. Благодарим вас.</h2>
		<p>Старт дан. Наши поваряты уже бегут готовить Ваш заказ.</p>
		<a class="card__box__btn__add error-404--btn" href="<?php echo site_url(); ?>">Вернуться домой</a>
	</article>
</div>