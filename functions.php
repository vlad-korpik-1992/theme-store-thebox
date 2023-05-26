<?php
/**
 * TheBox functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TheBox
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function thebox_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on TheBox, use a find and replace
		* to change 'thebox' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'thebox', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'thebox' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'thebox_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'thebox_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thebox_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thebox_content_width', 640 );
}
add_action( 'after_setup_theme', 'thebox_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function thebox_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'thebox' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'thebox' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'thebox_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

add_action( 'wp_enqueue_scripts', 'vibemebel_scripts' );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

add_theme_support( 'post-thumbnails', array( 'post' ) );

function thebox_scripts() {
	wp_enqueue_style( 'thebox-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	wp_deregister_script( 'jquery' );

	wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.7.0.min.js', array(), null, true );

    wp_enqueue_script( 'jquery' );

	wp_register_script( 'main-script', get_template_directory_uri() . '/assets/js/main.js', array(), null, true );

    wp_enqueue_script( 'main-script' );

	wp_enqueue_script( 'thebox-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thebox_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/* Breadcrumbs */

function kama_breadcrumbs( $sep = ' » ', $l10n = array(), $args = array() ){
	$kb = new Kama_Breadcrumbs;
	echo $kb->get_crumbs( $sep, $l10n, $args );
}
class Kama_Breadcrumbs {

	public $arg;

	static $l10n = array(

		'home'       => 'Главная',

		'paged'      => 'Страница %d',

		'_404'       => 'Ошибка 404',

		'search'     => 'Результаты поиска по запросу - <b>%s</b>',

		'author'     => 'Архив автора: <b>%s</b>',

		'year'       => 'Архив за <b>%d</b> год',

		'month'      => 'Архив за: <b>%s</b>',

		'day'        => '',

		'attachment' => 'Медиа: %s',

		'tag'        => 'Записи по метке: <b>%s</b>',

		'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',

		'shop'		 => 'Каталог',

	);

	static $args = array(

		'on_front_page'   => true,  

		'show_post_title' => true,  

		'show_term_title' => true,  

		'title_patt'      => '<span class="breadcrumbs__page">%s</span>', 

		'last_sep'        => true,  

		'markup'          => 'schema.org',

										  

										  

		'priority_tax'    => array('category'),

		'priority_terms'  => array(),

        'nofollow' => false,

		'sep'             => '',

		'linkpatt'        => '',

		'pg_end'          => '',

	);



