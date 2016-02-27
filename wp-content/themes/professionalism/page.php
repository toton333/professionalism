<?php get_header( ); ?>
<div class="page padding-bottom">
  <div class="content_wrap">
    <div class="left-panel">
      <div class="panel">
        <img src="<?php echo get_theme_mod('upload_logo' ); ?>" alt="">

        <?php if(have_posts()): while(have_posts()) : the_post(); ?>
        <div class="title">
          <h1><?php the_title(); ?></h1>
          <h2>Vivamus et augue sed orci auctor</h2>
        </div>
        <div class="content">
         
          <?php the_content(); ?>
        </div>
      <?php endwhile; else: ?>
        <h1>Page Not Found</h1>
      <?php endif; wp_reset_postdata(); ?>
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
