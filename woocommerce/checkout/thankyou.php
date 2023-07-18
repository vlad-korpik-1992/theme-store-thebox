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
		<?php
			global $wp;

			if ( isset($wp->query_vars['order-received']) ) {
				$order_id = absint($wp->query_vars['order-received']);
				$order    = wc_get_order( $order_id );
				$order_data = $order->get_data();
				$order_meta = get_post_meta($order_id); 
				$comment = $order->get_customer_note();
				$orderForm = '<b>Заказ</b>:%0A';
				foreach ( $order->get_items() as  $item_key => $item_values ) {
					$item_data = $item_values->get_data();
					$product_id = $item_values->get_product_id();
					$product_category = wc_get_product_category_list($product_id);
					if(strpos($product_category, 'toppings-pizza-sauces')){
						$orderForm .= '<b>Допы (соусы) :</b>' .$item_data['name']. ' - '.$item_data['quantity']. 'шт.';
						$orderForm .= '%0A';
						$orderForm .= '-------------';
						$orderForm .= '%0A';
					}
					else if(strpos($product_category, 'toppings-pizza-stuffing')){
						$orderForm .= '<b>Допы (начинка) :</b>' .$item_data['name']. ' - '.$item_data['quantity']. 'шт.';
						$orderForm .= '%0A';
						$orderForm .= '-------------';
						$orderForm .= '%0A';
					}
					else if(strpos($product_category, 'sushi-dips-sauces')){
						$orderForm .= '<b>Допы для суш :</b>' .$item_data['name']. ' - '.$item_data['quantity']. 'шт.';
						$orderForm .= '%0A';
						$orderForm .= '-------------';
						$orderForm .= '%0A';
					}
					else{
						$orderForm .= $item_data['name']. ' - '.$item_data['quantity'].' шт.';
						$orderForm .= '%0A';
						$orderForm .= '-------------';
						$orderForm .= '%0A';
					}
				}
				$token = '6020821705:AAEKbS9nWXGGx4XaTTKaS5-RnCYJp5JF7vg';
				$chat_id = '-874354596';
				$messageTelegram = "<b>Номер заказа:</b> ".$order_data["id"];
				$messageTelegram .= "%0A<b>Статус заказа:</b> ".wc_get_order_status_name($order_data["status"]);
				$messageTelegram .= "%0A<b>Сумма заказа:</b> ".$order_data["total"];
				$messageTelegram .= " ".$order_data["currency"];
				$messageTelegram .= "%0A<b>Имя:</b> ".$order_data["billing"]["first_name"];
				$messageTelegram .= "%0A<b>Телефон:</b> ".$order_data["billing"]["phone"];
				$messageTelegram .= "%0A<b>Способ оплаты:</b> ".$order_data["payment_method_title"];
				$messageTelegram .= "%0A<b>Способ доставки:</b> ".$order_meta["Способ доставки"][0];
				$messageTelegram .= "%0A<b>Адрес доставки:</b> ".$order_meta["Адрес доставки"][0];
				$messageTelegram .= "%0AПодъезд - ".$order_meta["Подъезд"][0];
				$messageTelegram .= "%0AЭтаж - ".$order_meta["Этаж"][0];
				$messageTelegram .= "%0AКвартира - ".$order_meta["Квартира"][0];
				$messageTelegram .= "%0A<b>Комментарий:</b> ".$comment;
				$messageTelegram .= "%0A".$orderForm;
				$sendTextToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$messageTelegram}");
			}
		?>
	</article>
</div>