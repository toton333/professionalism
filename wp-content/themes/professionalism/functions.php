<?php
if (file_exists( dirname(__FILE__).'/redux-framework/ReduxCore/framework.php'   )) {
	include_once( dirname(__FILE__).'/redux-framework/ReduxCore/framework.php' );
}

if (file_exists( dirname(__FILE__).'/redux-framework/sample/config.php'      )) {
	include_once( dirname(__FILE__).'/redux-framework/sample/config.php' );
}

if (file_exists(dirname(__FILE__).'/cmb2/init.php'   )) {
	include_once(dirname(__FILE__).'/cmb2/init.php' );
}

if (file_exists(dirname(__FILE__).'/cmb2/functions.php'   )) {
	include_once(dirname(__FILE__).'/cmb2/functions.php' );
}

if (file_exists(dirname(__FILE__).'/tgm/example.php'   )) {
	include_once(dirname(__FILE__).'/tgm/example.php'  );
}


if ( ! function_exists( 'prof_setup' ) ) :

function prof_setup() {
	
	load_theme_textdomain( 'prof', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	
	add_theme_support( 'title-tag' );

	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 0, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'prof' )
	) );

	
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	add_filter('widget_text', 'do_shortcode' );

}
endif; // prof_setup
add_action( 'after_setup_theme', 'prof_setup' );

function prof_scripts(){

	wp_register_style( 'main', get_template_directory_uri().'/css/styles.css');
	wp_register_style( 'carousel', get_template_directory_uri().'/css/carousel.css');

	wp_enqueue_style('main' );
	wp_enqueue_style('carousel' );
	wp_enqueue_style('prof_style', get_stylesheet_uri() );

	wp_register_script( 'carouselScript', get_template_directory_uri().'/js/carouselScript.js', array('jquery'), '1.0' );

	wp_enqueue_script("jquery-effects-core");
	wp_enqueue_script('carouselScript' );


}
add_action('wp_enqueue_scripts', 'prof_scripts' );

function read_more($limit = 30){

	$content = explode(" ", get_the_content());
	$less_content = array_slice($content, 0, $limit);
	echo implode(" ", $less_content);
}



function prof_sidebar(){

  
  	register_sidebar(  array(
  		'name'          => __( 'Right Sidebar', 'prof' ),
  		'id'            => 'prof-right-sidebar',
  		'description'   => 'Sidebar for widget',
  		'before_widget' => '<div id="%1$s" class="contact-panel">',
  		'after_widget'  => '</div><div class="clear"></div>',
  		'before_title'  => '<div class="title">',
  		'after_title'   => '</div>'
  	) );
  
}
add_action('widgets_init', 'prof_sidebar');

//do shortcode for search form

function prof_search_shortcode( $atts) {
	$search_atts = extract(shortcode_atts( array(
		'link' => 'http://localhost/professionalism/wp-content/uploads/2016/01/search-bt.jpg'
	), $atts ));

	// do shortcode actions here
	ob_start();
	?>
	<div class="search">
	          <ul>
	          	<form action="<?php echo esc_url(home_url('/' ) ); ?>" method="GET"  >
	            <li class="libg">
	              <input type="text" name="s" id="s" class="search-filed" placeholder="<?php echo esc_attr_x( 'search here …', 'placeholder' ) ?>" value="<?php echo get_search_query( ); ?>">
	            </li>
	            <li><img src="<?php echo $link; ?>" alt=""></li>
	           </form>
	          </ul>
	        </div>
	<div class="clear"></div>

	<?php
   return ob_get_clean();
}
add_shortcode( 'prof-search','prof_search_shortcode' );


add_action( 'admin_menu', 'wpse_136058_remove_menu_pages' );

function wpse_136058_remove_menu_pages() {

    remove_menu_page( 'wpcf' );
    remove_menu_page( 'wpcf7' );
}


//Customizer API

function prof_customizer($wp_customize){

  $wp_customize->add_section('professional_section', array(
         'title' => __('Professional Section', 'prof'),
         'priority' => 20,

    ));

//for logo text
  $wp_customize->add_setting('logo_text', array(
         'default' => __('Professional', 'prof'),
         'transport' => 'postMessage'
 
    ));

  $wp_customize->add_control('logo_text', array(
	      'section' => 'professional_section',
	      'label' => __('Logo Text', 'prof'),
	      'type' => 'text'
    ));  

 //for logo image
  $wp_customize->add_setting('upload_logo', array(
         'default' => __('', 'prof'),
         'transport' => 'refresh'
 
    ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'upload_logo', array(
     'label' => __( 'Upload logo', 'prof' ),
     'section' => 'professional_section',
     'settings' => 'upload_logo'

  	))); 
  //for widget background color
  $wp_customize->add_setting('theme_color', array(
         'default' => __('#9cff00', 'prof'),
         'transport' => 'postMessage'
 
    ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_color', array(
     'label' => __('Theme Color', 'prof' ),
     'section' => 'professional_section',
     'settings' => 'theme_color'

  	))); 

  //for buttons background color

  $wp_customize->add_setting('buttons_background', array(
     'default' => __( '#9cff00', 'prof' ),
     'transport' => 'postMessage'
  	));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'buttons_background', array(
     'label' => __( 'Button background', 'prof' ),
     'section' => 'professional_section',
     'settings' => 'buttons_background'

  	)));

}
add_action('customize_register', 'prof_customizer' );

function prof_customize_script(){

wp_enqueue_script( 'prof-customizer', get_template_directory_uri().'/js/customize-scripts.js', array('jquery', 'customize-preview'), '1.0', true);


}
add_action('customize_preview_init', 'prof_customize_script' );


//customize css

function prof_css(){?>

<style type="text/css">
  
  .right-panel .contact-panel {
    background: <?php echo get_theme_mod('theme_color'); ?>  ;
    
}

  .controller .buttons{
  	background: <?php echo get_theme_mod('buttons_background') ?>
  }




</style>

<?php

}
add_action('wp_head', 'prof_css' );




