<!DOCTYPE html>
<html lang="ru">
<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
    <title><?php wp_title("", true); ?></title>
</head>

<body>
<header class="header">
    <div class="header__top">
        <a class="logo" href="<?php echo site_url(); ?>">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" alt="На Главную">
        </a>
        <div class="wrapper wrapper--border">
            <div class="header__box">
                <div class="header__box__items">
                    <div class="header__icon">
                        <svg  class="header__icon__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                            <path d="M11 4.25C9.66498 4.25 8.35994 4.64588 7.2499 5.38758C6.13987 6.12928 5.27471 7.18349 4.76382 8.41689C4.25292 9.65029 4.11925 11.0075 4.3797 12.3169C4.64015 13.6262 5.28303 14.829 6.22703 15.773C7.17104 16.717 8.37377 17.3598 9.68314 17.6203C10.9925 17.8808 12.3497 17.7471 13.5831 17.2362C14.8165 16.7253 15.8707 15.8601 16.6124 14.7501C17.3541 13.6401 17.75 12.335 17.75 11C17.7474 9.2106 17.0354 7.49525 15.7701 6.22995C14.5048 4.96465 12.7894 4.25265 11 4.25ZM13.53 13.53C13.3894 13.6705 13.1988 13.7493 13 13.7493C12.8013 13.7493 12.6106 13.6705 12.47 13.53L10.47 11.53C10.3293 11.3895 10.2502 11.1988 10.25 11V7C10.25 6.80109 10.329 6.61032 10.4697 6.46967C10.6103 6.32902 10.8011 6.25 11 6.25C11.1989 6.25 11.3897 6.32902 11.5303 6.46967C11.671 6.61032 11.75 6.80109 11.75 7V10.69L13.53 12.47C13.6705 12.6106 13.7493 12.8012 13.7493 13C13.7493 13.1988 13.6705 13.3894 13.53 13.53Z" fill="white"></path>
                            <path d="M11 0.25C8.87386 0.25 6.79545 0.880477 5.02763 2.0617C3.2598 3.24293 1.88194 4.92185 1.0683 6.88615C0.254658 8.85046 0.0417719 11.0119 0.456563 13.0972C0.871354 15.1825 1.89519 17.098 3.39861 18.6014C4.90202 20.1048 6.81749 21.1287 8.90278 21.5434C10.9881 21.9582 13.1495 21.7453 15.1139 20.9317C17.0782 20.1181 18.7571 18.7402 19.9383 16.9724C21.1195 15.2046 21.75 13.1262 21.75 11C21.7474 8.14974 20.6139 5.41697 18.5985 3.40153C16.583 1.38608 13.8503 0.252648 11 0.25ZM11 19.25C9.36831 19.25 7.77326 18.7661 6.41655 17.8596C5.05984 16.9531 4.00242 15.6646 3.378 14.1571C2.75358 12.6496 2.5902 10.9908 2.90853 9.39051C3.22685 7.79016 4.01259 6.32015 5.16637 5.16637C6.32016 4.01259 7.79017 3.22685 9.39051 2.90852C10.9909 2.59019 12.6497 2.75357 14.1571 3.37799C15.6646 4.00242 16.9531 5.05984 17.8596 6.41655C18.7662 7.77325 19.25 9.36831 19.25 11C19.2474 13.1872 18.3773 15.2841 16.8307 16.8307C15.2841 18.3773 13.1872 19.2474 11 19.25Z" fill="#FFEC00"></path>
                        </svg>
                    </div>
                    <div class="header__info">
                        <span>Время доставки</span>
                        <p>c 11:00 до 23:00</p>
                    </div>
                </div>
                <div class="header__box__items">
                    <div class="header__icon">
                        <svg  class="header__icon__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M17.7179 3.049C16.6805 2.19956 15.4675 1.59095 14.1663 1.26705C12.8652 0.943161 11.5085 0.912062 10.1939 1.176C8.50361 1.52254 6.94858 2.34765 5.71402 3.55305C4.47946 4.75844 3.61742 6.29331 3.23058 7.97482C2.84374 9.65633 2.9484 11.4136 3.53211 13.0373C4.11582 14.661 5.15397 16.0827 6.52288 17.133C8.08582 18.2769 9.41653 19.7081 10.4439 21.35L11.1439 22.514C11.2328 22.6619 11.3584 22.7842 11.5086 22.8691C11.6588 22.954 11.8284 22.9987 12.0009 22.9987C12.1734 22.9987 12.343 22.954 12.4932 22.8691C12.6433 22.7842 12.769 22.6619 12.8579 22.514L13.5289 21.396C14.4235 19.8234 15.6433 18.4597 17.1069 17.396C18.2545 16.6064 19.2029 15.561 19.8773 14.3421C20.5517 13.1233 20.9337 11.7644 20.993 10.3727C21.0524 8.98094 20.7875 7.59447 20.2193 6.32263C19.6511 5.0508 18.7951 3.9284 17.7189 3.044L17.7179 3.049ZM11.9999 14C11.2088 14 10.4354 13.7654 9.7776 13.3259C9.11981 12.8864 8.60712 12.2616 8.30437 11.5307C8.00162 10.7998 7.9224 9.99556 8.07674 9.21964C8.23108 8.44371 8.61205 7.73098 9.17146 7.17157C9.73087 6.61216 10.4436 6.2312 11.2195 6.07686C11.9954 5.92252 12.7997 6.00173 13.5306 6.30448C14.2615 6.60723 14.8862 7.11992 15.3258 7.77772C15.7653 8.43552 15.9999 9.20887 15.9999 10C15.9999 11.0609 15.5785 12.0783 14.8283 12.8284C14.0782 13.5786 13.0608 14 11.9999 14Z" fill="#FFEC00"></path>
                            <circle cx="12" cy="10" r="2" fill="white"></circle>
                        </svg>
                    </div>
                    <div class="header__info">
                        <span>Адрес:</span>
                        <p>г. Гомель, ул. Советская , д. 3</p>
                    </div>
                </div>
                <div class="header__box__items header__box__items--center">
                    <a href="#" class="header__box__items__logo">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/site_name.png" alt="">
                    </a>
                </div>
                <div class="header__social__box">
                    <a class="header__social__box__items telegram-link" itemprop="telephone" target="_blank" href="https://msng.link/o/?The Box 99=tg">
                        <div class="header__social__box__link">
                            <svg  class="header__icon__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 19">
                                <path d="M8.81814 11.9882L8.47274 17.0138C8.96692 17.0138 9.18094 16.7942 9.4376 16.5305L11.7545 14.24L16.5552 17.8769C17.4357 18.3845 18.056 18.1172 18.2935 17.039L21.4448 1.76425L21.4456 1.76335C21.7249 0.416954 20.9749 -0.109543 20.1171 0.220755L1.59436 7.55662C0.330218 8.06422 0.349358 8.79321 1.37946 9.12351L6.11499 10.6472L17.1147 3.52734C17.6323 3.17274 18.103 3.36894 17.7158 3.72354L8.81814 11.9882Z" fill="white"></path>
                            </svg>
                        </div>
                    </a>
                    <a class="header__social__box__items viber-link" itemprop="telephone" target="_blank" href="https://msng.link/o/?375295611010=vi">
                        <div class="header__social__box__link">
                            <svg  class="header__icon__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 25">
                                <path d="M13.9798 0.1H9.01984C4.24584 0.1 0.339844 4.006 0.339844 8.78V12.5C0.339844 15.848 2.29284 18.917 5.29984 20.343V24.497C5.29984 24.869 5.76484 25.055 6.01284 24.776L9.60884 21.18H13.9798C18.7538 21.18 22.6598 17.274 22.6598 12.5V8.78C22.6598 4.006 18.7538 0.1 13.9798 0.1ZM17.2348 16.375L15.9638 17.615C14.6308 18.917 11.1898 17.429 8.15184 14.329C5.11384 11.229 3.78084 7.757 5.05184 6.455L6.29184 5.215C6.75684 4.75 7.53184 4.781 8.05884 5.246L9.85684 7.106C10.5078 7.757 10.2288 8.873 9.39184 9.121C8.80284 9.307 8.39984 9.958 8.58584 10.547C8.89584 11.911 10.6318 13.647 11.9338 13.988C12.5228 14.112 13.1738 13.802 13.3908 13.213C13.6698 12.376 14.7858 12.128 15.4058 12.779L17.2038 14.639C17.6998 15.073 17.6998 15.848 17.2348 16.375ZM12.6158 5.99C12.4918 5.99 12.3678 5.99 12.2438 6.021C12.0268 6.052 11.8098 5.866 11.7788 5.649C11.7478 5.432 11.9338 5.215 12.1508 5.184C12.3058 5.153 12.4608 5.153 12.6158 5.153C14.8788 5.153 16.7388 7.013 16.7388 9.276C16.7388 9.431 16.7388 9.586 16.7078 9.741C16.6768 9.958 16.4598 10.144 16.2428 10.113C16.0258 10.082 15.8398 9.865 15.8708 9.648C15.8708 9.524 15.9018 9.4 15.9018 9.276C15.9328 7.478 14.4448 5.99 12.6158 5.99ZM15.0958 9.307C15.0958 9.524 14.9098 9.71 14.6928 9.71C14.4758 9.71 14.2898 9.524 14.2898 9.307C14.2898 8.408 13.5458 7.664 12.6468 7.664C12.4298 7.664 12.2438 7.478 12.2438 7.261C12.2438 7.044 12.4298 6.858 12.6468 6.858C13.9798 6.827 15.0958 7.943 15.0958 9.307ZM18.2578 10.64C18.1958 10.857 17.9788 11.012 17.7308 10.95C17.5138 10.888 17.3898 10.671 17.4518 10.454C17.5448 10.082 17.5758 9.71 17.5758 9.307C17.5758 6.579 15.3438 4.347 12.6158 4.347H12.2438C12.0268 4.347 11.8098 4.192 11.8098 3.975C11.8098 3.758 11.9648 3.541 12.1818 3.541C12.3368 3.541 12.4918 3.51 12.6158 3.51C15.8088 3.51 18.4128 6.114 18.4128 9.307C18.4128 9.741 18.3508 10.206 18.2578 10.64Z" fill="white"></path>
                            </svg>
                        </div>
                    </a>
                    <a class="header__social__box__items whatsppp-link" itemprop="telephone" target="_blank" href="https://msng.link/o?375295611010=wa">
                        <div class="header__social__box__link">
                            <svg  class="header__icon__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
                                <path d="M17.7597 14.2325C17.5259 13.9714 16.8069 13.3205 16.2921 12.9327C15.7868 12.5354 14.959 11.9981 14.6365 11.8316C14.1099 11.5577 13.3165 11.5884 12.8236 11.9196C12.4185 12.2014 12.0434 12.5241 11.704 12.8825L11.6966 12.8902C11.5113 13.086 11.2624 13.2096 10.9944 13.2389C10.7264 13.2683 10.4567 13.2014 10.2334 13.0503C9.39387 12.4778 8.61032 11.8272 7.89321 11.1072C7.17327 10.3901 6.52272 9.60654 5.95023 8.76699C5.79911 8.54371 5.73223 8.274 5.76155 8.00598C5.79086 7.73796 5.91445 7.48908 6.11026 7.30374L6.11801 7.29633C6.47638 6.957 6.79903 6.58185 7.08091 6.17675C7.4121 5.68383 7.44276 4.89038 7.16885 4.36378C7.00241 4.04168 6.46503 3.21488 6.06781 2.70815C5.67969 2.19334 5.02911 1.47435 4.768 1.24053C4.34181 0.856437 3.62182 0.756372 3.11948 1.02995C2.69753 1.2696 2.30224 1.55342 1.94029 1.87663L1.90222 1.91032C-0.318718 3.821 1.14349 9.15411 5.49809 13.5004C9.84663 17.8558 15.1783 19.319 17.0889 17.098L17.1226 17.0599C17.4459 16.6981 17.7298 16.3028 17.9693 15.8807C18.2439 15.3787 18.1438 14.6587 17.7597 14.2325Z" fill="white"></path>
                            </svg>
                        </div>
                    </a>
                    <div class="header__social__box__items">
                        <a class="header__social__box__link" href="<?php echo get_page_link(69)?>">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/bascket.png" alt="Корзина">
                            <div class="bascket">
                                <?$items_count = WC()->cart->get_cart_contents_count();?>
                                <div id="mini-cart-count" class="bascket__num"><?php echo $items_count ? $items_count : '0'; ?></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header__left">
        <div class="header__left__box">
            <div class="header__left__box__items">
                <a class="header__left__link" href="/product-category/pizza">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/pizza.png" alt="">
                    <p>Пицца</p>
                </a>
            </div>
            <div class="header__left__box__items">
                <a class="header__left__link" href="/product-category/sushi">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/sushi.png" alt="">
                    <p>Суши</p>
                </a>
            </div>
            <div class="header__left__box__items">
                <a class="header__left__link" href="/product-category/snacks">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/snacks.png" alt="">
                    <p>Закуски и салаты</p>
                </a>
            </div>
            <div class="header__left__box__items">
                <a class="header__left__link" href="/product-category/drinks">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/drinks.png" alt="">
                    <p>Напитки</p>
                </a>
            </div>
            <div class="header__left__box__items">
                <a class="header__left__link" href="<?php echo get_page_link(27)?>">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/stocks.png" alt="">
                    <p>Акции</p>
                </a>
            </div>
            <div class="header__left__box__items">
                <a class="header__left__link" href="<?php echo get_page_link(12)?>">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/payment.png" alt="">
                    <p>Доставка и оплата</p>
                </a>
            </div>
            <div class="header__left__box__items">
                <a class="header__left__link" href="<?php echo get_page_link(51)?>">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/blog.png" alt="">
                    <p>Блог</p>
                </a>
            </div>
        </div>
    </div>
</header>