<?php get_header( ); ?>
<div class="page padding-bottom">
  <div class="content_wrap">
    <div class="left-panel">
      <div class="panel">

        <?php if(have_posts()): while(have_posts()) : the_post(); ?>
        <div class="title">
          <h1><?php the_title(); ?></h1>
          <h2><?php echo get_post_meta(get_the_ID(), 'wpcf-subtitle', true ); ?></h2>
        </div>
        <div class="content">
         
          <p><?php read_more(30); ?></p>

        </div>
        <div class="controller">
          <div class="buttons">
            <h2><a href="<?php the_permalink(); ?>"><?php _e('MORE', 'prof');  ?></a></h2>
          </div>
          <div class="clear"></div>
        </div>
        <hr/>

      <?php endwhile; else: ?>
        <h1>Page Not Found</h1>
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
