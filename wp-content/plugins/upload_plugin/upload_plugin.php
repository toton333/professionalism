<?php

/*
Plugin Name: Upload Plugin
Plugin URI: localhost/professionalism
Author: Bishan
Author URI: localhost/professionalism
Description: A plugin for photo uploading in widget area
Version: 1.0
Tags: widget, image, upload, plugin

*/

class Upload_plugin extends WP_Widget{

	function __construct(){

		parent:: __construct('upload_plugin', __('Upload Plugin', 'prof'), array('description' => __('Widget for photo uploading', 'prof')   ));

	}

	public function widget($args, $instance){
		$title = apply_filters('widget_title', !empty($instance['title'])? $instance['title'] : '', $instance , $this->id_base   );
		$image_src = !empty($instance['image_src']) ? $instance['image_src'] : '';
		$content  = !empty($instance['content']) ? $instance['content'] : '';

		echo $args['before_widget'];

        echo $args['before_title'];
        echo $title;
        echo $args['after_title'];

        echo '<img src="'.$image_src.'"  >';

        echo apply_filters('widget_text', $content );

		echo $args['after_widget'];



	}

	public function form($instance){

		$instance = wp_parse_args( (array)$instance, array('title'=> '', 'image_src' => '', 'content' => ''   ) );
		$title  = $instance['title'];
		$image_src = $instance['image_src'];
		$content = $instance['content'];
	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'prof' ); ?></label>
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name=" <?php echo $this->get_field_name('title'); ?> "  value="<?php echo $title; ?>" >
	</p>
	<p class="imageClass" >
		<label for="<?php echo $this->get_field_id('image_src'); ?>"><?php _e( 'Image : ', 'prof' ); ?></label>
		<input type="text" class="upload_class" id="<?php echo $this->get_field_id('image_src'); ?>" name=" <?php echo $this->get_field_name('image_src'); ?> "  value="<?php echo $image_src; ?>" >
		<button class="image-upload"><?php _e( 'Select/upload an image', 'prof' ); ?></button>
		<?php
          if ($image_src) {
          	?>
          	<img class="MyClass" src="<?php echo $image_src; ?>" >
          	<button class="delete-image">Delete</button>

          	<?php
          }

		 ?>
		
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('content'); ?>"><?php _e( 'Content : ', 'prof' ); ?></label>
		<input type="text" id="<?php echo $this->get_field_id('content'); ?>" name=" <?php echo $this->get_field_name('content'); ?> "  value="<?php echo $content; ?>" >
	</p>


	<?php


	}
	public function update($new_instance, $old_instance){

		$instance = array();
		$instance['title'] = !empty($new_instance['title']) ? $new_instance['title'] : '';
		$instance['image_src'] = !empty($new_instance['image_src']) ? $new_instance['image_src'] : '';
		$instance['content'] = !empty($new_instance['content']) ? $new_instance['content'] : '';

		return $instance;


	}


}

add_action('widgets_init', function(){

	register_widget('Upload_plugin' );
});


function image_upload_scripts(){
   

	wp_register_script( 'upload-image', plugins_url( 'js/imageUploader.js', __FILE__ ), array('jquery', 'thickbox', 'media-upload'));
	wp_enqueue_script('upload-image' );
	wp_enqueue_script('media-upload' );
    wp_enqueue_style('thickbox' );
	wp_enqueue_script('thickbox' );



}
add_action('admin_enqueue_scripts', 'image_upload_scripts' );