	function get_crumbs( $sep, $l10n, $args ){

		global $post, $wp_query, $wp_post_types;



		self::$args['sep'] = $sep;



		$loc = (object) array_merge( apply_filters('kama_breadcrumbs_default_loc', self::$l10n ), $l10n );

		$arg = (object) array_merge( apply_filters('kama_breadcrumbs_default_args', self::$args ), $args );



		$arg->sep = '<span class="kb_sep">'. $arg->sep .'</span>'; // дополним



		$sep = & $arg->sep;

		$this->arg = & $arg;



		if(1){

			$mark = & $arg->markup;



			if( ! $mark ) $mark = array(

				'wrappatt'  => '<div class="breadcrumbs__list">%s</div>',

				'linkpatt'  => '<a href="%s">%s</a>',

				'sep_after' => '',

			);

			elseif( $mark === 'rdf.data-vocabulary.org' ) $mark = array(

				'wrappatt'   => '<div class="breadcrumbs__list" prefix="v: http://rdf.data-vocabulary.org/#">%s</div>',

				'linkpatt'   => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',

				'sep_after'  => '</span>', // закрываем span после разделителя!

			);

			elseif( $mark === 'schema.org' ) $mark = array(

				'wrappatt'   => '<div class="breadcrumbs__list" itemscope itemtype="http://schema.org/BreadcrumbList">%s</div>',

				'linkpatt'   => '<span itemprop="itemListElement" class="breadcrumbs__list__items" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item" class="breadcrumbs__list__link breadcrumbs__list__link_active"><span itemprop="name">%s</span></a></span>',

				'sep_after'  => '',

			);



			elseif( ! is_array($mark) )

				die( __CLASS__ .': "markup" parameter must be array...');



			$wrappatt  = $mark['wrappatt'];

			$arg->linkpatt  = $arg->nofollow ? str_replace('<a ','<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];

			$arg->sep      .= $mark['sep_after']."\n";

		}



		$linkpatt = $arg->linkpatt;



		$q_obj = get_queried_object();



		$ptype = null;

		if( empty($post) ){

			if( isset($q_obj->taxonomy) )

				$ptype = & $wp_post_types[ get_taxonomy($q_obj->taxonomy)->object_type[0] ];

		}

		else $ptype = & $wp_post_types[ $post->post_type ];



		// paged

		$arg->pg_end = '';

		if( ($paged_num = get_query_var('paged')) || ($paged_num = get_query_var('page')) )

			$arg->pg_end = $sep . sprintf( $loc->paged, (int) $paged_num );



		$pg_end = $arg->pg_end; // упростим



		$out = '';



		if( is_front_page() ){

			return $arg->on_front_page ? sprintf( $wrappatt, ( $paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home ) ) : '';

		}

		// страница записей, когда для главной установлена отдельная страница.

		elseif( is_home() ) {

			$out = $paged_num ? ( sprintf( $linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title) ) . $pg_end ) : esc_html($q_obj->post_title);

		}

		elseif( is_404() ){

			$out = $loc->_404;

		}

		elseif( is_search() ){

			$out = sprintf( $loc->search, esc_html( $GLOBALS['s'] ) );

		}

		elseif( is_author() ){

			$tit = sprintf( $loc->author, esc_html($q_obj->display_name) );

			$out = ( $paged_num ? sprintf( $linkpatt, get_author_posts_url( $q_obj->ID, $q_obj->user_nicename ) . $pg_end, $tit ) : $tit );

		}

		elseif( is_year() || is_month() || is_day() ){

			$y_url  = get_year_link( $year = get_the_time('Y') );



			if( is_year() ){

				$tit = sprintf( $loc->year, $year );

				$out = ( $paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit );

			}

			// month day

			else {

				$y_link = sprintf( $linkpatt, $y_url, $year);

				$m_url  = get_month_link( $year, get_the_time('m') );



				if( is_month() ){

					$tit = sprintf( $loc->month, get_the_time('F') );

					$out = $y_link . $sep . ( $paged_num ? sprintf( $linkpatt, $m_url, $tit ) . $pg_end : $tit );

				}

				elseif( is_day() ){

					$m_link = sprintf( $linkpatt, $m_url, get_the_time('F'));

					$out = $y_link . $sep . $m_link . $sep . get_the_time('l');

				}

			}

		}

		elseif( is_singular() && $ptype->hierarchical ){

			$out = $this->_add_title( $this->_page_crumbs($post), $post );

		}

		else {

			$term = $q_obj; 



			if( is_singular() ){

				if( is_attachment() && $post->post_parent ){

					$save_post = $post; 

					$post = get_post($post->post_parent);

				}

				$taxonomies = get_object_taxonomies( $post->post_type );

				$taxonomies = array_intersect( $taxonomies, get_taxonomies( array('hierarchical' => true, 'public' => true) ) );



				if( $taxonomies ){

					// сортируем по приоритету

					if( ! empty($arg->priority_tax) ){

						usort( $taxonomies, function($a,$b)use($arg){

							$a_index = array_search($a, $arg->priority_tax);

							if( $a_index === false ) $a_index = 9999999;



							$b_index = array_search($b, $arg->priority_tax);

							if( $b_index === false ) $b_index = 9999999;



							return ( $b_index === $a_index ) ? 0 : ( $b_index < $a_index ? 1 : -1 ); // меньше индекс - выше

						} );

					}



					// пробуем получить термины, в порядке приоритета такс

					foreach( $taxonomies as $taxname ){

						if( $terms = get_the_terms( $post->ID, $taxname ) ){

							// проверим приоритетные термины для таксы

							$prior_terms = & $arg->priority_terms[ $taxname ];

							if( $prior_terms && count($terms) > 2 ){

								foreach( (array) $prior_terms as $term_id ){

									$filter_field = is_numeric($term_id) ? 'term_id' : 'slug';

									$_terms = wp_list_filter( $terms, array($filter_field=>$term_id) );



									if( $_terms ){

										$term = array_shift( $_terms );

										break;

									}

								}

							}

							else

								$term = array_shift( $terms );



							break;

						}

					}

				}



				if( isset($save_post) ) $post = $save_post; // вернем обратно (для вложений)

			}



			// вывод



			// все виды записей с терминами или термины

			if( $term && isset($term->term_id) ){

				$term = apply_filters('kama_breadcrumbs_term', $term );



				// attachment

				if( is_attachment() ){

					if( ! $post->post_parent )

						$out = sprintf( $loc->attachment, esc_html($post->post_title) );

					else {

						if( ! $out = apply_filters('attachment_tax_crumbs', '', $term, $this ) ){

							$_crumbs    = $this->_tax_crumbs( $term, 'self' );

							$parent_tit = sprintf( $linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent) );

							$_out = implode( $sep, array($_crumbs, $parent_tit) );

							$out = $this->_add_title( $_out, $post );

						}

					}

				}

				// single

				elseif( is_single() ){

					if( ! $out = apply_filters('post_tax_crumbs', '', $term, $this ) ){

						$_crumbs = $this->_tax_crumbs( $term, 'self' );

						$out = $this->_add_title( $_crumbs, $post );

					}

				}

				// не древовидная такса (метки)

				elseif( ! is_taxonomy_hierarchical($term->taxonomy) ){

					// метка

					if( is_tag() )

						$out = $this->_add_title('', $term, sprintf( $loc->tag, esc_html($term->name) ) );

					// такса

					elseif( is_tax() ){

						$post_label = $ptype->labels->name;

						$tax_label = $GLOBALS['wp_taxonomies'][ $term->taxonomy ]->labels->name;

						$out = $this->_add_title('', $term, sprintf( $loc->tax_tag, $post_label, $tax_label, esc_html($term->name) ) );

					}

				}

				// древовидная такса (рибрики)

				else {

					if( ! $out = apply_filters('term_tax_crumbs', '', $term, $this ) ){

						$_crumbs = $this->_tax_crumbs( $term, 'parent' );

						$out = $this->_add_title( $_crumbs, $term, esc_html($term->name) );

					}

				}

			}

			// влоежния от записи без терминов

			elseif( is_attachment() ){

				$parent = get_post($post->post_parent);

				$parent_link = sprintf( $linkpatt, get_permalink($parent), esc_html($parent->post_title) );

				$_out = $parent_link;



				// вложение от записи древовидного типа записи

				if( is_post_type_hierarchical($parent->post_type) ){

					$parent_crumbs = $this->_page_crumbs($parent);

					$_out = implode( $sep, array( $parent_crumbs, $parent_link ) );

				}



				$out = $this->_add_title( $_out, $post );

			}

			// записи без терминов

			elseif( is_singular() ){

				$out = $this->_add_title( '', $post );

			}

		}



