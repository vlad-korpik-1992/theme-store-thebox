<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
  exit;
}

?>
<div class="checkout">
  <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

    <div class="checkout__box">

      <div class="checkout__column">
        <?php if ($checkout->get_checkout_fields()) : ?>

          <?php do_action('woocommerce_checkout_before_customer_details'); ?>

          <?php do_action( 'woocommerce_checkout_billing' ); ?>
          <?php do_action( 'woocommerce_checkout_shipping' ); ?>

          <?php do_action('woocommerce_checkout_after_customer_details'); ?>

        <?php endif; ?>

        <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>


      </div>
      <div class="checkout__column">

        <h3 class="checkout__column__title">Ваш заказ</h3>

        <?php do_action('woocommerce_checkout_before_order_review'); ?>
        <div id="order_review" class="woocommerce-checkout-review-order">
          <?php do_action('woocommerce_checkout_order_review'); ?>
        </div>

        

        <?php do_action('woocommerce_checkout_after_order_review'); ?>


        <?php do_action('woocommerce_after_checkout_form', $checkout); ?>
      </div>
    </div>

  </form>
</div>