<?php
/*
Template Name: Contact
Template Post Type: page
*/
get_header(); ?>

<?php $layout_class = shapely_get_layout_class(); ?>

<div class="row">

	<section class="content-area">
		<div id="primary" class="col-md-12 mb-xs-24 <?php echo esc_attr( $layout_class ); ?>">
			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/contact-part' );

				endwhile; // End of the loop.
			?>
		</div>
	</section>
</div>


<?php
get_footer();
