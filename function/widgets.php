<?php /**
 * Widgets Classes Silohon Theme.
 * @package silohon */

/**================================
 * Search Widgets =================
==================================*/
class Silo_Search extends WP_Widget{
    public function __construct(){
        $widget_ops = array(
            'classname' => 'silo-search',
            'description' => 'Silohon Search Widgets'
        ); parent::__construct('silo_search', 'Silohon Search', $widget_ops );
    }
    
    public function form( $instance ){
        $title = ( !empty($instance['title'] ) ? $instance['title'] : 'Search' );
        $output = '<p>';
		$output .= '<label for="'.esc_attr( $this->get_field_id('title') ).'">Title:</label>';
		$output .= '<input type="text" class="widefat" id="'.esc_attr( $this->get_field_id('title') ).'"
			name="'.esc_attr( $this->get_field_name('title') ).'"
			value="' .esc_attr( $title ). '" />';
		$output .= '</label>';

		echo $output;
    }

    public function update( $new_instance, $old_instance ){
        $instance = array();
		$instance['title'] = ( !empty( $new_instance['title']) ? strip_tags( $new_instance['title'] ) : '' );

		return $instance;
    }

    public function widget( $args, $instance ){
        if( !empty( $instance['title'] ) ){
            echo '<div class="widget_title"><span class="dot_title">'.apply_filters( 'widgets_title', $instance['title'] ).'</span></div>';
        } ?>
        <form action="<?php echo home_url('/'); ?>" method="get" class="sil_search">
            <input type="text" id="s" name="s" value="<?php the_search_query(); ?>" placeholder="Search Here.." />
            <button type="submit">Search</button>
        </form>
    <?php }
}

/**================================
 * Recent Posts ===================
==================================*/
class Silo_Recent_post extends WP_Widget{
    public function __construct(){
        $widget_ops = array(
            'classname' => 'silo-recent',
            'description' => 'Silohon Recent Posts',
        ); parent::__construct('silohon_recent', 'Silohon Recent Posts', $widget_ops );
    }

    public function form( $instance ){
        $title = ( !empty( $instance['title'] ) ? $instance['title'] : 'Recent Posts' );
		$tot = ( !empty( $instance['tot'] ) ? absint( $instance['tot'] ) : 4 );

		$output .= '<label for="'.esc_attr( $this->get_field_id('title') ).'">Title:</label>';
		$output .= '<input type="text" class="widefat" id="'.esc_attr( $this->get_field_id('title') ).'"
			name="'.esc_attr( $this->get_field_name('title') ).'"
			value="' .esc_attr( $title ). '" />';
		$output .= '</label>';

		$output .= '<p>';
		$output .= '<label for="'.esc_attr( $this->get_field_id('tot') ).'">Title:</label>';
		$output .= '<input type="number" class="widefat" id="'.esc_attr( $this->get_field_id('tot') ).'"
			name="'.esc_attr( $this->get_field_name('tot') ).'"
			value="' .esc_attr( $tot ). '" />';
		$output .= '</label>';

		echo $output;
    }

