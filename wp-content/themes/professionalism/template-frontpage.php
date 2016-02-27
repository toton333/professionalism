<?php

/*
Template Name: Front Page
*/

get_header();
 ?>


<div class="banner-wrapper">
  <div class="row">
    
  </div>
  <div class="clear"></div>
  <div class="banner">
    <div class="banner-bg">
      <div class="panel">
        <div class="title">
          <h1>Nulla sapien<br />
            vestibulum ut semper</h1>
        </div>
        <div class="content">
          <p>Nulla sapien vestibulum ut semper <br />
            Pellentesque habitant morbi.</p>
        </div>
        <div class="banner-button"><a href="#">Primi ipsum dolor</a></div>
      </div>
      <div class="banner-img">
	  	<div id="carousel">
		<div id="slides">
				<ul>
          <?php
          global $redux_prof;
          if (isset($redux_prof['opt-slide-banners']) && !empty($redux_prof['opt-slide-banners'])  ) {
             $images = $redux_prof['opt-slide-banners'];
             foreach ($images as $image) {
               $image_src = $image['image'];
               $image_alt = $image['title'];
               ?>
            <li><img src="<?php echo $image_src; ?>"  alt="<?php echo $image_alt; ?>"/></li>
               <?php
             }
           } 
          ?>
						
				</ul>
				<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<div id="buttons"> <a href="#" id="prev">prev</a> <a href="#" id="next">next</a>
				<div class="clear"></div>
		</div>
</div>
	  
	  </div>
    </div>
  </div>
</div>
<!-- end of BANNER WRAPPER -->
<div class="page">
  <?php 
      $args = array('post_type'=>'service', 'posts_per_page' => -1 );
      $service = new WP_Query($args);
      if($service->have_posts()) : while($service->have_posts()) : $service->the_post();

  ?>
  <div class="boxs1">
    <div class="panel">
      <div class="title">
        <h1><?php the_title(); ?></h1>
        <h2><?php echo get_post_meta( get_the_ID(), 'wpcf-subtitle', true ); ?></h2>
      </div>
      <div class="panel-img"><?php the_post_thumbnail( ); ?></div>
      <div class="content">
        <p><?php read_more(10); ?></p>
      </div>
      <div class="controller">
        <div class="buttons">
          <h2><a href="<?php the_permalink(); ?>"><?php _e('MORE', 'prof' ); ?></a></h2>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
 <?php endwhile; endif;  ?>

  <div class="clear"></div>
</div>
<!-- end of BOX WRAPPER -->
<div class="page padding-bottom">
  <div class="content_wrap">
    <div class="left-panel">

      <?php 
      $args = array('post_type' => 'post', 'posts_per_page' => -1);
      $posts = new WP_Query($args);

      if($posts->have_posts()): while($posts->have_posts()): $posts->the_post(); 
      ?>

      <div class="panel">
        <div class="title">
          <div class="icons"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icons.png" alt="" /></div>
          <h1><?php the_title(); ?></h1>
          <h2><?php echo get_post_meta( get_the_ID(), 'wpcf-subtitle', true ); ?></h2>
        </div>
        <div class="content">
          <p><?php read_more(30); ?></p>
        </div>
        <div class="controller">
          <div class="buttons">
            <h2><a href="<?php the_permalink(); ?>"><?php _e('MORE', 'prof' ); ?></a></h2>
          </div>
          <div class="clear"></div>
        </div>
      </div>
     <div class="clear"></div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
     
      
    </div>
    <!-- start sidebar -->
        <?php get_sidebar( ); ?>
    <!-- end sidebar-->
        <div class="clear"></div>
      </div>
      <!-- end of BOX WRAPPER -->
  <div class="clear"></div>
</div>

<?php get_footer( ); ?>