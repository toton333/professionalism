<?php 
/*
Template Name: services
*/

get_header( );
?>
<div class="page padding-bottom">
  <div class="content_wrap">
    <div class="left-panel">
      <div class="panel">
        <div class="title padBottom">
          <h1>Services</h1>
          <h2>Lorem ipsum dolor sit amet consectetur adipiscing elit </h2>
        </div>
        <div class="clear"></div>
        <?php
         $args = array('post_type' => 'service', 'posts_per_page' => -1);
         $service = new WP_Query($args);
         if($service->have_posts()) : while($service->have_posts()) : $service->the_post();

         ?>
        <div class="content marbottom30"> <?php the_post_thumbnail(); ?>
          <h3><?php the_title(); ?></h3>
           <?php

           $subtitle = get_post_meta( get_the_ID(), 'wpcf-subtitle', true ); 
           ?>
           <h3><?php echo $subtitle; ?></h3>
           <ul>
           <?php 

            echo get_the_term_list( get_the_ID(), 'category', '<li>', ', ', '</li>' );

            ?>
          </ul>
           <ul>
           <?php 

            echo get_the_term_list( get_the_ID(), 'post_tag', '<li>', ', ', '</li>' );

            ?>
          </ul>
          <ul>
           <?php 

            echo get_the_term_list( get_the_ID(), 'time', '<li>', ', ', '</li>' );

            ?>
          </ul>

          <?php


          echo '<hr/>';

          

          $taxonomies = get_taxonomies(); 
          foreach ( $taxonomies as $taxonomy ) {

              if (has_term('',$taxonomy )) {
                echo '<strong>'.$taxonomy.' : </strong>';
                echo get_the_term_list( get_the_ID(), $taxonomy, '', ', ', '' );
                echo '<br/>';
              }
          }

          ?>

           <?php the_content(); ?>
        </div>
        <div class="clear"></div>
        <?php endwhile; endif; wp_reset_postdata() ?>
        
      </div>
      <div class="clear"></div>
    </div>
    <?php get_sidebar( ); ?>
    <div class="clear"></div>
  </div>
  <!-- end of BOX WRAPPER -->
  <div class="clear"></div>
</div>
<?php get_footer(); ?>