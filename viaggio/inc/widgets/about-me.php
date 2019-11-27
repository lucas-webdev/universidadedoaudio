<?php 
class viaggio_author_detail extends WP_Widget{
	public function __construct(){
		parent::__construct("viaggio_author_detail", esc_html__('Viaggio Author', 'viaggio'),array('description' => esc_html__('Viaggio Author Details for the sidebar.' , 'viaggio')));
	}
	function widget($args, $instance){
		$author_title = empty($instance['author_title']) ? 'ABOUT AUTHOR': $instance['author_title'];
		$author_image = empty($instance['author_image']) ? '': $instance['author_image'];
		$author_bio = empty($instance['author_bio']) ? '': $instance['author_bio'];
		$author_rank = empty($instance['author_rank']) ? '': $instance['author_rank'];
		$author_name = empty($instance['author_name']) ? '': $instance['author_name'];
		echo $args['before_widget'];
        echo $args['before_title']. esc_html($author_title) . $args['after_title'];?>

		<div class="aboutme">
		    <?php if($author_image): ?>
		    	<img src="<?php echo esc_url($author_image); ?>" alt="<?php echo esc_html('Author');?>">
			<?php endif;?>
			<?php
			if($author_name){
				echo "<div class='author_name'>". esc_html($author_name)."</div>";
			}
			if($author_rank){
				echo "<div class='author_rank'>".esc_html($author_rank)."</div>";
			}
			?>
			<?php if($author_bio) : ?>
		    <p><?php echo esc_html($author_bio);?></p>
			<?php endif;?>
		</div>        
<?php   echo $args['after_widget'];
	}
	function form($instance){
		$author_title = empty($instance['author_title']) ? '': $instance['author_title'];
		$author_image = empty($instance['author_image']) ? '': $instance['author_image'];
		$author_bio = empty($instance['author_bio']) ? '': $instance['author_bio'];
		$author_rank = empty($instance['author_rank']) ? '': $instance['author_rank'];
		$author_name = empty($instance['author_name']) ? '': $instance['author_name'];
	?>
		<p><label for="<?php echo $this->get_field_id('author_title')?>"><?php esc_html_e('Title' , 'viaggio')?>: <input class="widefat" id="<?php echo $this->get_field_id('author_title')?>" name="<?php echo $this->get_field_name('author_title')?>" type="text" value="<?php echo esc_attr($author_title); ?>"></label></p>

		<p><label for="<?php echo $this->get_field_id('author_image')?>"><?php esc_html_e('Author Image' , 'viaggio');?>: <input class="widefat" id="<?php  echo $this->get_field_id('author_image')?>" name="<?php echo $this->get_field_name('author_image')?>" type="text" value="<?php echo esc_attr($author_image); ?>"></label></p>	

		<p><label for="<?php echo $this->get_field_id('author_name')?>"><?php esc_html_e('Author Name' , 'viaggio');?>: <input class="widefat" id="<?php  echo $this->get_field_id('author_name')?>" name="<?php echo $this->get_field_name('author_name')?>" type="text" value="<?php echo esc_attr($author_name); ?>"></label></p>	

		<p><label for="<?php echo $this->get_field_id('author_rank')?>"><?php esc_html_e('Author Rank','viaggio');?>: <input class="widefat" id="<?php  echo $this->get_field_id('author_rank')?>" name="<?php echo $this->get_field_name('author_rank')?>" type="text" value="<?php echo esc_attr($author_rank); ?>"></label></p>	

		<p><label for="<?php echo $this->get_field_id('author_bio')?>"><?php esc_html_e('Author Bio' , 'viaggio');?>: <textarea class="widefat" id="<?php  echo $this->get_field_id('author_bio')?>" name="<?php echo $this->get_field_name('author_bio')?>"><?php echo esc_attr($author_bio); ?></textarea></label></p>	

	<?php
	}
		public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
            $instance = array();
            $instance['author_title'] = ( ! empty( $new_instance['author_title'] ) ) ? strip_tags( $new_instance['author_title'] ) : '';
            $instance['author_image'] = ( ! empty( $new_instance['author_image'] ) ) ? strip_tags( esc_url($new_instance['author_image']) ) : '';
            $instance['author_name'] = ( ! empty( $new_instance['author_name'] ) ) ? strip_tags( $new_instance['author_name'] ) : '';
            $instance['author_rank'] = ( ! empty( $new_instance['author_rank'] ) ) ? strip_tags( $new_instance['author_rank'] ) : '';
            $instance['author_bio'] = ( ! empty( $new_instance['author_bio'] ) ) ? strip_tags( $new_instance['author_bio'] ) : '';
            
            return $instance;
    }

}
function author_details_register(){
    register_widget('viaggio_author_detail');
}
add_action('widgets_init', 'author_details_register');
?>