    public function update( $new_instance, $old_instance ){
        $instance = array();
		$instance['title'] = ( !empty($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '' );
		$instance['tot'] = ( !empty( $new_instance['tot'] ) ? absint( strip_tags( $new_instance['tot'] ) ) : 0 );

		return $instance;
    }

    public function widget( $args, $instance ){
        $tot = absint( $instance[ 'tot' ] );
        $recent_posts = array(
            'post_type' => 'post',
            'posts_per_page' => $tot,
        ); $recent = new WP_Query( $recent_posts );

        // Title Widgets Sidebar
        if( !empty( $instance['title']) ) : ?>
			<div class="widget_title">
				<span class="dot_title">
					<?php echo apply_filters( 'widgets_title', $instance['title'] ); ?>
				</span>
			</div>
		<?php endif;

        // The Looping Content
        if($recent->have_posts()){ ?>
			<div class="silo_recent_widgets">
				<?php while($recent->have_posts()) : $recent->the_post(); ?>
				<a href="<?php the_permalink(); ?>" class="recent_links">
				<?php 
					if( has_post_thumbnail()){
						the_post_thumbnail( 'thumbnail', array(
							'loading' => 'lazy'
						));
					}
					?>
					<div class="recent_body">
						<span class="metas"><?php silo_cats(); ?></span>
						<span class="metas">/</span>
						<span class="metas"><?php the_time('F d, Y'); ?></span>
						<?php the_title('<h2 class="recent_title">', '</h2>'); ?>
					</div>
				</a>
				<?php endwhile; ?>
			</div>
		<?php } 

		wp_reset_query();
		wp_reset_postdata();
    }
}


/**================================
 * Popular Posts ==================
==================================*/
function silohon_save_post_veiws( $postID ){
    $metaKey = 'silohon_post_views';
    $views = get_post_meta( $postID, $metaKey, true );
    $count = ( empty( $views ) ? 0 : $views );
    $count++;

    update_post_meta( $postID, $metaKey, $count );
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

class Silo_Popular_Post extends WP_Widget{
    public function __construct(){
        $widget_ops = array(
            'classname' => 'silo-popular-post',
            'description' => 'Silohon Popular Posts',
        ); parent::__construct( 'silohon_popular', 'Silohon Popular Posts', $widget_ops );
    }

    public function form( $instance ){
        $title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Popular Posts' );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );

		$output = '<p>';
		$output .= '<label for="'.esc_attr( $this->get_field_id('title') ).'">Title:</label>';
		$output .= '<input type="text" class="widefat" id="'.esc_attr( $this->get_field_id('title') ).'"
			name="'.esc_attr( $this->get_field_name('title') ).'"
			value="' .esc_attr( $title ). '" />';
		$output .= '</label>';

		$output .= '<p>';
		$output .= '<label for="'.esc_attr( $this->get_field_id('tot') ).'">Title:</label>';
		$output .= '<input type="number" class="widefat" id="'.esc_attr( $this->get_field_id('tot') ).'"
			name="'.esc_attr( $this->get_field_name('tot') ).'"
			value="' .esc_attr( $tot ). '" />';
		$output .= '</label>';

		echo $output;
    }

    public function update( $new_instance, $old_instance ){
        $instance = array();
		$instance['title'] = ( !empty( $new_instance['title']) ? strip_tags( $new_instance['title'] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance['tot']) ? absint( strip_tags( $new_instance['tot'] ) ) : 0 );

		return $instance;
    }

    public function widget( $args, $instance ){
        $tot = absint( $instance[ 'tot' ] );
        $the_popular = array(
            'post_type' => 'post',
            'posts_per_page' => $tot,
            'meta_key' => 'silohon_post_views',
			'orderby' => 'meta_value_num',
			'order' => 'DESC'
        ); $popular = new WP_Query( $the_popular );

        // Title Widgets Sidebar
        if( !empty( $instance['title']) ) : ?>
			<div class="widget_title">
				<span class="dot_title">
					<?php echo apply_filters( 'widgets_title', $instance['title'] ); ?>
				</span>
			</div>
		<?php endif;

        // The Looping Content
        if($popular->have_posts()){ ?>
			<div class="silo_recent_widgets">
				<?php while($popular->have_posts()) : $popular->the_post(); ?>
				<a href="<?php the_permalink(); ?>" class="recent_links">
				<?php
					if( has_post_thumbnail()){
						the_post_thumbnail( 'thumbnail', array(
							'loading' => 'lazy'
						));
					}
					?>
					<div class="recent_body">
						<span class="metas"><?php silo_cats(); ?></span>
						<span class="metas">/</span>
						<span class="metas"><?php the_time('F d, Y'); ?></span>
						<?php the_title('<h2 class="recent_title">', '</h2>'); ?>
					</div>
				</a>
				<?php endwhile; ?>
			</div>
		<?php }

		wp_reset_query();
		wp_reset_postdata();
    }
}