		// замена ссылки на архивную страницу для типа записи

		$home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype );



		if( '' === $home_after ){

			// Ссылка на архивную страницу типа записи для: отдельных страниц этого типа; архивов этого типа; таксономий связанных с этим типом.

			if( $ptype && $ptype->has_archive && ! in_array( $ptype->name, array('post','page','attachment') )

				&& ( is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)) )

			){

				$pt_title = $ptype->labels->name;



				// первая страница архива типа записи

				if( is_post_type_archive() && ! $paged_num )

					$home_after = sprintf( $this->arg->title_patt, $pt_title );

				// singular, paged post_type_archive, tax

				else{

					$home_after = sprintf( $linkpatt, get_post_type_archive_link($ptype->name), $pt_title );



					$home_after .= ( ($paged_num && ! is_tax()) ? $pg_end : $sep ); // пагинация

				}

			}

		}



		$before_out = sprintf( $linkpatt, home_url(), $loc->home ) . ( $home_after ? $sep.$home_after : ($out ? $sep : '') );



		$out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg );



		$out = sprintf( $wrappatt, $before_out . $out );



		return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg );

	}



	function _page_crumbs( $post ){

		$parent = $post->post_parent;



		$crumbs = array();

		while( $parent ){

			$page = get_post( $parent );

			$crumbs[] = sprintf( $this->arg->linkpatt, get_permalink($page), esc_html($page->post_title) );

			$parent = $page->post_parent;

		}



		return implode( $this->arg->sep, array_reverse($crumbs) );

	}



	function _tax_crumbs( $term, $start_from = 'self' ){

		$termlinks = array();

		$term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;

		while( $term_id ){

			$term       = get_term( $term_id, $term->taxonomy );

			$termlinks[] = sprintf( $this->arg->linkpatt, get_term_link($term), esc_html($term->name) );

			$term_id    = $term->parent;

		}



		if( $termlinks )

			return implode( $this->arg->sep, array_reverse($termlinks) ) /*. $this->arg->sep*/;

		return '';

	}



	// добалвяет заголовок к переданному тексту, с учетом всех опций. Добавляет разделитель в начало, если надо.

	function _add_title( $add_to, $obj, $term_title = '' ){

		$arg = & $this->arg; // упростим...

		$title = $term_title ? $term_title : esc_html($obj->post_title); // $term_title чиститься отдельно, теги моугт быть...

		$show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;



		// пагинация

		if( $arg->pg_end ){

			$link = $term_title ? get_term_link($obj) : get_permalink($obj);

			$add_to .= ($add_to ? $arg->sep : '') . sprintf( $arg->linkpatt, $link, $title ) . $arg->pg_end;

		}

		// дополняем - ставим sep

		elseif( $add_to ){

			if( $show_title )

				$add_to .= $arg->sep . sprintf( $arg->title_patt, $title );

			elseif( $arg->last_sep )

				$add_to .= $arg->sep;

		}

		// sep будет потом...

		elseif( $show_title )

			$add_to = sprintf( $arg->title_patt, $title );



		return $add_to;

	}
}

/* Breadcrumbs */