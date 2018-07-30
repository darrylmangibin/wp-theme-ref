<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
	<div class="container pt-4">
		<div class="row no-gutters">
			<div class="col-12 hero">
				<?php the_post_thumbnail('full', array(
					'class' => 'img-fluid',
				)); ?>
				<h2 class="text-uppercase d-block"><?php the_title(); ?></h2>
			</div>
		</div>
	</div>

	<div class="container py-md-4 py-1">
		<div class="row">
			<main class="col-lg-8 main-content">
				<?php the_content(); ?>
				<div class="facilities-gallery">
					<h3 class="text-center text-uppercase p-4"><span class="text-lowercase">check our</span>facilities</h3>
					<?php 
					$args = (array(
						'post_type' => 'facility',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'post_per_page' => 3
					));
					$query = new WP_Query($args);
					?>
					<?php if($query->have_posts()):
						while($query->have_posts()): $query->the_post();
							?>
							<a href="#" data-target="#image_<?php echo $query->current_post; ?>"" data-toggle="modal">
								<?php 
								if(has_post_thumbnail()){
									$url = wp_get_attachment_url(get_post_thumbnail_id());
									$gallery_image = get_field('gallery_image',$post, false);
									}
								?>
								<img src="<?php echo $url; ?>" class="rounded img-fluid">
							</a>
							<div class="modal fade" id="image_<?php echo $query->current_post; ?>" tabindex="-1" role="dialog" aria-labelledby="image_<?php echo $query->current_post; ?>" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-body">
											<?php $gallery_image = get_field('gallery_image'); ?>
											<img class="img-fluid" src="<?php echo $gallery_image['url']; ?>">
										</div>
									</div>
								</div> 
							</div>

						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</div>
			</main>
			
				<?php get_sidebar(); ?>
	
		</div>
	</div>
<?php endwhile; ?>

<?php get_footer(); ?>