<?php get_header();
    $term = get_term(get_queried_object()->term_id, get_queried_object()->taxonomy);
    $termParent = ($term->parent == 0) ? $term : get_term($term->parent, get_queried_object()->taxonomy);
    $termchildren = get_term_children($termParent->term_id, $termParent->taxonomy);
?>
    <section class="category category--border">
        <div class="wrapper">
            <div class="category__head <?php if($termchildren == []): echo 'category__head--nocategories'; endif;?>">
                <div class="category__head__items category__head__items--column">
                    <div class="category__head__items category__head__items--column">
                        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs('/'); ?>
                        <h1><?php single_term_title(); ?></h1>
                    </div>
                </div>
                <?php
                    if($termchildren != []):?>
                        <div class="category__head__items category__head__items--end <?php if($term->slug == 'sushi'): echo 'category__head__items--sushi';endif; ?>">
                            <ul class="category__head__list <?php if($term->slug == 'sushi'): echo 'category__head__list--sushi';endif; ?>">
                                <?php 
                                    foreach ($termchildren as $child):
                                        $term = get_term_by( 'id', $child, get_queried_object()->taxonomy );
                                        $thumbId = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                                        $imgSrc = wp_get_attachment_url( $thumbId );?>
                                        <li class="category__head__list__items <?php if($term->slug == 'sushi'): echo 'category__head__list__items--flex';endif; ?>">
                                            <?php
                                                if($termParent->slug == 'pizza'):
                                            ?>
                                                    <form class="filter__form" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php">
                                                        <input type="hidden" name="action" value="myfilter">
                                                        <input type="hidden" name="productCat" value="<?php echo $term->slug;?>">
                                                        <button type="submit" class="category__head__list__link btnPizza">
                                                            <img src="<?php echo $imgSrc;?>" alt="<?php echo $term->name;?>">
                                                            <p><?php echo $term->name;?></p>
                                                        </button>
                                                    </form>
                                            <?php
                                                else:
                                            ?>
                                                <a class="category__head__list__link category__head__list__link--sushi" href="#<?php echo $term->slug;?>">
                                                    <img src="<?php echo $imgSrc;?>" alt="">
                                                    <p><?php echo $term->name;?></p>
                                                </a>
                                            <?php
                                                endif;
                                            ?>
                                        </li>
                                <?php
                                    endforeach
                                ?>
                            </ul>
                        </div>
                <?php
                    endif;
                ?>
            </div>
        </div>
    </section>
    <?php
        if($termParent->slug == 'sushi'):      
    ?>
        <section class="products">
        <?php
            if($termchildren == []):
                $products = true;
            endif;
            foreach ($termchildren as $child):
                $term = get_term_by( 'id', $child, get_queried_object()->taxonomy );
                $thumbId = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                $imgSrc = wp_get_attachment_url( $thumbId );
                $args = array(
                    'post_type' => 'product',
                    'product_cat' => $term->slug,
                    'paged'             => $paged,
                    'posts_per_page'    => 1000
                );
                $temp = $wp_query;
                $wp_query= null;
                $query = new WP_Query($args);
                if ( $query->have_posts()) :
        ?>
                    <div class="subcategory" id="<?php echo $term->slug;?>">
                        <div class="wrapper">
                            <div class="subcategory__box">
                                <h2><?php echo $term->name;?></h2>
                                <div class="subcategory__box__inner">
                                    <div class="subcategory__box__inner__items"></div>
                                    <div class="subcategory__box__inner__items"></div>
                                    <div class="subcategory__box__inner__items"></div>
                                    <div class="subcategory__box__inner__items"></div>
                                    <div class="subcategory__box__inner__items"></div>
                                    <div class="subcategory__box__inner__items"></div>
                                    <div class="subcategory__box__inner__items"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper">
                        <div class="products__box">
                            <?php
                                $item = 1;
                                while ( $query->have_posts() ) : $query->the_post();
                                    $product_data = wc_get_product( get_the_ID() );?>
                                    <div class="products__box__half <?php if($item % 2 == 0): echo 'products__box__half--borderrnone'; endif;?>">
                                        <div class="products__box__half__inner">
                                            <a class="products__box__half__imglink products__box__half__imglink--snacks" href="<?php echo get_permalink($posts['ID']); ?>">
                                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID())?>" alt="<?php the_title(); ?>">
                                            </a>
                                            <div class="products__box__half__info">
                                                <div class="products__box__half__content">
                                                    <a href="<?php echo get_permalink($posts['ID']); ?>"><?php the_title(); ?></a>
                                                    <p><?php the_content(); ?></p>
                                                </div>
                                                <div class="products__box__half__price">
                                                    <span><?php echo $product_data->get_price(); ?> BYN</span>
                                                    <button class="put_in_cart">
                                                        <img src="<?php bloginfo('template_url'); ?>/assets/img/btn_backet.png" alt="Basket">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                $item += 1;
                                endwhile; wp_reset_postdata();
                                if($item % 2 == 0):?>
                                    <div class="products__box__half products__box__half--borderrnone products__box__half--empty">
                                        <div class="products__box__half__inner"></div>
                                    </div>
                            <?php
                                endif;
                            ?>
                        </div>
                    </div>
        <?php
                endif;
            endforeach;
            if( isset($products) ):
        ?>
            <div class="wrapper">
                <div class="single__box">
                    <article class="policy__box article">
                        <h2>Товар данной категории не добавлен</h2>
                    </article>
                </div>
            </div>
        <?php
            endif;
        ?>
        </section>
    <?php

            else:
    ?>
            <section class="products">
                <div class="wrapper">
                    <?php  
                        $args = array(
                            'post_type' => 'product',
                            'product_cat' => get_queried_object()->slug,
                            'paged'             => $paged,
                            'posts_per_page'    => 1000
                        );
                        $temp = $wp_query;
                        $wp_query= null;
                        $query = new WP_Query($args);
                        if ( $query->have_posts()) :
                    ?>
                            <div class="products__box">
                                <?php
                                    $item = 1;
                                    while ( $query->have_posts() ) : $query->the_post();
                                        $product_data = wc_get_product( get_the_ID() );?>
                                        <div class="products__box__half <?php if($item % 2 == 0): echo 'products__box__half--borderrnone'; endif;?>">
                                            <div class="products__box__half__inner">
                                                <a class="products__box__half__imglink <?php if($termParent->slug == 'drinks'): echo 'products__box__half__imglink--drinks'; endif; ?>  <?php if($termParent->slug == 'snacks'): echo 'products__box__half__imglink--snacks'; endif; ?>  <?php if($termParent->slug == 'pizza'): echo 'products__box__half__imglink--pizza'; endif; ?>" href="<?php echo get_permalink($posts['ID']); ?>">
                                                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID())?>" alt="<?php the_title(); ?>">
                                                </a>
                                                <div class="products__box__half__info">
                                                    <div class="products__box__half__content">
                                                        <a href="<?php echo get_permalink($posts['ID']); ?>"><?php the_title(); ?></a>
                                                        <p><?php the_content(); ?></p>
                                                    </div>
                                                    <div class="products__box__half__price">
                                                        <span><?php echo $product_data->get_price(); ?> BYN</span>
                                                        <button class="put_in_cart">
                                                            <img src="<?php bloginfo('template_url'); ?>/assets/img/btn_backet.png" alt="">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    $item += 1;
                                    endwhile; wp_reset_postdata();
                                    if($item % 2 == 0):?>
                                        <div class="products__box__half products__box__half--borderrnone products__box__half--empty">
                                            <div class="products__box__half__inner"></div>
                                        </div>
                                <?php
                                    endif;
                                ?>
                            </div>
                    <?php
                        else: 
                    ?>
                            <div class="products__box">
                                <article class="policy__box article response__box"><h2>Товар данной категории не добавлен</h2></article>
                            </div>
                    <?php
                        endif;
                    ?>
                    <div class="products__box response"></div>
                </div>
            </section>
    <?php
        endif;
    ?>
    <section class="about">
        <div class="wrapper">
            <div class="box">
                <div class="box__half">
                    <div class="about__inner">
                        <?php
                            $term_object = get_queried_object();
                            echo wpautop(get_field('product-cat-about-left','product_cat_'.$term_object->term_id));
                        ?>
                    </div>
                </div>
                <div class="box__half">
                    <div class="about__inner">
                        <div class="info__footer--category">
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                            <div class="info__footer__items"></div>
                        </div>
                        <?php
                            echo wpautop(get_field('product-cat-about-right','product_cat_'.$term_object->term_id));
                        ?>
                    </div>
                </div>
            </div>
            <div class="about__btn">
                <a class="about__btn__link" href="#">Читать весь текст</a>
            </div>
        </div>
    </section>
    <section class="map">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/map.jpg" alt="" style="width: 100%;">
    </section>
    <section class="modal">
        <div class="wrapper">
            <div class="modal__body">
                <a class="modal__close" href="#">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/modal_close.png" alt="">
                </a>
                <div class="card__box">
                    <div class="card__box__items">
                        <img class="card__picture card__picture--pizza" src="img/card_pizza.png" alt="">
                        <div class="card__box__btn">
                            <div class="card__box__btn__amount">
                                <a class="amount__minus" href="#">-</a>
                                <span class="amount">1</span>
                                <a class="amount__plus" href="#">+</a>
                            </div>
                            <a class="card__box__btn__add" href="domen.by?add_to_cart=1235:1">
                                <span>Добавить</span>
                                <span class="add__price">30.00</span>
                                <span>BYN</span>
                            </a>
                        </div>
                    </div>
                    <div class="card__box__items">
                        <div class="card__box__items__inner card__box__items__inner--modal">
                            <div class="card__box__items__inner__row">
                                <h1>Итальянская</h1>
                                <a class="card__box__nutrition" href="#">
                                    <img src="img/nutrition__info.png" alt="">
                                </a>
                                <div class="nutrition__box">
                                    <div class="nutrition__box__title">Пищевая ценность</div>
                                    <p>Калории<span>218.61 ккал.</span></p>
                                    <p>Углеводы<span>22,12 г.</span></p>
                                    <p>Белки<span>11,50 г.</span></p>
                                    <p>Жиры<span>10,20 г.</span></p>
                                    <div class="nutrition__box__footer">В 100 г. готового продукта</div>
                                </div>
                            </div>
                            <p><span class="card__gramme">320 г.</span> Соус томатный, моцарелла, итальянская пепперони, шампиньоны, маслины, итальянские травы</p>
                            <div class="card__sizes">
                                <a class="card__sizes__link small card__sizes__link--active" href="#" data-cart="1235" data-price="30.00" data-gramme="320 г.">25 см</a>
                                <a class="card__sizes__link normal" href="#" data-cart="78952" data-price="40.00" data-gramme="450 г.">33 см</a>
                                <a class="card__sizes__link big" href="#" data-cart="0321" data-price="50.00" data-gramme="500 г.">40 см</a>
                            </div>
                            <h2>Добавить по вкусу</h2>
                            <div class="card__supplements">
                                <div class="card__supplements__items">
                                    <a class="card__supplements__link" href="#" id="sauces-modal">
                                        <span class="card__supplements__link__title card__supplements__link__title--click" id="sauces-modal">Соусы</span>
                                        <svg class="card__svg" id="2sauces-modal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 6">
                                            <path d="M0.197889 1.18894L4.63061 5.84792C4.68338 5.90322 4.74055 5.94248 4.80211 5.96571C4.86368 5.98893 4.92964 6.00036 5 5.99999C5.07036 5.99999 5.13632 5.98856 5.19789 5.96571C5.25945 5.94285 5.31662 5.90359 5.36939 5.84792L9.8153 1.18894C9.93843 1.05991 10 0.898616 10 0.705068C10 0.51152 9.93404 0.345622 9.80211 0.207373C9.67018 0.0691247 9.51627 4.97982e-07 9.34037 5.05671e-07C9.16447 5.13359e-07 9.01055 0.0691247 8.87863 0.207373L5 4.27188L1.12137 0.207374C0.99824 0.0783419 0.846438 0.0138253 0.665963 0.0138253C0.485489 0.0138254 0.329463 0.0829496 0.197889 0.221199C0.0659625 0.359447 -2.39506e-07 0.520737 -2.31449e-07 0.705069C-2.23391e-07 0.8894 0.0659626 1.05069 0.197889 1.18894Z" fill="#85858C"></path>
                                        </svg>
                                    </a>
                                    <div class="card__supplements__box" id="1sauces-modal">
                                        <div class="card__supplements__box__items" data-cart="5300">
                                            <div class="supplements__checked">
                                                <div class="supplements__checked__circle"></div>
                                                <div class="supplements__checked__title">Грибной</div>
                                            </div>
                                            <div class="supplements__price">
                                                <div class="supplements__price__col">
                                                    <div class="supplements__price__col__minus">-</div>
                                                    <div class="supplements__price__col__value">1</div>
                                                    <div class="supplements__price__col__plus">+</div>
                                                </div>
                                                <div class="supplements__price__value">
                                                    <span class="supplements__price__span">1.20</span>
                                                    <span>BYN</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card__supplements__box__items" data-cart="8888">
                                            <div class="supplements__checked">
                                                <div class="supplements__checked__circle"></div>
                                                <div class="supplements__checked__title">Барбекю</div>
                                            </div>
                                            <div class="supplements__price">
                                                <div class="supplements__price__col">
                                                    <div class="supplements__price__col__minus">-</div>
                                                    <div class="supplements__price__col__value">1</div>
                                                    <div class="supplements__price__col__plus">+</div>
                                                </div>
                                                <div class="supplements__price__value">
                                                    <span class="supplements__price__span">1.20</span>
                                                    <span> BYN</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card__supplements__box__items" data-cart="9876">
                                            <div class="supplements__checked">
                                                <div class="supplements__checked__circle"></div>
                                                <div class="supplements__checked__title">Терияки</div>
                                            </div>
                                            <div class="supplements__price">
                                                <div class="supplements__price__col">
                                                    <div class="supplements__price__col__minus">-</div>
                                                    <div class="supplements__price__col__value">1</div>
                                                    <div class="supplements__price__col__plus">+</div>
                                                </div>
                                                <div class="supplements__price__value">
                                                    <span class="supplements__price__span">1.20</span>
                                                    <span>BYN</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card__supplements__box__items" data-cart="6030">
                                            <div class="supplements__checked">
                                                <div class="supplements__checked__circle"></div>
                                                <div class="supplements__checked__title">Чесночный</div>
                                            </div>
                                            <div class="supplements__price">
                                                <div class="supplements__price__col">
                                                    <div class="supplements__price__col__minus">-</div>
                                                    <div class="supplements__price__col__value">1</div>
                                                    <div class="supplements__price__col__plus">+</div>
                                                </div>
                                                <div class="supplements__price__value">
                                                    <span class="supplements__price__span">1.20</span>
                                                    <span> BYN</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card__supplements__items">
                                    <a class="card__supplements__link" href="#" id="extras-modal">
                                        <span class="card__supplements__link__title card__supplements__link__title--click" id="extras-modal">Дополнительные начинки</span>
                                        <svg class="card__svg" id="2extras-modal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 6">
                                            <path d="M0.197889 1.18894L4.63061 5.84792C4.68338 5.90322 4.74055 5.94248 4.80211 5.96571C4.86368 5.98893 4.92964 6.00036 5 5.99999C5.07036 5.99999 5.13632 5.98856 5.19789 5.96571C5.25945 5.94285 5.31662 5.90359 5.36939 5.84792L9.8153 1.18894C9.93843 1.05991 10 0.898616 10 0.705068C10 0.51152 9.93404 0.345622 9.80211 0.207373C9.67018 0.0691247 9.51627 4.97982e-07 9.34037 5.05671e-07C9.16447 5.13359e-07 9.01055 0.0691247 8.87863 0.207373L5 4.27188L1.12137 0.207374C0.99824 0.0783419 0.846438 0.0138253 0.665963 0.0138253C0.485489 0.0138254 0.329463 0.0829496 0.197889 0.221199C0.0659625 0.359447 -2.39506e-07 0.520737 -2.31449e-07 0.705069C-2.23391e-07 0.8894 0.0659626 1.05069 0.197889 1.18894Z" fill="#85858C"></path>
                                        </svg>
                                    </a>
                                    <div class="card__supplements__box" id="1extras-modal">
                                        <div class="card__supplements__box__items" data-cart="1111">
                                            <div class="supplements__checked">
                                                <div class="supplements__checked__circle"></div>
                                                <div class="supplements__checked__title">Соус Бешамель</div>
                                            </div>
                                            <div class="supplements__price">
                                                <div class="supplements__price__value">
                                                    <span class="supplements__price__span">1.00</span>
                                                    <span>BYN</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card__supplements__box__items" data-cart="2222">
                                            <div class="supplements__checked">
                                                <div class="supplements__checked__circle"></div>
                                                <div class="supplements__checked__title">Шампиньоны</div>
                                            </div>
                                            <div class="supplements__price">
                                                <div class="supplements__price__value">
                                                    <span class="supplements__price__span">3.20</span>
                                                    <span> BYN</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card__supplements__box__items" data-cart="3333">
                                            <div class="supplements__checked">
                                                <div class="supplements__checked__circle"></div>
                                                <div class="supplements__checked__title">Халапеньо</div>
                                            </div>
                                            <div class="supplements__price">
                                                <div class="supplements__price__value">
                                                    <span class="supplements__price__span">2.50</span>
                                                    <span>BYN</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card__supplements__box__items" data-cart="4444">
                                            <div class="supplements__checked">
                                                <div class="supplements__checked__circle"></div>
                                                <div class="supplements__checked__title">Ветчина</div>
                                            </div>
                                            <div class="supplements__price">
                                                <div class="supplements__price__value">
                                                    <span class="supplements__price__span">4.00</span>
                                                    <span> BYN</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();?>