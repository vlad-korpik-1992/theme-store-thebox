<?php
$product_data = wc_get_product(get_the_ID());
$product_category = wc_get_product_category_list(get_the_ID());
?>
<div class="card__box__items">
    <img class="card__picture <?php if (strpos($product_category, 'Пицца') || strpos($product_category, 'Напитки')) : echo 'card__picture--pizza';
                                else : echo 'card__picture--product';
                                endif; ?>" src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt="<?php the_title(); ?>">
    <div class="card__box__btn">
        <div class="card__box__btn__amount">
            <a class="amount__minus" href="#">-</a>
            <span class="amount">1</span>
            <a class="amount__plus" href="#">+</a>
        </div>
        <?php
            $productId = get_the_ID();
            $path=$_SERVER['HTTP_REFERER'];
            if (strpos($path,'?')) {
                $path = strstr($path, '?', true);
            }
            $buttonHref=$path;
            if (strpos($product_category, 'Пицца')) :
                $productVariations = $product_data->get_available_variations();
                if($productVariations != []):
                    $productId = $productVariations[0]['variation_id'];
                endif;
            endif;
        ?>
        <a class="card__box__btn__add product_type_simple add_to_cart_button ajax_add_to_cart" href="<?php echo $buttonHref; ?>?add-to-cart=<?php echo $productId; ?>,"> <span>Добавить</span>
            <span class="add__price"><?php echo $product_data->get_price(); ?></span>
            <span>BYN</span>
        </a>
    </div>
