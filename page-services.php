<?php get_header(); ?>
<?php while(have_posts()): the_post(); ?>
	<div class="container pt-4">
		<div class="row no-gutters">
			<div class="col-12 hero">
				<?php if(has_post_thumbnail()): ?>
					<?php the_post_thumbnail('full', array(
						'class' => 'img-fluid',
					)); ?>
				<?php endif; ?>
				<h2 class="text-uppercase d-block"><?php the_title(); ?></h2>
			</div>
		</div>
	</div>

	<div class="container py-md-4 py-1">
		<div class="row">
			<main class="col-lg-8 main-content">
				<div id="services">
					<div class="card">
						<div class="card-header" id="services_1">
							<?php $services_title_1 = get_field('services_title_1'); ?>
							<h3 class="mb-0">
								<a href="#services"data-target="#services_1desc" data-toggle="collapse" aria-expanded="true" aria-controls="services_1desc"><?php echo $services_title_1; ?></a>
							</h3>
						</div>
						<div id="services_1desc" class="collapse show" aria-labelledby="services1" data-parent="#services">
							<div class="card-body">
								<?php $services_content_1 = get_field('services_content_1'); ?>
								<p><?php echo $services_content_1; ?></p>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="services_2">
							<h3 class="mb-0">
								<?php $services_title_2 = get_field('services_title_2'); ?>
								<a href="#services"data-target="#services_2desc" data-toggle="collapse" aria-controls="services_2desc"><?php echo $services_title_2; ?></a>
							</h3>
						</div>
						<div id="services_2desc" class="collapse" aria-labelledby="services2" data-parent="#services">
							<div class="card-body">
								<?php $services_content_2 = get_field('services_content_2'); ?>
								<p><?php echo $services_content_2; ?></p>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="services_3">
							<h3 class="mb-0">
								<?php $services_title_3 = get_field('services_title_3'); ?>
								<a href="#services"data-target="#services_3desc" data-toggle="collapse" aria-controls="services_3desc"><?php echo $services_title_3; ?></a>
							</h3>
						</div>
						<div id="services_3desc" class="collapse" aria-labelledby="services3" data-parent="#services">
							<div class="card-body">
								<?php $services_content_3 = get_field('services_content_3'); ?>
								<p><?php echo $services_content_3; ?></p>
							</div>
						</div>
					</div>
				</div>
			</main>

			<aside class="col-lg-4 pt-4 pt-lg-0 discount">
				<div class="p-3">
					<?php $services_widget_title = get_field('services_widget_title'); ?>
					<h3 class="text-center text-uppercase"><?php echo $services_widget_title; ?></h3>
					<?php $services_content = get_field('services_content'); ?>
					<p class="lead text-center mt-4"><?php echo $services_content; ?></p>
					<div class="coupon p-1">
						<?php $services_discount = get_field('services_discount');
							  $services_discount_content = get_field('services_discount_content'); ?>
						<p class="text-center text-uppercase"><span class="display-4 d-block pt-3"><?php echo $services_discount; ?></span><?php echo $services_discount_content; ?></p>
					</div>
				</div>
			</aside>
		</div>
	</div>
<?php endwhile; ?>
	<?php get_template_part('templates/appointment' ); ?>

<?php get_footer(); ?>