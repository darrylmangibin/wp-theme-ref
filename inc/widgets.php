<?php
//create custom widgets for the business hours
/**
 * Adds Foo_Widget widget.
 */
class Business_hours extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'business_hours', // Base ID
			esc_html__( 'Business Hours Widget', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Business Hours (Check About Us to make changes)', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		?>
		<?php $about = get_page_by_title( 'About Us'); ?>

		<p class="text-center mt-5"><?php echo get_field('business_hours_text', $about->ID); ?></p>

		<?php $table = get_field('business_hours', $about->ID); ?>
		<?php if($table) : ?>
			<table class="table table-hover text-center mt-5">
				<thead class="table-danger">
					<tr>
						<?php foreach($table['header'] as $th): ?>
							<th class="text-center"><?php echo $th['c']; ?></th>
						<?php endforeach;  ?>

					</tr> 
				</thead>
				<tbody>
					<?php foreach($table['body'] as $tr) : ?>
						<tr>
							<?php foreach($tr as $td) : ?>
								<td><?php echo $td['c']; ?></td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>

		<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Business_hours

// register Business_hours widget
function register_business_hours() {
	register_widget( 'Business_hours' );
}
?>