</div>
<div class="card__box__items">
    <div class="card__box__items__inner card__box__items__inner--modal">
        <div class="card__box__items__inner__row">
            <h1><?php the_title(); ?></h1>
            <?php 
                if($product_data->get_short_description() != ''):
            ?>
                    <a class="card__box__nutrition" href="#">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/nutrition__info.png" alt="">
                    </a>
                    <div class="nutrition__box">
                        <?php
                        echo wpautop($product_data->get_short_description());
                        ?>
                    </div>
            <?php
                endif;
            ?>
        </div>
        <p><span class="card__gramme"><?php echo $product_data->get_weight(); if (strpos($product_category, 'Напитки')): echo ' л.'; else: echo ' г.'; endif?></span> <?php echo get_the_content(); ?></p>
        <?php
        $variations = [];
        if (strpos($product_category, 'Пицца')) :
            $variations = $product_data->get_available_variations();
        endif;
        if ($variations != []) :
            $item = 1;
        ?>
            <div class="card__sizes">
                <?php
                foreach ($variations as $variationProduct) :
                    $attributes = $variationProduct['attributes'];
                    $attributSize = $attributes['attribute_pa_pizza-size'];
                    $attributSizeRus = str_replace('cm', " см", $attributSize);
                ?>
                    <a class="card__sizes__link <?php if ($item == 1) : echo 'small card__sizes__link--active';
                                                endif ?> <?php if ($item == 2) : echo 'normal';
                                                            endif ?> <?php if ($item == 3) : echo 'big';
                                                                                                                                    endif ?>" href="#" data-cart="<? echo $variationProduct['variation_id']; ?>" data-price="<?php echo $variationProduct['display_regular_price']; ?>" data-gramme="<?php echo $variationProduct['weight']; ?> г."><?php echo $attributSizeRus; ?></a>
                <?php
                    $item++;
                endforeach;
                ?>

            </div>
        <?php
        else :
        ?>
            <div class="card__price--nonvariable card__sizes__link--active" data-cart="<? echo get_the_ID(); ?>" data-price="<?php echo $product_data->get_price(); ?>"></div>
        <?php

        endif; ?>
        <?php 
            if (strpos($product_category, 'Пицца') || strpos($product_category, 'Суши')):
        ?>
                <h2>Добавить по вкусу</h2>
                <div class="card__supplements">
                <?php 
                    if (strpos($product_category, 'Пицца') || strpos($product_category, 'Суши')):
                ?>
                    <div class="card__supplements__items">
                        <a class="card__supplements__link" href="#" id="sauces-modal">
                            <span class="card__supplements__link__title card__supplements__link__title--click" id="sauces-modal">Соусы</span>
                            <svg class="card__svg" id="2sauces-modal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 6">
                                <path d="M0.197889 1.18894L4.63061 5.84792C4.68338 5.90322 4.74055 5.94248 4.80211 5.96571C4.86368 5.98893 4.92964 6.00036 5 5.99999C5.07036 5.99999 5.13632 5.98856 5.19789 5.96571C5.25945 5.94285 5.31662 5.90359 5.36939 5.84792L9.8153 1.18894C9.93843 1.05991 10 0.898616 10 0.705068C10 0.51152 9.93404 0.345622 9.80211 0.207373C9.67018 0.0691247 9.51627 4.97982e-07 9.34037 5.05671e-07C9.16447 5.13359e-07 9.01055 0.0691247 8.87863 0.207373L5 4.27188L1.12137 0.207374C0.99824 0.0783419 0.846438 0.0138253 0.665963 0.0138253C0.485489 0.0138254 0.329463 0.0829496 0.197889 0.221199C0.0659625 0.359447 -2.39506e-07 0.520737 -2.31449e-07 0.705069C-2.23391e-07 0.8894 0.0659626 1.05069 0.197889 1.18894Z" fill="#85858C"></path>
                            </svg>
                        </a>
                        <div class="card__supplements__box" id="1sauces-modal">
                            <?php
                                if (strpos($product_category, 'Суши')): 
                                    $args = array(
                                        'post_type' => 'product',
                                        'post_status'   => 'publish',
                                        'tax_query' => array(
                                            array(
                                                    'taxonomy' => 'product_cat',
                                                    'field' => 'slug',
                                                    'terms' => 'sushi-dips-sauces', 
                                            )
                                        ),
                                    );
                                endif;
                                if (strpos($product_category, 'Пицца')): 
                                    $args = array(
                                        'post_type' => 'product',
                                        'post_status'   => 'publish',
                                        'tax_query' => array(
                                            array(
                                                    'taxonomy' => 'product_cat',
                                                    'field' => 'slug',
                                                    'terms' => 'toppings-pizza-sauces', 
                                            )
                                        ),
                                    );
                                endif;
                                $query = new WP_Query( $args );
                                if ( $query->have_posts()) : 
                                    while ( $query->have_posts() ) : $query->the_post();
                                    $product_data = wc_get_product( get_the_ID() );
                                ?>
                                    <div class="card__supplements__box__items" data-cart="<? echo get_the_ID(); ?>">
                                        <div class="supplements__checked">
                                            <div class="supplements__checked__circle"></div>
                                            <div class="supplements__checked__title"><?php the_title(); ?></div>
                                        </div>
                                        <div class="supplements__price">
                                            <div class="supplements__price__col">
                                                <div class="supplements__price__col__minus">-</div>
                                                <div class="supplements__price__col__value">1</div>
                                                <div class="supplements__price__col__plus">+</div>
                                            </div>
                                            <div class="supplements__price__value">
                                                <span class="supplements__price__span"><?php echo $product_data->get_price(); ?></span>
                                                  <span>BYN</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php                                            
                                    endwhile; wp_reset_postdata();
                                endif;
                            ?>
                        </div>
                    </div>
                <?php
                    endif;
                ?>
                <?php 
                    if (strpos($product_category, 'Пицца')):
                ?>
                    <div class="card__supplements__items">
                        <a class="card__supplements__link" href="#" id="extras-modal">
                            <span class="card__supplements__link__title card__supplements__link__title--click" id="extras-modal">Дополнительные начинки</span>
                            <svg class="card__svg" id="2extras-modal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 6">
                                <path d="M0.197889 1.18894L4.63061 5.84792C4.68338 5.90322 4.74055 5.94248 4.80211 5.96571C4.86368 5.98893 4.92964 6.00036 5 5.99999C5.07036 5.99999 5.13632 5.98856 5.19789 5.96571C5.25945 5.94285 5.31662 5.90359 5.36939 5.84792L9.8153 1.18894C9.93843 1.05991 10 0.898616 10 0.705068C10 0.51152 9.93404 0.345622 9.80211 0.207373C9.67018 0.0691247 9.51627 4.97982e-07 9.34037 5.05671e-07C9.16447 5.13359e-07 9.01055 0.0691247 8.87863 0.207373L5 4.27188L1.12137 0.207374C0.99824 0.0783419 0.846438 0.0138253 0.665963 0.0138253C0.485489 0.0138254 0.329463 0.0829496 0.197889 0.221199C0.0659625 0.359447 -2.39506e-07 0.520737 -2.31449e-07 0.705069C-2.23391e-07 0.8894 0.0659626 1.05069 0.197889 1.18894Z" fill="#85858C"></path>
                            </svg>
                        </a>
                        <div class="card__supplements__box" id="1extras-modal">
                            <?php
                                $args = array(
                                    'post_type' => 'product',
                                    'post_status'   => 'publish',
                                    'tax_query' => array(
                                        array(
                                                'taxonomy' => 'product_cat',
                                                'field' => 'slug',
                                                'terms' => 'toppings-pizza-stuffing', 
                                        )
                                    ),
                                );
                                $query = new WP_Query( $args );
                                if ( $query->have_posts()) : 
                                    while ( $query->have_posts() ) : $query->the_post();
                                        $item = 1;
                                        $itemPrice = 1;
                                        $product_data = wc_get_product( get_the_ID() );
                                        $variations = $product_data->get_available_variations();
                                    ?>
                                       <div class="card__supplements__box__items card__supplements__box__items--variation" <?php foreach ($variations as $variationProduct): echo 'data-id'.$item.'="'.$variationProduct['variation_id'].'"'; $item++; endforeach;?> data-cart="<? echo get_the_ID(); ?>">
                                            <div class="supplements__checked">
                                                <div class="supplements__checked__circle"></div>
                                                <div class="supplements__checked__title"><?php the_title(); ?></div>
                                            </div>
                                            <div class="supplements__price">
                                                <div class="supplements__price__value">
                                                    <span class="supplements__price__span supplements__price__span--variation" <?php foreach ($variations as $variationProduct): echo 'data-variation-price'.$itemPrice.'="'.$variationProduct['display_regular_price'].'"'; $itemPrice++; endforeach;?>><?php echo $product_data->get_price(); ?></span>
                                                    <span>BYN</span>
                                                </div>
                                            </div>
                                        </div> 
                                    <?php
                                    endwhile;
                                endif;
                            ?>
                        </div>
                    </div>
                <?php
                    endif;
                ?>
                </div>
        <?php
            endif;
        ?>
    </div>
</div>