<?php get_header(); ?>

<?php while(have_posts()) : the_post(); ?>
  <!-- CAROUSERL -->
  <div class="container">
   <div id="main-slider" class="carousel slide mt-4" data-ride="carousel">

     <?php 
     $args = array(
       'tags' => 'slider',
       'post_per_page' => 5,
     );

     $query = new WP_Query($args);
     if($query->have_posts()):
       $count = $query->found_posts; ?>

       <!-- pagination -->
       <ol class="carousel-indicators">

        <?php for($i = 0; $i < $count; $i++) { ?>
         <li data-target="#main-slider" data-slide-to="<?php echo $i; ?>" class="<?php echo($i == 0) ? 'active' : ''  ?>"></li>
       <?php } ?>
     </ol>

     <div class="carousel-inner" role="listbox">
      <?php $i = 0; while($query->have_posts()): $query->the_post(); ?>

      <div class="carousel-item <?php echo($i == 0) ? 'active' : ''  ?>">
       <?php the_post_thumbnail('slider', array(
         'class' => 'd-block img-fluid',
         'alt' => get_the_title()
       )); ?>
       <div class="carousel-caption d-none d-md-block">
         <h3 class="text-uppercase"><?php the_title(); ?></h3>
       </div>
     </div>
     <?php $i++; endwhile; ?>
   <?php endif; ?>
   <?php wp_reset_query(); ?>
 </div><!-- .carousel-inner -->

 <!-- carousel-controls -->
 <a href="#main-slider" class="carousel-control-prev" data-slide="prev">
   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
 </a>
 <a href="#main-slider" class="carousel-control-next" data-slide="next">
   <span class="carousel-control-next-icon" aria-hidden="true"></span>
 </a>
</div>
</div>

<!-- NEW WEBSITE -->

<section class="new-website py-5">
 <h2 class="text-center text-uppercase"><span class="text-lowercase"><?php echo get_field('website_title'); ?></span><?php echo get_field('website_subtitle'); ?></h2>
 <p class="text-center mt-4"><?php echo get_bloginfo('description'); ?></p>
</section>

<!-- SERVICES -->
<div class="container pb-5">

 <div class="row">
  <?php 
  $args = array(
    'post_type' => 'page',
    'post_name__in' => array('products', 'about-us', 'services'),
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_per_page' => 3
  );
  $query = new WP_Query($args);
  if($query->have_posts()):
    while($query->have_posts()) : $query->the_post();
      ?>
      <div class="col-md-4 col-12 text-center">
       <div class="image-links mb-4 mb-md-0">
         <img class="img-fluid" src="<?php echo get_field('section_image')['url']; ?>">
         <div class="row no-gutters">
          <div class="pt-3 col-md-10 offset-md-1 col-8 offset-2 image-info">
            <h3 class="text-center text-uppercase"><span class="text-lowercase"><?php echo get_field('section_text'); ?></span><?php echo get_field('section_page'); ?></h3>
            <a class="btn btn-success text-uppercase btn-block mt-4 py-3" href="<?php the_permalink(); ?>"><?php echo get_field('section_button_text'); ?></a>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
<?php endif; wp_reset_query(); ?>
</div>
</div>

<!-- Business Hours -->
<div class="business-hours">
 <div class="container">
   <div class="row">
     <div class="col-md-6 py-5">
       <?php 
       $args = array(
        'before_title' => '<h2 class="text-center text-uppercase pt-4">',
        'after_title' => '</h2>',
      );
      the_widget('Business_hours', 'title=Business_hours', $args); ?>
    </div>
    <?php if(has_post_thumbnail()):
      $url = wp_get_attachment_url(get_post_thumbnail_id());
    endif;
    ?>
    <div class="col-md-6 bg-hours" style="background-image: url(<?php echo $url; ?>);">
    </div>
  </div>
</div>
</div>

<!-- Products -->
<div class="container products py-3">
  <h2 class="text-center text-uppercase"><span class="text-lowercase"><?php echo get_field('home_products'); ?></span><?php echo get_field('home_products_page'); ?></h2>
    <div class="row py-4">
      <?php echo do_shortcode('[darrylspa_products number="4"]'); ?>
      
    </div>
    <?php $products = get_page_by_title('Products'); ?>
      <a href="<?php echo get_permalink($products->ID); ?>" class="btn btn-primary float-right view-products mb-5">View Our Products</a>
</div>
<div class="clearfix"></div>
<?php get_template_part('templates/appointment'); ?>
<?php endwhile; ?>

<?php get_footer(); ?>