<?php 
/*
Template Name: Work Template
*/
get_header( ); ?>
<div class="page padding-bottom">
  <div class="content_wrap">
    <div class="portfolio">
      <div class="title">
        <h1>Work</h1>
        <h2>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus hasellus ultrices nulla quis nibh. Quisque a lectus.</h2>
      </div>

    <?php 
      global $redux_prof;
      if (isset($redux_prof['opt-slides']) && !empty($redux_prof['opt-slides']) ) {
        $portfolios = $redux_prof['opt-slides'];
        foreach ($portfolios as $portfolio) {
          $title = $portfolio['title'];
          $description = $portfolio['description'];
          $image_src =  $portfolio['image'] ;
          $url   = $portfolio['url'];
          ?>
          <div class="panel marRight30">
            <div class="content"> <img src="<?php echo $image_src; ?>" />
              <p><span><?php echo $title; ?></span></p>
              <p><?php echo $description; ?></p>
              <a href="<?php echo $url; ?>">visit site</a> </div>
          </div>


          <?php 

        }
      }

    ?>

    </div>
    <div class="clear"></div>
  </div>
  <!-- end of BOX WRAPPER -->
  <div class="clear"></div>
</div>
<?php get_footer(); ?>