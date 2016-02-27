<?php get_header( ); ?>
<div class="page padding-bottom">
  <div class="content_wrap">
    <div class="left-panel">
      <div class="panel">

        <?php if(have_posts()): while(have_posts()) : the_post(); ?>
        <?php 
           if (has_post_thumbnail(get_the_ID() )) {
              the_post_thumbnail( );
           }
        ?>
        <div class="title">
          <h1><?php the_title(); ?></h1>
          <h2><?php echo get_post_meta(get_the_ID(), 'wpcf-subtitle', true ); ?></h2>
        </div>
        <div class="content">
         
          <?php the_content( ); ?>

        </div>
      <?php endwhile; else: ?>
        <h1><?php _e('Page Not Found', 'prof' ); ?></h1>
      <?php endif; wp_reset_postdata(); ?>
      </div>
      <div class="clear"></div>
    </div>
    <?php get_sidebar( ); ?>
  </div>
  <!-- end of BOX WRAPPER -->
  <div class="clear"></div>
</div>
<?php get_footer( ); ?>
