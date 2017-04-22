<?php
/*
Template Name: custom
Template Post Type: page
*/
get_header(); ?>

<?php $layout_class = shapely_get_layout_class(); ?>

</div> <!-- main -->

	<div class="shortsection">
		<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/custom-content' );

			endwhile; // End of the loop.
		?>
	</div>
	</section>
</div>

<?php
get_footer();
