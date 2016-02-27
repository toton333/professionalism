<?php

/*
Plugin Name: Prof Widget
Plugin URI: localhost/professionalism
Author: Bishan
Author URI: localhost/professionalism
Description: A widget with a subtitle field
Version: 1.0
Tags: widget, prof, simple, double heading, subtitle, extra field


*/

class Prof_widget extends WP_Widget{

	function __construct(){
      parent:: __construct('prof_widget', __('Prof Widget', 'prof'), array('description' => __( 'A Bish Product', 'prof' )));

	}

	public function widget($args, $instance){

		$title    = apply_filters('widget_title', !empty($instance['title'])? $instance['title'] : '', $instance, $this->id_base  );
		$subtitle = !empty($instance['subtitle']) ? $instance['subtitle'] : '';
		$content  = !empty($instance['content']) ? $instance['content'] : '';

		echo $args['before_widget'];
		echo $args['before_title'];
		if ($title || $subtitle) {
			echo '<h1>'.$title.'</h1><span>'.$subtitle.'</span>';
		}
		echo $args['after_title'];
		if ($content) {
			echo apply_filters('widget_text', $instance['content'] );
		}
		echo $args['after_widget'];

	}

	public function form($instance){

		$instance    = wp_parse_args((array)$instance, array('title' => '', 'subtitle' => '', 'content' => '' ));
		$title       = $instance['title'];
		$subtitle    = $instance['subtitle'];
		$content     = $instance['content'];

		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e( 'Title :', 'prof' ); ?> </label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo esc_attr($title ); ?>"            >
			
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('subtitle'); ?>"> <?php _e( 'Subtitle :', 'prof' ); ?> </label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>"  value="<?php echo esc_attr($subtitle ); ?>"            >
			
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('content'); ?>"><?php _e( 'Content :', $domain ); ?></label><br/>
			<textarea class="widefat" name="<?php echo $this->get_field_name('content') ?>" id="<?php echo $this->get_field_id('content'); ?>" cols="30" rows="10"><?php echo esc_attr($content ); ?></textarea>
		</p>



		<?php

	}

	public function update($new_instance, $old_instance){
       
       $instance = array();
       $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '' ;
       $instance['subtitle'] = (!empty($new_instance['subtitle'])) ? strip_tags($new_instance['subtitle']) : '' ;
       $instance['content'] = (!empty($new_instance['content'])) ? $new_instance['content'] : '' ;

       return $instance;


	}



}

add_action('widgets_init', function(){
	register_widget('Prof_widget' );
} );



