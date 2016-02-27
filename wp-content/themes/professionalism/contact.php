<?php
/*
Template Name: Contact template
*/
get_header( );
 ?>
<div class="page padding-bottom">
  <div class="content_wrap">
    <div class="left-panel">
      <div class="generic-content">
        <div class="title">
          <h1><?php the_title(); ?></h1>
          <h2><?php echo get_post_meta( get_the_ID(), 'wpcf-subtitle', true ); ?></h2>
        </div>
        <div class="content">
          <div class="address martop">
            <?php 
            $args = array('post_type' => 'address', 'posts_per_page' => -1, 'order' => 'ASC' );
            $address = new WP_Query($args);
            if($address->have_posts()) : while($address->have_posts()) : $address->the_post();

             ?>
           <div class="panel">
             <div class="title">
               <h1><?php the_title( ); ?></h1>
             </div>
             <div class="content">
              <?php the_content(); ?>
               <p class="padTop"><span>Phone :</span> <?php echo get_post_meta( get_the_ID(), 'wpcf-phone-number', true ); ?></p>
               <p><span>Email :</span> <a href="mailto:<?php echo get_post_meta( get_the_ID(), 'wpcf-phone-number', true );  ?>"><?php echo get_post_meta( get_the_ID(), 'wpcf-email-address', true );   ?></a></p>
             </div>
           </div>
           <?php endwhile; endif; wp_reset_postdata(); ?>
           
           
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <?php get_sidebar( ); ?>
    <div class="clear"></div>
  </div>
  <!-- end of BOX WRAPPER -->
  <div class="clear"></div>
</div>
<?php get_footer( ); ?>