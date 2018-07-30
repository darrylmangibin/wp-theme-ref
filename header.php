<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title(''); 
    if(wp_title('', false)) { 
      echo ' : '; 
    } bloginfo('name') . ' | ' . bloginfo('description'); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
   
   <!-- HEADER -->
   <header class="site-header container">
   		<div class="row justify-content-between">
   			<div class="col-8 offset-2 col-lg-4 offset-lg-0">
          <!-- add custom logo -->
          <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
           ?>
          
   				<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $logo[0]; ?>" class="img-fluid mx-auto d-block"></a>

   			</div>
   			<div class="col-12 col-lg-4">

          <?php 

            $args = (array(
              'theme_location' => 'primary_social',
              'container' => 'nav',
              'container_class' => 'socials text-center text-lg-right pt-3',
              'menu_class' => false,
              'link_before' => '<span class="sr-only">',
              'link_after' => '</span>',
            ));

            wp_nav_menu($args);

           ?>

   			</div>
   		</div>
   </header>
   <?php get_template_part('templates/navigation'); ?>