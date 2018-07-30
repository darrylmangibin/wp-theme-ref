<?php get_header(); ?>
<?php include 'inc/db.php'; ?>
<?php while(have_posts()) : the_post(); ?>
<div class="container pt-4">
	<div class="row no-gutters">
		<div class="col-12 hero">
			<?php if(has_post_thumbnail()):
				the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
			<?php endif; ?>
			<h2 class="text-uppercase d-block"><?php the_title(); ?></h2>
		</div>
	</div>
</div>

<div class="container py-md-4 py-1">
	<div class="row">
		
		<?php the_content(); ?>
		
	</div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>