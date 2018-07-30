<?php 

function spa_style(){
	//google-fonts
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Italianno|Lato:400,700,900|Raleway:400,700,900" rel="stylesheet');

	//bootstrap-css
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

	//font-awesome
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');

	//stylesheet
	wp_enqueue_style('style', get_stylesheet_uri());

	//jquery
	wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array(), '3.3.1', true);

	//bootstrap-js
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.1', true);

	//main-js
	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'),'1.0', true);

	add_theme_support( 'post-thumbnails' );

	//remove <p> tag from the content
	remove_filter( 'the_content', 'wpautop' );

}
add_action('wp_enqueue_scripts', 'spa_style');

function spa_menu(){
	//create menus
	register_nav_menus( array(
		'primary_social' => esc_html__( 'Primary Social Menu', 'darrylspa' ),
		'primary_menu' => esc_html__('Primary Menu', 'darrylspa'),
	) );
	//add logo
	add_theme_support('custom-logo');

	//add feature image
	add_theme_support('post-thumbnails');

	//Featured images
	update_option('thumbnail_size_w', 216);
	update_option('thumbnail_size_h', 144);
	update_option('thumbnail_crop', 1);

	//add new image size
	add_image_size('product_thumb', 400, 266, true);
	add_image_size( 'slider', 1140, 543, true );


}
add_action('after_setup_theme', 'spa_menu');

//add bootstrap nav item class to <li>
function spa_custom_li($classes, $items, $args){
	if($args->theme_location == 'primary_menu') {
		$classes[] = 'nav-item';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'spa_custom_li', 1, 3 );

//add bootstrap nav-link class to <a>
function spa_custom_a($atts, $item, $args) {
	if($args->theme_location == 'primary_menu'){
		$classes = 'class';
		$atts['class'] = 'nav-link';
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'spa_custom_a', 10, 3);

//add widgets
function spa_widgets(){
	register_sidebar( array(
		'name' => 'Footer Widget 1',
		'id' => 'footer_widget_1',
		'before_widget' => '<div id="%1s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="text-uppercase text-center pb-4">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Widget 2',
		'id' => 'footer_widget_2',
		'before_widget' => '<div id="%1s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="text-uppercase text-center pb-4">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Widget 3',
		'id' => 'footer_widget_3',
		'before_widget' => '<div id="%1s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="text-uppercase text-center pb-4">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Sidebar Widget 1',
		'id' => 'sidebar_widget_1',
		'before_widget' => '<div id="%1s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="text-center text-uppercase pt-4">',
		'after_title' => '</h2>',
	) );
}

add_action('widgets_init', 'spa_widgets');

//custom widgets
get_template_part('inc/widgets');
add_action( 'widgets_init', 'register_business_hours' );


//shortcode that display the products
//use the shortcode: darrylspa_products
function darrylspa_products_shortcode($products){
	$args = array(
		'posts_per_page' => $products['number'],
		'post_type' => 'store',
		'orderby' => 'menu_order',
		'order' => 'ASC'
	);
	$query = new WP_Query($args);
	while($query->have_posts()) : $query->the_post(); ?>

		<div class="col-lg-3 col-md-6 col-12 mb-md-3 mb-5">
			<div class="card">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('product_thumb', array('class' => 'card-img-top img-fluid')) ?>
					<div class="card-body">
						<h3 class="card-title text-center text-uppercase mb-0"><?php the_title(); ?></h3>
						<p class="card-text text-uppercase"><?php echo get_field('short_description'); ?></p>
						<p class="text-center price mb-0">$<?php echo get_field('price'); ?></p>
					</div>
				</a>
			</div>
		</div>

		<?php	
	endwhile; wp_reset_query();
}
add_shortcode('darrylspa_products', 'darrylspa_products_shortcode');


//contact form shortcode: [contact_form]
function darrylspa_contact_form() { ?>

	<main class="col-12 col-md-10 offset-md-1 main-content">
			<form action="<?php echo get_template_directory_uri(); ?>/send.php" method="post" class="p-5 mt-5 contact-form">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
				</div>
				<div class="form-group">
					<label for="name">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea class="form-control" id="message" rows="6"></textarea>
				</div>

				<input type="submit" name="submit" value="Submit" class="btn btn-primary text-uppercase">
			</form>
		</main>

<?php 
}
add_shortcode('contact_form', 'darrylspa_contact_form');


