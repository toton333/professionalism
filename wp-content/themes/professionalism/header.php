<!DOCTYPE html>
<html <?php language_attributes( ); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href='http://fonts.googleapis.com/css?family=Oswald|Open+Sans' rel='stylesheet' type='text/css'>



<?php wp_head(); ?>
</head>
<body>
<div  class="social-wrapper">
  <div class="row">

    <ul>
      <?php
        global $redux_prof;
        if (isset($redux_prof['opt-slide-social']) && !empty($redux_prof['opt-slide-social'])   ) {
          $socials = $redux_prof['opt-slide-social'];
          foreach ($socials as $social) {
            $title = $social['title'];
            $image_src = $social['image'];
            $url = $social['url'];
            ?>
           <li><a href="<?php echo $url; ?>"><img src="<?php echo $image_src; ?>" alt="<?php echo $title; ?>" /></a></li>

            <?
          }
        }
       ?>

    </ul>
    <?php echo do_shortcode('[prisna-google-website-translator]'); ?>
    <div class="clear"></div>
  </div>
</div>
<div class="clear"></div>
<!-- end of SOCIAL ICONS -->
<div class="header">
  <div class="row">
    <div class="logo">
      <h1><?php echo get_theme_mod('logo_text' ); ?></h1>
    </div>

    <?php
            /**
           * Displays a navigation menu
           * @param array $args Arguments
           */
           $args = array(
             'theme_location' => 'primary',
             'menu' => '',
             'container' => 'div',
             'container_class' => 'menu',
             'container_id' => '',
             'menu_class' => 'menu',
           );
         
           wp_nav_menu( $args );
     ?>

    

  </div>
  <div class="clear"></div>
</div>
<!-- end of MENU WRAPPER -->