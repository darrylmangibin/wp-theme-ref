<!-- Appointment -->
<?php 
$args = array(
   'post_type' => 'appointment',
   'post_per_page' => 1,
   'orderby' => 'menu_order',
   'order' => 'ASC'
); ?>
<?php $query = new WP_Query($args); ?>
<?php if($query->have_posts()) :
   while($query->have_posts()) : $query->the_post();
     ?>
     <?php if(has_post_thumbnail()){
      $url = wp_get_attachment_url(get_post_thumbnail_id());
     } ?>
      <div class="appointment container-fluid py-5" style="background-image: url(<?php echo $url; ?>);">
        <div class="row">
          <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 py-3 text-center">
           <h3 class="text-uppercase"><?php the_title(); ?></h3>
           <p><?php the_content(); ?></p>
           <a href="<?php the_permalink(22); ?>" class="btn btn-primary btn-lg mt-3 text-uppercase">read more</a>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
         </div>
      </div>